<?php

namespace App\Http\Controllers;

use App\Models\Perangkat;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    public function index()
    {
        $perangkats = Perangkat::all();
        $tarif = Tarif::first();

        // Jika tarif belum ada, buat default
        if (!$tarif) {
            $tarif = Tarif::create([
                'harga_per_kwh' => 1445.00,
                'keterangan' => 'Tarif Dasar Listrik'
            ]);
        }

        $totalDevices = $perangkats->count();
        $activeDevices = $perangkats->where('status', 'aktif')->count();
        $totalConsumption = $perangkats->sum('daya'); // dalam satuan watt
        // $estimatedCost = ($totalConsumption / 1000) * 24 * 30 * $tarif->harga_per_kwh;
        $kilowatt = ($totalConsumption / 1000);
        $energiharian = ($kilowatt * 24);
        $energibulanan = ($energiharian * 30);
        $estimatedCost = ($energibulanan * $tarif->harga_per_kwh);

        return view('dashboard', compact(
            'perangkats',
            'totalDevices',
            'activeDevices',
            'kilowatt',
            'estimatedCost',
            'tarif'
        ));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'kategori' => 'required|in:Lampu,AC,Komputer',
                'daya' => 'required|numeric|min:0',
                'status' => 'required|in:aktif,nonaktif'
            ]);

            $perangkat = Perangkat::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Perangkat berhasil ditambahkan',
                'data' => $perangkat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan perangkat: ' . $e->getMessage()
            ], 422);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $perangkat = Perangkat::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'kategori' => 'required|in:Lampu,AC,Komputer',
                'daya' => 'required|numeric|min:0',
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

    public function toggleStatus($id)
    {
        try {
            $perangkat = Perangkat::findOrFail($id);
            $perangkat->status = $perangkat->status === 'aktif' ? 'nonaktif' : 'aktif';
            $perangkat->save();

            return response()->json([
                'success' => true,
                'message' => 'Status perangkat berhasil diubah',
                'status' => $perangkat->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah status perangkat: ' . $e->getMessage()
            ], 422);
        }
    }

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
}
