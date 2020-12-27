<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentShell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Course::paginate(15);
        return view('course/index', compact('courses'));
    }
    public function my_courses()
    {
        $courses = StudentShell::where('user_id', Auth::user()->id)->paginate(15);
        return view('course/my_courses', compact('courses'));
    }
    public function create()
    {
        return view('course/create');
    }
    public function save(Request  $request)
    {
        $course = new Course($request->all());
        $course->save();
        return redirect()->action([CourseController::class, 'index']);
    }
    public function edit(Course $course)
    {
        return view("course/edit", compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return redirect()->action([CourseController::class, 'index']);
    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->action([CourseController::class, 'index']);
    }
}
