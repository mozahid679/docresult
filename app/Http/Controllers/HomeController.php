<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Result;

class HomeController extends Controller
{

    // Search form
    public function searchForm(Request $request)
    {
        $total  = Result::count();
        $male   = Result::where('Gender', 'M')->count();
        $female = Result::where('Gender', 'F')->count();

        $result = null;
        if ($request->has('roll') && $request->roll != '') {
            $result = Result::where('roll', $request->roll)->first();
        }

        return view('welcome', compact('total', 'male', 'female', 'result'));
    }

    // Search by roll\
    public function search(Request $request)
    {
        $request->validate(['roll' => 'required']);
        $result = Result::where('roll', $request->roll)->first();

        // include the same stats so the view always has them
        $total  = Result::count();
        $male   = Result::where('Gender', 'M')->count();
        $female = Result::where('Gender', 'F')->count();

        return view('welcome', compact('result', 'total', 'male', 'female'));
    }
}
