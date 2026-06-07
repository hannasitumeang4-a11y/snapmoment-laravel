<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function home()
    {
        $testimonials = DB::table('testimonial')
                        ->join('customer', 'testimonial.customer_id', '=', 'customer.id')
                        ->select('testimonial.*', 'customer.nama')
                        ->orderBy('testimonial.id', 'desc')
                        ->get();

        return view('welcome', compact('testimonials'));
    }

    public function booking() 
    {
        if (!Session::has('user_id')) {
            return redirect('/login')->with('error', 'Silakan login dulu.');
        }

        return view('booking');
    }

    public function store(Request $request)
    {
        try {
            $customerId = Session::get('user_id');

            if (!$customerId) {
                return redirect('/login')->with('error', 'Sesi habis, silakan login ulang.');
            }

            // VALIDASI
            $request->validate([
                'pembayaran' => 'required',
                'bukti_bayar' => 'required_if:pembayaran,qris|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // FORMAT TANGGAL
            $tgl = date('Y-m-d', strtotime($request->tanggal));

            // UPLOAD BUKTI
            $namaFileBukti = null;
            if ($request->pembayaran == 'qris' && $request->hasFile('bukti_bayar')) {
                $file = $request->file('bukti_bayar');
                $namaFileBukti = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/proofs'), $namaFileBukti);
            }

            // INSERT DATABASE
            // Gunakan insertGetId untuk mengambil ID yang baru saja dibuat
            $newBookingId = DB::table('pemesanan')->insertGetId([
                'customer_id' => (int)$customerId,
                'paket_id'    => (int)$request->paket_id,
                'tanggal'     => $tgl,
                'lokasi'      => $request->lokasi,
                'status'      => 'PENDING',
                'pembayaran'  => $request->pembayaran,
                'bukti_bayar' => $namaFileBukti
            ]);

            // Alihkan keduanya ke halaman nota menggunakan ID baru
            return redirect()->route('booking.nota', $newBookingId);

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal Simpan: ' . $e->getMessage());
        }
    }

    public function success() 
    {
        return view('booking-success');
    }

    public function nota($id)
    {
        $booking = DB::table('pemesanan')
            ->join('paket', 'pemesanan.paket_id', '=', 'paket.id')
            ->join('customer', 'pemesanan.customer_id', '=', 'customer.id')
            ->where('pemesanan.id', $id)
            ->select(
                'pemesanan.*',
                'paket.nama_paket',
                'paket.harga',
                'customer.nama'
            )
            ->first();

        if (!$booking) {
            return redirect('/')->with('error', 'Data transaksi tidak ditemukan.');
        }

        return view('nota', compact('booking'));
    }
}