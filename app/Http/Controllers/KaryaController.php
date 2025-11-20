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
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:budaya,tari,teater',
            'deskripsi' => 'nullable|string|max:1000',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
        ], [
            'nama.required' => 'Nama karya harus diisi.',
            'jenis.required' => 'Jenis karya harus dipilih.',
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
            'nama' => $validated['nama'],
            'jenis' => $validated['jenis'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'gambar' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard-seniman')
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
        $jenis = $request->query('jenis');
        
        $query = Karya::with('user')->orderBy('created_at', 'desc');
        
        if ($status) {
            $query->where('status', $status);
        }
        
        if ($jenis) {
            $query->where('jenis', $jenis);
        }
        
        $allKarya = $query->get();
        
        return view('dashboard.admin-karya', compact('allKarya', 'status', 'jenis'));
    }

    /**
     * Admin: Update status karya
     */
    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $feedback = $request->input('feedback');

        $validated = $request->validate([
            'status' => 'required|in:tolak,revisi,terima',
            'feedback' => 'nullable|string|max:1000',
        ]);

        // Jika status revisi, feedback harus ada
        if ($validated['status'] === 'revisi' && !$feedback) {
            return back()->withErrors(['feedback' => 'Masukan revisi harus diisi untuk status revisi.']);
        }

        $karya = Karya::findOrFail($id);
        
        $karya->update([
            'status' => $validated['status'],
            'feedback' => $feedback,
        ]);

        $statusLabel = [
            'terima' => 'Diterima',
            'tolak' => 'Ditolak',
            'revisi' => 'Revisi',
        ];

        return back()->with('success', "Karya '{$karya->nama}' telah {$statusLabel[$validated['status']]}.");
    }
}

