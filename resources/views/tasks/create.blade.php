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
            Create draft task
        </h2>
    </div>
    <div>
        <form action="{{ route('task.store') }}" method="post">
            @csrf
            <div class="form-group mb-4">
                <input value="{{ old('name') }}" type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Task name *">
                @if ($errors->first('name'))
                    <div class="text-danger">
                        This field is required
                    </div>
                @endif
            </div>

            <div class="form-group mb-4">
                <select name="priority" class="form-select {{ $errors->first('name') ? 'is-invalid' : '' }}" id="exampleFormControlSelect1">
                    <option value="" selected hidden>--Priority-- *</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
                @if ($errors->first('priority'))
                    <div class="text-danger">
                        This field is required
                    </div>
                @endif
            </div>
            <div class="form-group mb-4">
                <select name="type" class="form-select" id="exampleFormControlSelect1">
                    <option value="0" selected hidden>--Task type--</option>
                    @foreach (\App\Models\TaskType::all() as $type)
                        <option value="{{ $type->id }}">{{ ucFirst($type->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Start date</label><br>
                <input name="start_date" type="text" id="startDate">
            </div>
            <div class="mb-4">
                <label>Deadline</label><br>
                <input name="end_date" type="text" id="endDate">
            </div>
            <div class="form-group mb-4">
                <select name="customer_id" class="form-select" id="exampleFormControlSelect1">
                    <option value="0" selected hidden>--Customer--</option>
                    @foreach (\App\Models\Customer::where('company_id', auth()->user()->company_id)->get() as $customer)
                        <option value="{{ $customer->id }}"> {{ $customer->first_name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <select name="assigned_user_id" class="form-select" id="exampleFormControlSelect1">
                    <option value="0" selected hidden>--Assign to--</option>
                    @foreach (\App\Models\User::where('company_id', auth()->user()->company_id)->get() as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <textarea name="description" placeholder="Description" style="resize: none" class="form-control"
                    id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="form-check mb-4">
                <label class="form-check-label" for="exampleCheck1">
                    Set in progress
                    <input {{ old('status') == '1' ? 'checked' : '' }} value="1" name="status" type="checkbox" class="form-check-input" id="exampleCheck1">
                </label>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Create task</button>
            </div>
        </form>
    </div>
@endsection
