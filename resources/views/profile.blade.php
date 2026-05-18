<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile | SnapMoment</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-slate-50 min-h-screen">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b border-slate-100 px-8 py-5 flex items-center justify-between">

        <div class="text-3xl font-black italic">
            <span class="text-indigo-600">SNAP</span>MOMENT.
        </div>

        <a href="/"
        class="px-5 py-2 rounded-xl bg-slate-900 text-white text-sm font-bold hover:bg-slate-800 transition">
            Kembali ke Home
        </a>

    </nav>

    <div class="max-w-6xl mx-auto py-14 px-6">

        {{-- PROFILE CARD --}}
        <div class="bg-white rounded-[2rem] shadow-xl p-10 mb-10">

            <div class="flex items-center gap-6">

                @if($user->foto)

<img src="{{ asset('uploads/profile/' . $user->foto) }}"
     class="w-24 h-24 rounded-full object-cover border-4 border-indigo-100">

@else

<div class="w-24 h-24 rounded-full bg-indigo-100 flex items-center justify-center text-4xl text-indigo-600">
    <i class="fa-solid fa-user"></i>
</div>

@endif

                <div>
                    <h1 class="text-3xl font-black text-slate-900">
                        {{ $user->nama }}
                    </h1>

                    <p class="text-slate-500 mt-2">
                        {{ $user->email }}
                    </p>

                    <p class="text-slate-500">
                        {{ $user->no_hp }}
                    </p>
                </div>

            </div>

        </div>

        {{-- HISTORY --}}
        <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden">

            <div class="p-8 border-b border-slate-100">

                <h2 class="text-2xl font-black text-slate-900">
                    Riwayat Booking
                </h2>

                <p class="text-slate-500 mt-2 text-sm">
                    Semua daftar booking yang pernah dilakukan.
                </p>

            </div>

            @if($bookings->isEmpty())

                <div class="p-16 text-center">

                    <div class="text-6xl text-slate-200 mb-5">
                        <i class="fa-solid fa-calendar-xmark"></i>
                    </div>

                    <h3 class="text-xl font-black text-slate-700 mb-2">
                        Belum Ada Booking
                    </h3>

                    <p class="text-slate-400 mb-5">
    Yuk booking fotobooth pertama kamu sekarang.
</p>

<a href="/#packages"
   class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">
    Booking Sekarang
</a>

                </div>

            @else

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="text-left px-8 py-5 text-xs uppercase tracking-widest text-slate-400">
                                Paket
                            </th>

                            <th class="text-left px-8 py-5 text-xs uppercase tracking-widest text-slate-400">
                                Tanggal
                            </th>

                            <th class="text-left px-8 py-5 text-xs uppercase tracking-widest text-slate-400">
                                Lokasi
                            </th>

                            <th class="text-left px-8 py-5 text-xs uppercase tracking-widest text-slate-400">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($bookings as $b)

                        <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                            <td class="px-8 py-6">

                                <div class="font-black text-slate-800">
                                    {{ $b->nama_paket }}
                                </div>

                                <div class="text-sm text-slate-400">
                                    Rp {{ number_format($b->harga,0,',','.') }}
                                </div>

                            </td>

                            <td class="px-8 py-6 text-slate-600 font-semibold">
                                {{ date('d M Y', strtotime($b->tanggal)) }}
                            </td>

                            <td class="px-8 py-6 text-slate-500 italic">
                                {{ $b->lokasi }}
                            </td>

                            <td class="px-8 py-6">

                                @if($b->status == 'PENDING')

                                    <span class="px-4 py-2 rounded-full bg-amber-100 text-amber-600 text-xs font-black">
                                        PENDING
                                    </span>

                                @elseif($b->status == 'DISETUJUI')

                                    <span class="px-4 py-2 rounded-full bg-green-100 text-green-600 text-xs font-black">
                                        DISETUJUI
                                    </span>

                                @else

                                    <span class="px-4 py-2 rounded-full bg-red-100 text-red-600 text-xs font-black">
                                        DITOLAK
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            @endif

        </div>

    </div>
@php
    $sudahTesti = DB::table('testimonial')
                    ->where('customer_id', session('user_id'))
                    ->first();
@endphp

@if(!$sudahTesti)

<div class="mt-10 bg-white rounded-[2rem] p-8 shadow-xl border border-slate-100">

    <h2 class="text-2xl font-black mb-2">
        Beri Testimonial
    </h2>

    <p class="text-slate-500 mb-6">
        Bagikan pengalamanmu menggunakan SnapMoment.
    </p>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="/testimonial" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block mb-2 font-bold text-sm">
                Rating
            </label>

            <select name="rating"
                    class="w-full p-4 rounded-2xl border border-slate-200"
                    required>

                <option value="">Pilih Rating</option>
                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                <option value="4">⭐⭐⭐⭐ (4)</option>
                <option value="3">⭐⭐⭐ (3)</option>
                <option value="2">⭐⭐ (2)</option>
                <option value="1">⭐ (1)</option>

            </select>
        </div>

        <div>
            <label class="block mb-2 font-bold text-sm">
                Komentar
            </label>

            <textarea name="komentar"
                      rows="4"
                      class="w-full p-4 rounded-2xl border border-slate-200"
                      placeholder="Tulis pengalamanmu..."
                      required></textarea>
        </div>

        <button type="submit"
                class="px-6 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

            Kirim Testimonial

        </button>

    </form>

</div>

@endif
</body>
</html>