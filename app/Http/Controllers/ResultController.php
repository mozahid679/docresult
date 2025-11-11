<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Result;

class ResultController extends Controller
{

    // Show search page
    public function index()
    {
        return view('search');
    }

    // Show upload page
    public function create()
    {
        return view('upload');
    }

    // Handle file upload
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:txt,tsv|max:4096',
        ]);

        $file = $request->file('file');
        $rows = file($file->getRealPath(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($rows as $index => $line) {
            if ($index === 0) continue;

            $data = explode("\t", $line);
            if (count($data) !== 13) continue;

            Result::create([
                'FormSerial' => $data[0] ?? null,
                'pin' => $data[1] ?? null,
                'roll' => $data[2] ?? null,
                'serial' => $data[3] ?? null,
                'fullName' => $data[4] ?? null,
                'Gender' => $data[5] ?? null,
                'TestScore' => $data[6] ?? null,
                'meritScore' => $data[7] ?? null,
                'meritPosition' => $data[8] ?? null,
                'allocatedInstituteCode' => $data[9] ?? null,
                'allocatedInstituteName' => $data[10] ?? null,
                'allocationCriteria' => $data[11] ?? null,
                'allocationStatus' => $data[12] ?? null,
            ]);
        }

        return back()->with('success', 'ফলাফল সফলভাবে আপলোড হয়েছে।');
    }

    // Search form
    public function searchForm()
    {
        $total  = Result::count();
        $male   = Result::where('Gender', 'M')->count();
        $female = Result::where('Gender', 'F')->count();
        $result = null;

        return view('search', compact('total', 'male', 'female', 'result'));
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

        return view('search', compact('result', 'total', 'male', 'female'));
    }
}
