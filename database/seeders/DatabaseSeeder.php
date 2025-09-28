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
    // Create a test user
    \App\Models\User::factory()->create([
        'name' => 'John Doe',
        'email' => 'test@example.com',
    ]);

    // Create tags
    $tags = \App\Models\Tag::factory(10)->create();

    // Create jobs with employers + attach tags
    \App\Models\Job::factory(20)->create()->each(function ($job) use ($tags) {
        $job->tags()->attach($tags->random(2));
    });
}
}
