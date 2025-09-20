<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create tags
        $tags = Tag::factory(10)->create();

        // Create 10 employers
        $employers = Employer::factory(10)->create();

        // For each employer create 2 jobs and attach two random tags
        $employers->each(function ($employer) use ($tags) {
            Job::factory(2)->create([
                'employer_id' => $employer->id,
            ])->each(function ($job) use ($tags) {
                // attach two random tags
                $job->tags()->attach($tags->random(2)->pluck('id')->toArray());
            });
        });
    }
}
