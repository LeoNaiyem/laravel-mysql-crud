@php
    use App\Models\Designation;
    use App\Models\Department;
    $designations = Designation::all();
    $departments = Department::all();

@endphp
@extends('layouts.main')
@section('content')
    <h2>{{$mode === 'edit' ? 'Edit' : 'Create'}} Doctor</h2>
    <form action="{{ $mode === 'edit' ? route('doctors.update', $doctor) : route('doctors.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($mode === 'edit')
            @method('PUT')
        @endif
        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $doctor->name ?? '') }}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $doctor->phone ?? '') }}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="" class="form-control">
        </div>
        <div class="mb-2">
            <label>Designation</label>
            <select name="designation_id" class="form-select" required>
                <option value="">-- Select Designation --</option>
                @foreach($designations as $designation)
                    <option value="{{ $designation->id }}" {{ old('designation_id', $doctor->designation_id ?? '') == $designation->id ? 'selected' : '' }}>
                        {{ $designation->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Department</label>
            <select name="department_id" id="" class="form-select" required>
                <option value="">-- Select Department --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id', $doctor->department_id ?? '') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">{{$mode === 'edit' ? 'Update' : 'Create'}}</button>
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection