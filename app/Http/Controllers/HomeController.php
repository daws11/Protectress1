<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrimeReport; 

class HomeController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showForum()
    {
        return view('forum');
    }
    
    public function submitCrimeReport(Request $request)
    {
        // Validasi data pelaporan
        $request->validate([
            'crime_description' => 'required|string',
            'crime_evidence' => 'nullable|file',
        ]);

        // Simpan laporan kejahatan seksual ke dalam database
        $crimeReport = new CrimeReport;
        $crimeReport->crime_description = $request->crime_description;

        if ($request->hasFile('crime_evidence')) {
            $path = $request->file('crime_evidence')->store('crime_evidence');
            $crimeReport->crime_evidence = $path;
        }

        $crimeReport->save();

        return redirect()->route('home')->with('success', 'Laporan kejahatan seksual berhasil disimpan.');
    }
}
