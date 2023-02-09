<?php

namespace App\Http\Controllers\Panel\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
