<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory(4)
//            ->hasTags(2)
            ->hasImages(1)
            ->create();

        Job::factory(4)
//            ->hasTags(3)
            ->create();

        Job::factory(2)
//            ->hasTags(1)
            ->hasImages(1)
            ->create();

    }
}
