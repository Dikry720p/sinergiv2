<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perangkat;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    /**
     * Menampilkan daftar perangkat
     */
    public function index()
    {
        $perangkats = Perangkat::all();
        return response()->json([
            'success' => true,
            'data' => $perangkats
        ]);
    }

    /**
     * Menyimpan perangkat baru
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'kategori' => 'required|in:Lampu,AC,Komputer',
                'tegangan' => 'required|numeric|min:0',
                'arus' => 'required|numeric|min:0',
                'daya' => 'required|numeric|min:0',
                'status' => 'required|in:aktif,nonaktif'
            ]);

            $perangkat = Perangkat::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Perangkat berhasil ditambahkan',
                'data' => $perangkat
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan perangkat: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Menampilkan detail perangkat
     */
    public function show($id)
    {
        try {
            $perangkat = Perangkat::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $perangkat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Perangkat tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Mengupdate perangkat
     */
    public function update(Request $request, $id)
    {
        try {
            $perangkat = Perangkat::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'kategori' => 'required|in:Lampu,AC,Komputer',
                'tegangan' => 'required|numeric|min:0', // update data dari esp32
                'arus' => 'required|numeric|min:0', // update data dari esp32
                'daya' => 'required|numeric|min:0', // update data dari esp32
                'status' => 'required|in:aktif,nonaktif'
            ]);

            $perangkat->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Perangkat berhasil diperbarui',
                'data' => $perangkat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui perangkat: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Menghapus perangkat
     */
    public function destroy($id)
    {
        try {
            $perangkat = Perangkat::findOrFail($id);
            $perangkat->delete();

            return response()->json([
                'success' => true,
                'message' => 'Perangkat berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus perangkat: ' . $e->getMessage()
            ], 422);
        }
    }
}
