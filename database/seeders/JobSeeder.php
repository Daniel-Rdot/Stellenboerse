<?php

namespace Database\Seeders;

use App\Models\Image;
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
            ->has(Image::factory(1), 'images')
            ->create();

    }
}
