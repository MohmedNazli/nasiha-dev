<?php

namespace App\Http\Controllers\Panel\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function create(): View
    {
        return view('admin.auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate('admin');

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
