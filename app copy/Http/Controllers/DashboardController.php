<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    
    public function index()
    {
        //
        // $movies = Http::get('http://127.0.0.1:8000/api/movies');
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

   
}
