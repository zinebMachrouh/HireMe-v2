<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $picturePath = $request->file('picture')->store('profile_pics', 'public');

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $picturePath,
            'role_id' => 2
        ]);

        $user->applicant()->create([
            'fname' => $request->fname,
            'lname' => $request->lname, 
            'title' => $request->title,
            'industry' => $request->industry,
            'user_id' => $user->id
        ]);
        
        event(new Registered($user));

        Auth::login($user);

        return redirect('applicant/dashboard');
    }
}
