<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function downloadProfile()
    {
        // Coba beberapa lokasi file yang mungkin untuk Hostinger
        $possiblePaths = [
            public_path('profil.pdf'),                    // Di public folder Laravel
            base_path('public/profil.pdf'),               // Di public folder dari base
            $_SERVER['DOCUMENT_ROOT'] . '/profil.pdf',    // Di public_html langsung
            public_path('../profil.pdf'),                 // Parent directory dari public
            base_path('profil.pdf'),                      // Di root project
        ];
        
        $filePath = null;
        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                $filePath = $path;
                break;
            }
        }
        
        // Jika file tidak ditemukan di path manapun
        if (!$filePath) {
            abort(404, 'Company profile file not found. Please contact administrator.');
        }
        
        // Return file download
        return response()->download($filePath, 'Niranta-Company-Profile.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
