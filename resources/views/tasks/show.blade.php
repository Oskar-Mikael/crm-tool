@extends('layouts.app')

@section('content')
    <h2>
        {{ $task->name }}
    </h2>
    <div>
        <div>
            <p>
                Change status
            </p>
            <form method="post" action="{{ route('task.changeStatus', $task) }}">
                @csrf
                @method('PUT')
                <div class="form-inline mb-4">
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <option selected hidden></option>
                        @foreach (\App\Models\TaskStatus::all() as $status)
                            <option {{ $task->status_id == $status->id ? 'selected' : '' }} value="{{ $status->id }}">{{ ucFirst($status->name) }}</option>
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
