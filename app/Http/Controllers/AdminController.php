<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function proses(Request $request)
    {
        $admin = DB::table('admin')->where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

            Session::put('admin_id', $admin->id);
            Session::put('admin_nama', $admin->nama);
            Session::put('role', 'admin');

            return redirect()->route('admin.dashboard')
                ->with('success', 'Selamat Datang Admin, ' . $admin->nama);
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $pesanan = DB::table('pemesanan')
            ->join('customer', 'pemesanan.customer_id', '=', 'customer.id')
            ->join('paket', 'pemesanan.paket_id', '=', 'paket.id')
            ->select(
                'pemesanan.*',
                'customer.nama as nama_cust',
                'customer.no_hp',
                'paket.nama_paket',
                'paket.harga'
            )
            ->orderBy('pemesanan.id', 'desc')
            ->get();

        return view('admin.dashboard', compact('pesanan'));
    }

    public function updateStatus($id, $status)
    {
        try {

            DB::table('pemesanan')
                ->where('id', $id)
                ->update([
                    'status' => $status
                ]);

            return back()->with(
                'success',
                'Status berhasil diubah menjadi ' . $status
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Gagal update: ' . $e->getMessage()
            );
        }
    }

    public function delete($id)
    {
        try {

            DB::table('pemesanan')
                ->where('id', $id)
                ->delete();

            return back()->with(
                'success',
                'Pesanan berhasil dihapus.'
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Gagal menghapus: ' . $e->getMessage()
            );
        }
    }
}