<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 employers
        Employer::factory(10)->create()->each(function ($employer) {
            Job::factory(5)->create([
                'employer_id' => $employer->id,
            ]);
        });
    }
}
