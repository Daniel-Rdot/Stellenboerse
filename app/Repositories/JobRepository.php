<?php

namespace App\Repositories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JobRepository
{
    public function updateOrCreate(array $data, Job $job = null): Job
    {
        if (!$job) {
            $job = Job::create($data);

            if (Auth::user()) {
                if (isset(Auth::user()->company)) {
                    $this->setCompanyRelation($job, Auth::user());
                }
            }

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

    public function setCompanyRelation(Job $job, User $user)
    {
        $user->company->jobs()->save($job);
    }
}
