<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Spatie\Newsletter\Facades\Newsletter;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userIndustry = Auth::user()->applicant->industry;

        $jobs = Job::whereHas('company', function ($query) use ($userIndustry) {
            $query->where('industry', $userIndustry);
        })->get();
        return view('applicant.dashboard', compact('jobs'));
    }

    public function applyJob($id)
    {
        Auth::user()->applicant->jobs()->attach($id);
        $job = Job::find($id);
        $job->increment('visits');
        $job->save();
        return redirect()->route('applicant.dashboard');
    }

    public function createCV()
    {
        return view('applicant.cv');
    }

    public function downloadCV()
    {
        $name = Auth::user()->applicant->fname.' '. Auth::user()->applicant->lname;
        $data = [
            'title' => 'Sample PDF',
            'content' => 'This is the content of the PDF.',
        ];

        $pdf = PDF::loadView('pdf.template', $data);

        return $pdf->download($name.'.pdf');
    }

    public function getCompanies()
    {
        $userIndustry = Auth::user()->applicant->industry;
        $companies = Company::where('industry', $userIndustry)->withCount('jobs')->get();
        return view('applicant.companies', compact('companies'));

    }

    public function subscribe()
    {
        try {
            Newsletter::subscribeOrUpdate(Auth::user()->email);
            return redirect()->route('applicant.companies');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
