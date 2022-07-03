@extends('layouts.app')
@section('title', 'Profile page')

@section('content')
    <div class="container">
        <p class="text-red-500">
            Profile
        </p>
        <h2>My Customers</h2>
        @foreach (auth()->user()->customers as $customer)
            <a href="{{ route('customers.show', $customer->id) }}">
                {{ $customer->first_name }} {{ $customer->last_name }}
            </a>
        @endforeach
    </div>
@endsection
