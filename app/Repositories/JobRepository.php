<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobRepository
{
    public function updateOrCreate(array $data, Request $request, Job $job = null): Job
    {
        if (!$job) {
            $job = auth()->user()->company->jobs()->create($data);
        } else {
            $job->update($data);
        }

        // Process images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') ?? [] as $image) {
                $job->images()->create([
                    'path' => Str::after($image->store('public/images'), 'public/')
                ]);
            }
        }

        // Process tags

        return $job;
    }

}
