<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/applyJob/{id}', [ApplicantController::class, 'applyJob'])->name('applyJob');
    Route::get('/getJobs/{id}', [JobController::class, 'getJobs'])->name('getJobs');
    Route::get('/myCV', [ApplicantController::class, 'createCV'])->name('createCV');
    Route::get('/download/{user}', [ApplicantController::class, 'downloadCV'])->name('downloadCV');
    Route::get('/jobs/search', [JobController::class, 'searchJobs'])->name('jobs.search');
    Route::get('/companies/search', [CompanyController::class, 'searchCompanies'])->name('companies.search');
    Route::get('/applicant/dashboard', [ApplicantController::class, 'index'])->name('applicant.dashboard');
    Route::get('/applicant/companies', [ApplicantController::class, 'getCompanies'])->name('applicant.companies');
    Route::get('/subscribe', [ApplicantController::class, 'subscribe'])->name('subscribe');
    Route::put('/cv/update', [ApplicantController::class, 'update'])->name('update.cv');
});
Route::get('/switchAccount', [ApplicantController::class, 'switchAccount'])->name('switchAccount');

Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.dashboard');
    Route::get('/company/register', [CompanyController::class, 'registerCompany'])->name('registerCompany');
    
    Route::post('/company/store',[CompanyController::class, 'store'])->name('store.company');

    Route::get('/company/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/company/jobs/store', [JobController::class, 'store'])->name('jobs.store');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/companies', [AdminController::class, 'getCompanies'])->name('admin.companies');
    Route::get('/admin/jobs', [AdminController::class, 'getJobs'])->name('admin.jobs');
    Route::get('/admin/applicants', [AdminController::class, 'getApplicants'])->name('admin.applicants');
    Route::delete('company/delete/{company}', [CompanyController::class, 'destroy'])->name('company.delete');
    Route::delete('job/delete/{job}', [JobController::class, 'destroy'])->name('job.delete');
    Route::delete('applicant/delete/{applicant}', [ApplicantController::class, 'destroy'])->name('applicant.delete');
});