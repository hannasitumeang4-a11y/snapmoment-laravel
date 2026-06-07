<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function login() {
        return view('login');
    }

    public function register() {
        return view('admin.register');
    }

    public function prosesLogin(Request $request) {

        $key = $request->email;

        // LOGIN ADMIN
        $admin = DB::table('admin')
                    ->where('username', $key)
                    ->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

            Session::put('admin_id', $admin->id);
            Session::put('role', 'admin');

            return redirect()->route('admin.dashboard');
        }

        // LOGIN CUSTOMER
        $user = DB::table('customer')
                    ->where('email', $key)
                    ->first();

        if ($user) {

            Session::put('user_id', $user->id);
            Session::put('nama', $user->nama);
            Session::put('role', 'customer');

            return redirect('/')->with('success', 'Selamat datang!');
        }

        return back()->with('error', 'Akun tidak ditemukan.');
    }

    public function prosesRegister(Request $request) {

        $namaFoto = null;

        // upload foto
        if($request->hasFile('foto')) {

            $file = $request->file('foto');

            $namaFoto = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('uploads/profile'), $namaFoto);
        }

        DB::table('customer')->insert([

            'nama' => $request->nama,

            'email' => $request->email,

            'no_hp' => $request->no_hp,

            'foto' => $namaFoto

        ]);

        return redirect('/login')->with('success', 'Silakan Login.');
    }

    // =========================
    // PROFILE
    // =========================

    public function profile()
    {
        if(!Session::has('user_id')) {

            return redirect('/login')
                    ->with('error', 'Silakan login dulu.');
        }

        $user = DB::table('customer')
                    ->where('id', session('user_id'))
                    ->first();

        $bookings = DB::table('pemesanan')
                    ->join('paket', 'pemesanan.paket_id', '=', 'paket.id')
                    ->where('customer_id', session('user_id'))
                    ->select(
                        'pemesanan.*',
                        'paket.nama_paket',
                        'paket.harga'
                    )
                    ->orderBy('pemesanan.id', 'desc')
                    ->get();

        return view('profile', compact('user', 'bookings'));
    }

    // =========================
    // STORE TESTIMONIAL
    // =========================

    public function storeTestimonial(Request $request)
    {
        if(!Session::has('user_id')) {
            return redirect('/login');
        }

        $cek = DB::table('testimonial')
                    ->where('customer_id', session('user_id'))
                    ->first();

        if($cek) {

            return back()->with(
                'error',
                'Kamu sudah pernah memberikan testimonial.'
            );
        }

        DB::table('testimonial')->insert([
            'customer_id' => session('user_id'),
            'rating' => $request->rating,
            'pesan' => $request->komentar,
            'created_at' => now()
        ]);

        return back()->with(
            'success',
            'Terima kasih atas testimonialnya!'
        );
    }

    // =========================
    // LOGOUT
    // =========================

    public function logout() {

        Session::flush();

        return redirect('/');
    }
}