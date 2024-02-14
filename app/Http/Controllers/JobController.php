<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

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
        
    }
}
