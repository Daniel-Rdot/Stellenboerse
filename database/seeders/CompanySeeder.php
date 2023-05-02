<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Image;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(5)
            ->has(Image::factory(1), 'images')
            ->has(Job::factory(2), 'jobs')
            ->create();
    }
}
