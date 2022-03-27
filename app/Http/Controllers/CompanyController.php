<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $company = auth()->user()->company;

        return view('company.index', compact('company'));
    }
}
