<?php

namespace App\Http\Controllers;

use App\Models\StudentShell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentShellController extends Controller
{
    //
    public function index()
    {
        $student_shells = StudentShell::paginate(15);
        return view('student_shell/index', compact('student_shells'));
    }
    public function my_student_shells()
    {
        $student_shells = StudentShell::where('user_id', Auth::user()->id)-> paginate(5);
        return view('student_shell/index', compact('student_shells'));
    }
}
