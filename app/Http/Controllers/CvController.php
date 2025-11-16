<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CvController extends Controller
{
   
    public function index()
    {
    
        $cvData = Biodata::with(['pendidikan', 'pengalaman', 'keahlian'])
            ->find(1);

        if (!$cvData) {
            
            return view('errors.data_not_found', [
                'error_message' => 'Data CV dengan ID 1 tidak ditemukan. Mohon isi data di tabel `biodata` terlebih dahulu.'
            ]);
        }

        return view('cv.index', compact('cvData'));
    }
}