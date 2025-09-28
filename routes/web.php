<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;


Route::get('/', function () {
    return view('home');
});


Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer','tags')->paginate(10)
    ]);
});


Route::get('/jobs/create', function () {
    return view('jobs.create', [
        'employers' => Employer::all()
    ]);
});


Route::post('/jobs', function () {
    $data = request()->validate([
        'title' => ['required','min:3'],
        'salary' => ['required'],
        'employer_id' => ['required','exists:employers,id'],
    ]);

    \App\Models\Job::create($data);

    return redirect('/jobs');
});


Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all()
    ]);
});


Route::patch('/jobs/{job}', function (Job $job) {
    $data = request()->validate([
        'title' => ['required','min:3'],
        'salary' => ['required'],
        'employer_id' => ['required','exists:employers,id'],
    ]);

    $job->update($data);

    return redirect('/jobs/' . $job->id);
});


Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});


Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});
