<!-- resources/views/student/attendance.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Your Attendance</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Attendance Status</th>
                    <th>Comments</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr style="background-color: 
                        @if ($attendance->isPresent == 0 && $attendance->class->attendance_percentage < 75) red 
                        @elseif ($attendance->class->attendance_percentage < 85) yellow
                        @else green 
                        @endif;">
                        <td>{{ $attendance->class->class_name }}</td>
                        <td>{{ $attendance->isPresent ? 'Present' : 'Absent' }}</td>
                        <td>{{ $attendance->comments }}</td>
                        <td>{{ $attendance->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
