<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.blog');
    }
}
