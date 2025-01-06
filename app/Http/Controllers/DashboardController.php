<?php

namespace App\Http\Controllers;

use App\Models\Perangkat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $perangkat = Perangkat::all();

        $totalPerangkats = $perangkat->count();
        $activePerangkats = $perangkat->where('status', 'active')->count();
        $totalConsumption = $perangkat->sum('watt');

        // Asumsi biaya per kWh
        $kwhRate = 1445; // Sesuaikan dengan tarif PLN
        $estimatedCost = ($totalConsumption * 24 * 30 * $kwhRate) / 1000;

        return view('dashboard', compact(
            'perangkats',
            'totalPerangkats',
            'activePerangkats',
            'totalConsumption',
            'estimatedCost'
        ));
    }
}
