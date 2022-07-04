@extends('layouts.app')

@section('content')
    <div>
        <div class="row">
            <h1 class="h1">
                {{ $company->name }}
            </h1>
            <div class="row text-center mt-4">
                <div class="col-6 col-md-4">
                    <a href="{{ route('customers.index') }}" class="text-decoration-none">
                        <div class="card border-info">
                            <div class="card-body">
                                <h3>
                                    Customers
                                </h3>
                                <p class="h3">
                                    {{ $company->customers->count() }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4">
                    <a href="{{ route('task.index') }}" class="text-decoration-none">
                        <div class="card border-success">
                            <div class="card-body">
                                <h3>
                                    Open tasks
                                </h3>
                                <p class="h3">
                                    {{ $company->tasks->whereIn('status_id', [1, 2])->count() }}
                                </p>
                                <div class="d-flex justify-content-around">
                                    @if ($overdue = $company->tasks->where('end_date', '<', now())->count())
                                        <div class="mt-2 bg-danger p-1 rounded text-white">
                                            {{ $overdue }} overdue
                                        </div>
                                    @endif
                                    @if ($urgent = $company->tasks->where('priority', 'Urgent')->count())
                                        <div class="mt-2 bg-warning p-1 rounded text-white">
                                            {{ $urgent }} urgent
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4">
                </div>
            </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col-4">
                <a href="{{ route('task.index') }}" class="text-decoration-none">
                    <div class="card border-success">
                        <div class="card-body">
                            <h3>
                                New tasks
                            </h3>
                            <p class="h3">
                                {{ $company->openTasks->where('created_at', '<=', \Carbon\Carbon::now()->addDays(7))->count() }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>

    </div>
@endsection
