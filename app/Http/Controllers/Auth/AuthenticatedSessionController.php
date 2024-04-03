<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\DoubleAuthMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
        // $user = auth()->user();
        // if ($user) {
        //     session()->flush();
        //     Auth::logout();
        //     return view('auth.login');
        // } else {
        //     return view('auth.login');
        // }
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        /** @var User $user */
        $user = auth()->user();

        if ($user->double_auth_permition == 'true') {
            $user->generateTwoFactorCode();
            Mail::to($user->email)->send(new DoubleAuthMail($user->double_auth_code));
            return redirect()->route('doubleAuth.index');
        } else {
            return redirect()->intended(route('product.index', absolute: false))->with('success', 'Connected successfully! '  . $user->name . ' Welcome!');}
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
