<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    /**
     * Tampilkan list karya seniman
     */
    public function indexSeniman()
    {
        $karya = Auth::user()->karya()->orderBy('created_at', 'desc')->get();
        return view('dashboard.seniman-karya', compact('karya'));
    }

    /**
     * Tampilkan form upload karya
     */
    public function create()
    {
        return view('karya.upload');
    }

    /**
     * Simpan karya baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
        ], [
            'judul.required' => 'Judul karya harus diisi.',
            'gambar.required' => 'Gambar karya harus diupload.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        // Upload gambar
        $filename = time() . '_' . Auth::id() . '.' . $request->gambar->extension();
        $path = $request->gambar->storeAs('karya', $filename, 'public');

        // Buat karya
        Karya::create([
            'user_id' => Auth::id(),
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'gambar' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('karya.seniman')
            ->with('success', 'Karya berhasil diupload! Menunggu verifikasi admin.');
    }

    /**
     * Hapus karya
     */
    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);

        // Cek apakah user adalah pemilik karya
        if ($karya->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            return back()->with('error', 'Anda tidak berhak menghapus karya ini.');
        }

        // Hapus gambar
        if ($karya->gambar) {
            Storage::disk('public')->delete($karya->gambar);
        }

        $karya->delete();

        return back()->with('success', 'Karya berhasil dihapus.');
    }

    /**
     * Admin: Tampilkan semua karya
     */
    public function indexAdmin(Request $request)
    {
        $status = $request->query('status');
        
        $query = Karya::with('user')->orderBy('created_at', 'desc');
        
        if ($status) {
            $query->where('status', $status);
        }
        
        $karya = $query->get();
        
        return view('dashboard.admin-karya', compact('karya', 'status'));
    }

    /**
     * Admin: Update status karya
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:draft,pending,approved,rejected',
        ]);

        $karya = Karya::findOrFail($id);
        $karya->update($validated);

        $statusLabel = [
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            'pending' => 'Menunggu',
            'draft' => 'Draft',
        ];

        return back()->with('success', "Karya '{$karya->judul}' telah {$statusLabel[$validated['status']]}.");
    }
}
