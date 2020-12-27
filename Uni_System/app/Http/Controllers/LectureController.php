<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    //
    public function index()
    {
        $lectures = Lecture::paginate(15);
        return view('lecture/index', compact('lectures'));
    }
}
