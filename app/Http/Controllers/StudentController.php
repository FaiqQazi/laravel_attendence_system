<?php
// namespace App\Http\Controllers;

// use App\Models\Attendance;
// use Illuminate\Http\Request;
// use Carbon\Carbon;

// class StudentController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     public function index()
//     {
//         $user = auth()->user();
//         $attendances = $user->attendances;
        
//         // Calculate attendance percentage for each class
//         $attendancesGroupedByClass = $attendances->groupBy('classid');
//         foreach ($attendancesGroupedByClass as $classId => $attendancesForClass) {
//             $totalClasses = $attendancesForClass->count();
//             $classesAttended = $attendancesForClass->where('isPresent', 1)->count();
//             $attendancePercentage = ($classesAttended / $totalClasses) * 100;

//             foreach ($attendancesForClass as $attendance) {
//                 // Add the calculated percentage to the attendance object for use in the view
//                 $attendance->class->attendance_percentage = $attendancePercentage;
//             }
//         }

//         return view('student.attendance', compact('attendances'));
//     }
// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Auth helper usage to get the logged-in user
        $attendances = $user->attendances;
        
        // Calculate attendance percentage for each class
        $attendancesGroupedByClass = $attendances->groupBy('classid');
        $attendancePercentages = [];

        foreach ($attendancesGroupedByClass as $classId => $attendancesForClass) {
            $totalClasses = $attendancesForClass->count();
            $classesAttended = $attendancesForClass->where('isPresent', 1)->count();
            $attendancePercentage = ($totalClasses > 0) ? ($classesAttended / $totalClasses) * 100 : 0;

            // Store the calculated percentage for each class
            $attendancePercentages[$classId] = $attendancePercentage;
        }

        // Pass attendance percentages with attendances
        return view('student.attendance', compact('attendances', 'attendancePercentages'));
    }
}
