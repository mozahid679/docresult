<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Result;

class DashboardController extends Controller
{
    // Search by roll\
    public function index()
    {

        $total  = Result::count();
        $male   = Result::where('Gender', 'M')->count();
        $female = Result::where('Gender', 'F')->count();
        $meritScore = Result::max('meritScore');

        return view('dashboard', compact('total', 'male', 'female', 'meritScore'));
    }
}
