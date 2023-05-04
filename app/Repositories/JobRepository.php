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
        if (!$job->images()->exists()) {
            foreach ($data['images'] ?? [] as $image) {
                $job->images()->create([
                    'path' => $image->store('images', 'public')
                ]);
            }
        } else {
            foreach ($data['images'] ?? [] as $image) {
                $job->images()->update([
                    'path' => $image->store('images', 'public')
                ]);
            }
            // Handle removing/replacing multiple images
        }


        // Process tags

        return $job;
    }
}
