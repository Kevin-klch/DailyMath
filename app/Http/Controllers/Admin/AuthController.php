<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function show(Request $request): View|RedirectResponse
    {
        abort_if(blank(config('dailymath.admin_password')), 404);

        if ($request->session()->get(EnsureAdmin::SESSION_KEY)) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $password = (string) config('dailymath.admin_password');
        abort_if($password === '', 404);

        $request->validate(['password' => ['required', 'string']]);

        if (! hash_equals($password, (string) $request->input('password'))) {
            throw ValidationException::withMessages(['password' => 'Das Passwort ist falsch.']);
        }

        $request->session()->regenerate();
        $request->session()->put(EnsureAdmin::SESSION_KEY, true);

        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(EnsureAdmin::SESSION_KEY);
        $request->session()->regenerate();

        return redirect()->route('admin.login');
    }
}
