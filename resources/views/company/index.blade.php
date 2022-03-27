@extends('layouts.app')

@section('content')
    {{ $company->name }}
    <h2>
        Customers
    </h2>
    @foreach ($company->customers as $customer)
        Name: {{ $customer->first_name }}
    @endforeach
@endsection