<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classrooms;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }


    public function classes()
    {
        $classrooms = Classrooms::orderBy('created_at', 'desc')->get();
        return view('admin.classes',compact('classrooms')); 
    }
}
