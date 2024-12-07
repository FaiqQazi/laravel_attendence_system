<?php
// namespace App\Http\Controllers;

// use App\Models\ClassModel;
// use App\Models\Attendance;
// use Illuminate\Http\Request;

// class TeacherController extends Controller
// {
//     // Display the dashboard for teachers
//     public function index()
//     {
//         $user = auth()->user(); // You can still use auth() here to get the current logged-in user
//         $classes = $user->classes;

//         return view('teacher.dashboard', compact('classes'));
//     }

//     // Mark attendance for a class session
//     public function markAttendance(Request $request, $classId)
//     {
//         $class = ClassModel::find($classId);
    
//         if (!$class) {
//             return redirect()->route('teacher.dashboard')->with('error', 'Class not found');
//         }
    
//         $students = $class->students; // Retrieve all students for this class
    
//         if ($students->isEmpty()) {
//             return redirect()->route('teacher.dashboard')->with('error', 'No students enrolled in this class');
//         }
    
//         foreach ($students as $student) {
//             Attendance::create([
//                 'classid' => $class->id,
//                 'studentid' => $student->id,
//                 'isPresent' => $request->has('present_'.$student->id) ? 1 : 0,
//                 'comments' => $request->input('comments_'.$student->id),
//             ]);
//         }
    
//         return redirect()->route('teacher.dashboard')->with('success', 'Attendance has been marked!');
//     }
    
// }
// TeacherController.php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Attendance;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Display the dashboard for teachers
    public function index()
    {
        $user = auth()->user(); // Get the current logged-in user
        $classes = $user->classes;

        return view('teacher.dashboard', compact('classes'));
    }

    // Show the attendance form for a class
    public function showAttendanceForm($classId)
    {
        $class = ClassModel::find($classId);
    
        if (!$class) {
            return redirect()->route('teacher.dashboard')->with('error', 'Class not found');
        }
    
        $students = $class->students; // Retrieve all students for this class
    
        if ($students->isEmpty()) {
            return redirect()->route('teacher.dashboard')->with('error', 'No students enrolled in this class');
        }
    
        return view('teacher.mark-attendance', compact('class', 'students'));
    }

    // Mark attendance for a class session
    public function markAttendance(Request $request, $classId)
    {
        $class = ClassModel::find($classId);
    
        if (!$class) {
            return redirect()->route('teacher.dashboard')->with('error', 'Class not found');
        }
    
        $students = $class->students; // Retrieve all students for this class
    
        if ($students->isEmpty()) {
            return redirect()->route('teacher.dashboard')->with('error', 'No students enrolled in this class');
        }
    
        foreach ($students as $student) {
            Attendance::create([
                'classid' => $class->id,
                'studentid' => $student->id,
                'isPresent' => $request->has('present_'.$student->id) ? 1 : 0,
                'comments' => $request->input('comments_'.$student->id),
            ]);
        }
    
        return redirect()->route('teacher.dashboard')->with('success', 'Attendance has been marked!');
    }
}
