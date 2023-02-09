<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.dashboard.index');
    }
}
