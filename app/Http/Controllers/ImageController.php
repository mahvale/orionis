<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
   public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }
}
