<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $tarif = Tarif::first();
        return response()->json($tarif);
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'harga_per_kwh' => 'required|numeric|min:0',
                'keterangan' => 'nullable|string|max:255'
            ]);

            $tarif = Tarif::first();
            if (!$tarif) {
                $tarif = Tarif::create($validated);
            } else {
                $tarif->update($validated);
            }

            return response()->json([
                'success' => true,
                'message' => 'Tarif berhasil diperbarui',
                'data' => $tarif
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui tarif: ' . $e->getMessage()
            ], 422);
        }
    }
}
