@php
    use App\Models\Patient;
    use App\Models\Doctor;
    $patients = Patient::all();
    $doctors = Doctor::all();
@endphp
@extends('layouts.main')
@section('content')
    <h2>{{ $mode === 'edit' ? 'Update' : 'Create' }} Appointment</h2>
    <form action="{{ $mode === 'edit' ? route('appointments.update', $appointment) : route('appointments.store') }}"
        method="POST">
        @csrf
        @if ($mode === 'edit')
            @method('PUT')
        @endif
        <div class="mb-2">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-select">
                <option value="">-- Select Patient--</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ old('patient_id', $appointment->patient_id ?? '') ? 'selected' : '' }}>{{$patient->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="" class="form-select">
                <option value="">-- Select Doctor --</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ old('doctor_id', $appointment->doctor_id ?? '') === $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="appointment_at">Appointment Date</label>
            <input type="datetime-local" name="appointment_at" class="form-control"
                value="{{ old('appointment_at', isset($appointment->appointment_at) ? \Carbon\Carbon::parse($appointment->appointment_at)->format('Y-m-d\TH:i') : '') }}">

        </div>
        <div class="mb-2">
            <label for="cc">Chief Complaint</label>
            <textarea name="cc" class="form-control">
                        {{ old('cc', $appointment->cc ?? '') }}
                    </textarea>
        </div>
        <button class="btn btn-success">{{$mode === 'edit' ? 'Update' : 'Create'}}</button>
    </form>
@endsection