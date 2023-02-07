<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function companies()
    {
        return view('admin.dashboard.companies');
    }
}
