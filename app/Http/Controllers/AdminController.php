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
            'applications' => Applicant::whereHas('jobs')->count(),
            'companies' => Company::count(),
        ];
        
        return view('admin.dashboard', compact('data'));
    }
    public function getCompanies(){
        $companies = Company::withCount('jobs')->get();
        return view('admin.companies', compact('companies'));
    }
}
