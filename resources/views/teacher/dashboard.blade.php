<!-- resources/views/teacher/dashboard.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Teacher Dashboard</h1>

        <!-- Display the current session and previous/upcoming sessions -->
        <h2>Current Session</h2>
        <div class="card">
            <div class="card-body">
                <h4>Class: {{ $classes->first()->class_name }}</h4>
                <p>Start Time: {{ $classes->first()->starttime }}</p>
                <p>End Time: {{ $classes->first()->endtime }}</p>
            </div>
        </div>

        <h2 class="mt-4">Upcoming Sessions</h2>
        @foreach ($classes as $class)
            <div class="card mt-2">
                <div class="card-body">
                    <h5>Class: {{ $class->class_name }}</h5>
                    <p>Start Time: {{ $class->starttime }}</p>
                    <p>End Time: {{ $class->endtime }}</p>
                    <!-- Link to the attendance form -->
                    <a href="{{ route('teacher.showAttendanceForm', $class->id) }}" class="btn btn-primary">Mark Attendance</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
