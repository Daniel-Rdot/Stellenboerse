<?php

namespace App\Repositories;

use App\Models\Job;

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
        foreach ($data['images'] ?? [] as $image) {
            $job->images()->create([
                'path' => $image->storeAs()
            ]);
        }

        // Process tags

        return $job;
    }

}
