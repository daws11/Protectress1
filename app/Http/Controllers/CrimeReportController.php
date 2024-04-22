<?php

namespace App\Http\Controllers;

use App\Models\CrimeReport;
use Illuminate\Http\Request;

class CrimeReportController extends Controller
{
    public function create()
    {
        return view('report-crime');
    }

    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required|string',
            'location' => 'required|string',
            'evidence' => 'required|image|max:2048' // Memastikan file adalah gambar dan batasi ukuran file maksimum 2MB
        ]);
        
        $path = $request->file('evidence')->store('public/evidence');
        
        $crimeReport = new CrimeReport([
            'details' => $request->input('details'),
            'location' => $request->input('location'),
            'evidence_path' => $path
        ]);
            
        $crimeReport->save();
        

        return redirect()->route('home')->with('success', 'Report submitted successfully!');
    }
}
