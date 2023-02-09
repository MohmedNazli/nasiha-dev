<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;


class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function companies()
    {
        $companies = User::typeCustomer()->get();
        return view('admin.dashboard.companies', compact('companies'));
    }


    public function storeCompany(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => User::COMPANY_USER,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'avatar' => 'images/logo.png',
        ]);

        event(new Registered($user));

        return back();
    }
}
