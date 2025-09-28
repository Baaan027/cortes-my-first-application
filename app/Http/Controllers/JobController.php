<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::with(['employer','tags'])->paginate(10);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {

        $employers = Employer::all();
        return view('jobs.create', ['employers' => $employers]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','min:3'],
            'salary' => ['required'],
            'employer_id' => ['required','exists:employers,id'],
        ]);

        $job = Job::create($data);

        return redirect()->route('jobs.show', $job->id)
                         ->with('success', 'Job created successfully.');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        $employers = Employer::all();
        return view('jobs.edit', ['job' => $job, 'employers' => $employers]);
    }


    public function update(Request $request, Job $job)
    {
        $data = $request->validate([
            'title' => ['required','min:3'],
            'salary' => ['required'],
            'employer_id' => ['required','exists:employers,id'],
        ]);

        $job->update($data);

        return redirect()->route('jobs.show', $job->id)
                         ->with('success', 'Job updated successfully.');
    }


    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted.');
    }
}
