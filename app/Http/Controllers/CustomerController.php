<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $customers = auth()->user()->company->customers;

        return view('customers.index', compact('customers'));
    }

    public function show(int $id)
    {
        $customer = Customer::findOrFail($id);

        $this->authorize('view', $customer);

        return view('customers.show', compact('customer'));
    }
}
