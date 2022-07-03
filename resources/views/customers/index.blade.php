@extends('layouts.app')

@section('content')
<div class="row d-flex mt-4">
    <h2 class="h2">
        Customers
    </h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Position
                </th>
                <th>
                    Industry
                </th>
                <th>
                    Budget
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach (auth()->user()->company->customers as $customer)
                <tr style="cursor: pointer" onclick="window.location='{{ route('customers.show', $customer->id) }}'">
                    <td>
                        {{ $customer->first_name }}
                    </td>
                    <td>
                        {{ $customer->position_title ?? 'N/A' }}
                    </td>
                    <td>
                        {{ $customer->industry }}
                    </td>
                    <td>
                        $ {{ number_format($customer->budget) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
