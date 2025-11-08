<?php

namespace App\Http\Controllers;

use App\Models\DivisionCenter;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['news'] = News::all();
        $data['divisi'] = DivisionCenter::all();
        return view('index', $data);
    }
}
