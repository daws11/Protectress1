<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class EmergencyController extends Controller
{
    public function sendWhatsApp(Request $request)
    {
        $user = Auth::user();
        $contact = $user->emergency_contact; // Asumsi ada kolom 'emergency_contact' di tabel users
        $latitude = $request->lat;
        $longitude = $request->lng;

        $message = "Kirim Ke $contact, Saya berada di koordinat $latitude, $longitude dalam keadaan darurat, TOLONG SAYA!";
        $encodedMessage = urlencode($message);
        $url = "https://wa.me/$contact?text=$encodedMessage";

        return redirect()->to($url);
    }
}

