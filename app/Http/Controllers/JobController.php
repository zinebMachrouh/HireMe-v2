<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function searchJobs(Request $request)
    {
        $search = $request->input('search');

        $query = Job::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('skills', 'like', '%' . $search . '%')
                ->orWhere('contract', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%');
        }

        $jobs = $query->get();

        return view('applicant.dashboard', compact('jobs'));
    }

    public function getJobs($id){
        $company = Company::find($id);
        $jobs = $company->jobs;
        return view('applicant.dashboard', compact('jobs'));
    }

    public function create()  {
        return view('company.createJob');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'skills' => 'required|string',
            'contract' => 'required|string',
            'location' => 'required|string',
        ]);

        $skillsArray = json_encode(explode(',', $validatedData['skills']));

        Job::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'skills' => $skillsArray,
            'contract' => $validatedData['contract'],
            'location' => $validatedData['location'],
            'company_id' => Auth::user()->company->id, 
        ]);

        return redirect()->route('company.dashboard');
    }
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs');
    }
}
