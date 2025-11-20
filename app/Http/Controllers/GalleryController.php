<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Tampilkan galeri dengan karya yang sudah diterima (status: terima)
     */
    public function index()
    {
        $karya = Karya::where('status', 'terima')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('gallery.index', compact('karya'));
    }
}
