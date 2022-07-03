<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $company = auth()->user()->company;

        return view('index', compact('company'));
    }

    public function settings()
    {
        return view('settings');
    }
}
