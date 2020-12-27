<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    //
    public function index()
    {
        $lectures = Lecture::paginate(15);
        return view('lecture/index', compact('lectures'));
    }
    public function create()
    {
        $lecturers =  User::where("status", "lecturer")->get();
        $courses =  Course::all();
        return view('lecture/create', compact('lecturers', 'courses'));
    }
    public function save(Request  $request)
    {
        $lecture = new Lecture($request->all());
        $lecture->save();
        return redirect()->action([LectureController::class, 'index']);
    }

    public function edit(Lecture $lecture)
    {
        $lecturers =  User::where("status", "lecturer")->get();
        $courses =  Course::all();
        return view("lecture/edit", compact('lecture', 'lecturers', 'courses'));
    }

    public function update(Request $request, Lecture $lecture)
    {
        $lecture->update($request->all());
        return redirect()->action([LectureController::class, 'index']);
    }

    public function delete(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->action([LectureController::class, 'index']);
    }
}
