<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyId = Auth::user()->company->id;

        $applicants = Applicant::whereHas('jobs', function ($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })->with('jobs')->get();
        return view('company.dashboard', compact('applicants'));
    }
    public function searchCompanies(Request $request)
    {
        $search = $request->input('search');

        $query = Company::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('slogan', 'like', '%' . $search . '%')
                ->orWhere('industry', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        $companies = $query->get();

        return view('applicant.companies', compact('companies'));
    }

    public function registerCompany()
    {
        return view('company.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slogan' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);


        $user = Auth::user();

        $user->company()->create([
            'name' => $request->name,
            'slogan' => $request->slogan,
            'industry' => $request->industry,
            'description' => $request->description,
            'user_id' => $user->id
        ]);

        return redirect()->route('company.dashboard');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.companies');
    }
}
