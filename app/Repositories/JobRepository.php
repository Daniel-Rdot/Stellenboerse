<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobRepository
{
    public function updateOrCreate(array $data, Job $job = null): Job
    {
        if (!$job) {
            $job = auth()->user()->company->jobs()->create($data);
        } else {
            $job->update($data);
        }

        // Process images
        if (!$job->images()->exists()) {
            foreach ($data['images'] ?? [] as $image) {
                $job->images()->create([
                    'path' => $image->store('images', 'public')
                ]);
            }
        } else {
            // Handle removing/replacing multiple images
        }


        // Process tags

        return $job;
    }

}
