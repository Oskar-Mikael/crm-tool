@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="d-flex justify-content-between">
            <div>
                <h2 class="h2">
                    Tasks
                </h2>
            </div>
            <div>
                <a href="/tasks/create">
                    <button class="btn btn-success">
                        New task
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="mt-4">
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
                @foreach ($tasks as $task)
                    <tr class="{{ $task->priority == 'Urgent' ? 'bg-warning' : '' }}" style="cursor: pointer"
                        onclick="window.location='{{ route('task.show', $task->id) }}'">
                        <td>
                            {{ $task->name }}
                        </td>
                        <td>
                            {{ $task->priority ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $task->status->name ?? 'N/A' }}
                        </td>
                        <a href="{{ route('customers.show', $task->customer->id) }}">
                            <td>
                                {{ $task->customer->first_name ?? 'N/A' }}
                            </td>
                        </a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
