<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;

class JobRepository
{
    public function updateOrCreate(array $data, Job $job = null): Job
    {
        if (!$job) {
            $job = Job::create($data);

        } else {
            $job->update($data);
        }

        // Process images
        $method = $job->images()->exists() ? 'update' : 'create';

        foreach ($data['images'] ?? [] as $image) {
            $job->images()->$method([
                'path' => $image->store('images', 'public')
            ]);
        }
        // Handle removing/replacing multiple images


        // Process tags

        return $job;
    }

    public function jobFilter($data)
    {
        return Job::query()
            ->when(isset($data['search']), function ($query) use ($data) {
                $query->search($data);
            })
            ->when(isset($data['manage']), function ($query) {
                $query->whereHas('company', function ($query) {
                    $query->whereHas('user', function ($query) {
                        $query->where('id', \Auth::id());
                    });
                });
            })
            ->when(isset($data['tag']), function ($query) use ($data) {
                $query->whereHas('tags', function (Builder $subquery) use ($data) {
                    $subquery->where('tag', 'LIKE', '%' . $data['tag'] . '%');
                });
            })
            ->paginate();
    }
}
