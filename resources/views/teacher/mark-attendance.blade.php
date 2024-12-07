<!-- resources/views/teacher/mark-attendance.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Mark Attendance for {{ $class->class_name }}</h1>

        <!-- Attendance form -->
        <form action="{{ route('teacher.storeAttendance', $class->id) }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Present</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->fullname }}</td>
                            <td>
                                <input type="checkbox" name="present_{{ $student->id }}" class="form-check-input">
                            </td>
                            <td>
                                <textarea class="form-control" name="comments_{{ $student->id }}" rows="2"></textarea>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success mt-3">Submit Attendance</button>
        </form>
    </div>
@endsection
