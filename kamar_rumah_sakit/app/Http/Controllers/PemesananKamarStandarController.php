<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KamarStandar;
use App\Models\PemesananKamarStandar;

class PemesananKamarStandarController extends Controller
{
    public function create()
    {
        $kamarStandar = KamarStandar::all();
        $pemesananKamarStandar = PemesananKamarStandar::all(); // Memuat semua pemesanan kamar standar

        return view('pemesanan-kamar-standar.create', compact('kamarStandar', 'pemesananKamarStandar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'id_kamar' => 'required|exists:kamar_standar,id',
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'nullable|date|after:tanggal_checkin',
        ]);

        // Kurangi stok kamar yang tersedia saat checkin
        $kamar = KamarStandar::findOrFail($request->id_kamar);
        $kamar->ketersediaan--;
        $kamar->save();

        $pemesanan = PemesananKamarStandar::create($request->all());

        return redirect()->route('pemesanan-kamar-standar.create')->with('success', 'Pemesanan Kamar Standar berhasil ditambahkan.');
    }

    public function checkout($id)
    {
        try {
            $pemesanan = PemesananKamarStandar::findOrFail($id);

            if (!$pemesanan->tanggal_checkout) {
                // Kembalikan stok kamar yang tersedia saat checkout
                $kamar = KamarStandar::findOrFail($pemesanan->id_kamar);
                $kamar->ketersediaan++;
                $kamar->save();

                $pemesanan->tanggal_checkout = now(); // Set tanggal checkout menjadi waktu sekarang
                $pemesanan->save();
            }

            return response()->json(['message' => 'Checkout berhasil.']);
        } catch (\Exception $e) {
            // Tangani kesalahan jika ada
            return response()->json(['message' => 'Gagal melakukan checkout.'], 500);
        }
    }
}
