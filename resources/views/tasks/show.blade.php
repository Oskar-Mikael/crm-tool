@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>
            {{ $task->name }}
        </h2>
        <h4 class="mt-2">
            Description
        </h4>
        <p>
            {{ $task->description }}
        </p>
    </div>
    <div class="row my-4">
        <div class="mb-4">
            <a href="{{ route('task.edit', $task) }}">
                <button class="btn btn-warning">
                    Edit task
                </button>
            </a>
        </div>
        <div class="col-2">
            <p>
                Change status
            </p>
            <form method="post" action="{{ route('task.changeStatus', $task) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <select name="status" class="form-select" id="exampleFormControlSelect1">
                        <option selected hidden></option>
                        @foreach (\App\Models\TaskStatus::all() as $status)
                            <option {{ $task->status_id == $status->id ? 'selected' : '' }} value="{{ $status->id }}">
                                {{ ucFirst($status->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection
