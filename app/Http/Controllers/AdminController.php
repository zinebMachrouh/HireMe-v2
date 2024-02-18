<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'applicants' => Applicant::count(),
            'jobs' => Job::count(),
            'applications' => Job::sum('visits'),
            'companies' => Company::count(),
        ];
        
        return view('admin.dashboard', compact('data'));
    }
    public function getCompanies(){
        $companies = Company::withCount('jobs')->get();
        return view('admin.companies', compact('companies'));
    }
    public function getJobs(){
        $jobs = Job::get();
        return view('admin.jobs', compact('jobs'));
    }
    public function getApplicants(){
        $applicants = Applicant::get();
        return view('admin.applicants', compact('applicants'));
    }
}
