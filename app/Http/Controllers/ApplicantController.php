<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
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

    public function downloadCV(User $user)
    {
        $name = $user->applicant->fname . ' ' . $user->applicant->lname;
        $data = [
            'user' => $user
        ];
        $pdf = PDF::loadView('pdf.template', $data);
        return $pdf->download($name . '.pdf');
    }

    public function getCompanies()
    {
        $userIndustry = Auth::user()->applicant->industry;
        $companies = Company::where('industry', $userIndustry)->withCount('jobs')->get();
        return view('applicant.companies', compact('companies'));
    }

    public function subscribe(Request $request)
    {
        // dd($request);
        $data = [
            "_token" => "yoBjCyw53UwQuul3FIKE5jHTtn97pMGoVXp5webr",
            "email" => $request->email
        ];
        if (!Newsletter::isSubscribed($data['email'])) {
            Newsletter::subscribe($data['email']);
        }
        return redirect()->back();
    }
    public function switchAccount()
    {

        Auth::user()->update([
            'role_id' => 3
        ]);
        Auth::user()->applicant->delete();
        return redirect()->route('registerCompany');
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        $user->update([
            'phoneNumber' => $request->input('phoneNumber'),
        ]);

        $applicant->update([
            'currentPost' =>  $request->input('currentPost'),
            'about' => $request->input('about'),
            'adress' => $request->input('adress'),
        ]);

        $cv = $applicant->cv;
        $cv->update([
            'hardSkills' => json_encode(explode(',', $request->input('hardSkills', []))),
            'softSkills' => json_encode(explode(',', $request->input('softSkills', []))),
            'education' => json_encode(explode(',', $request->input('education', []))),
            'languages' => json_encode(explode(',', $request->input('languages', []))),
            'experiences' => json_encode(explode(',', $request->input('experiences', []))),
        ]);
        return redirect()->route('applicant.dashboard');
    }
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();

        return redirect()->route('admin.applicants');
    }
}
