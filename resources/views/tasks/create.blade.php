@extends('layouts.app')

<head>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</head>
@section('content')
    <div class="mb-4">
        <h2>
            Create task
        </h2>
    </div>
    <div>
        <form action="{{ route('task.store') }}">
            <div class="form-group mb-4">
                <input type="text" class="form-control" id="name" name="name" placeholder="Task name">
            </div>

            <div class="form-group mb-4">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option selected hidden>--Priority--</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
            <div class="mb-4">
                <label>Start date</label>
                <input type="text" id="startDate">
            </div>
            <div class="mb-4">
                <label>Deadline</label>
                <input type="text" id="endDate">
            </div>
            <div class="form-group mb-4">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Create task</button>
            </div>
        </form>
    </div>
@endsection
