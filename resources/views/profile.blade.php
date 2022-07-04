@extends('layouts.app')
@section('title', 'Profile page')

@section('content')
    <div class="container">
        <h1>
            Profile
        </h1>
        <div class="row d-flex mt-4">
            <h2 class="h2">
                My Customers
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
                    @foreach (auth()->user()->customers as $customer)
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
        <div class="row mt-4">
            <h2>
                My Tasks
            </h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Priority
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Customer
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->tasks as $task)
                        <tr class="{{ $task->priority == 'Urgent' ? 'bg-warning' : '' }}" style="cursor: pointer"
                            onclick="window.location='{{ route('task.show', $task->id) }}'">
                            <td>
                                @if ($task->created_at <= \Carbon\Carbon::now()->addDays(7))
                                <span class="badge rounded-pill bg-success">New</span>
                                @endif
                                {{ $task->name }}
                            </td>
                            <td>
                                {{ ucFirst($task->priority) ?? 'N/A' }}
                            </td>
                            <td>
                                {{ ucFirst($task->status->name) ?? 'N/A' }}
                            </td>
                            @if ($task->customer)
                                <a href="{{ route('customers.show', $task->customer->id) }}">
                                    <td>
                                        {{ $task->customer->first_name ?? 'N/A' }}
                                    </td>
                                </a>
                            @else
                                <td>
                                    N/A
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
