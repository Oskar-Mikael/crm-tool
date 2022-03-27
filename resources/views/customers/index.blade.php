@extends('layouts.app')

@section('content')
    Customers
    @foreach ($customers as $customer)
        {{ $customer->first_name }}
    @endforeach
@endsection
