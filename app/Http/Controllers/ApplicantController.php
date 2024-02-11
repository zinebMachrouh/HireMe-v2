<?php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userIndustry = Auth::user()->applicant->industry;
        $userId = Auth::user()->applicant->id;

        $jobs = Job::whereHas('company', function ($query) use ($userIndustry) {
            $query->where('industry', $userIndustry);
        })
        ->whereDoesntHave('applicants', function ($query) use ($userId) {
            $query->where('applicant_id', $userId);
        })
        ->get();
        return view('applicant.dashboard',compact('jobs'));
    }

    public function applyJob($id){
        Auth::user()->applicant->jobs()->attach($id);
        return redirect()->route('applicant.dashboard');
    }
}
