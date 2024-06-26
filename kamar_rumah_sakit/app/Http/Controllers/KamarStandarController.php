<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KamarStandar;

class KamarStandarController extends Controller
{
    public function create()
    {
        $kamarStandar = KamarStandar::all();
        return view('kamar-standar.create', compact('kamarStandar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|max:10',
            'jenis_tempat_tidur' => 'required|string|max:50',
            'kapasitas' => 'required|integer',
            'ketersediaan' => 'required|integer',
        ]);

        KamarStandar::create($request->all());

        return redirect()->route('kamar-standar.create')->with('success', 'Kamar Standar berhasil ditambahkan.');
    }
}
