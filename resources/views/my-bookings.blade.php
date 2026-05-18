<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Saya | SnapMoment</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-slate-50 min-h-screen p-6">

    <div class="max-w-5xl mx-auto">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900">
                    Riwayat Pesanan
                </h1>

                <p class="text-slate-500">
                    Halo {{ session('nama') }}, berikut daftar booking kamu.
                </p>
            </div>

            <a href="/"
               class="px-5 py-2 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">

            @if($bookings->isEmpty())

                <div class="p-20 text-center">

                    <div class="text-slate-200 text-6xl mb-4">
                        <i class="fa-solid fa-calendar-xmark"></i>
                    </div>

                    <p class="text-slate-400 font-medium">
                        Belum ada pesanan nih.
                    </p>

                    <a href="/#packages"
                       class="text-indigo-600 font-bold hover:underline mt-2 inline-block">
                        Booking sekarang?
                    </a>

                </div>

            @else

                <table class="w-full text-left border-collapse">

                    <thead>

                        <tr class="bg-slate-50/50 border-b border-slate-100">

                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                Paket
                            </th>

                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                Tanggal
                            </th>

                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                Lokasi
                            </th>

                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                Pembayaran
                            </th>

                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                Status
                            </th>

                            <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-50">

                        @foreach($bookings as $b)

                        <tr class="hover:bg-slate-50/30 transition">

                            {{-- PAKET --}}
                            <td class="px-6 py-5">

                                <div class="font-bold text-slate-900">
                                    {{ $b->nama_paket }}
                                </div>

                                <div class="text-xs text-slate-400">
                                    Rp {{ number_format($b->harga, 0, ',', '.') }}
                                </div>

                            </td>

                            {{-- TANGGAL --}}
                            <td class="px-6 py-5 text-sm text-slate-600 font-medium">

                                {{ date('d M Y', strtotime($b->tanggal)) }}

                            </td>

                            {{-- LOKASI --}}
                            <td class="px-6 py-5 text-sm text-slate-500 italic">

                                {{ $b->lokasi }}

                            </td>

                            {{-- PEMBAYARAN --}}
                            <td class="px-6 py-5">

                                @if($b->pembayaran == 'cash')

                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-slate-100 text-slate-600">
                                        CASH
                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-indigo-100 text-indigo-600">
                                        QRIS
                                    </span>

                                @endif

                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                @if($b->status == 'PENDING')

                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-amber-100 text-amber-600">
                                        PENDING
                                    </span>

                                @elseif($b->status == 'DISETUJUI')

                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-green-100 text-green-600">
                                        DISETUJUI
                                    </span>

                                @elseif($b->status == 'DITOLAK')

                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-red-100 text-red-600">
                                        DITOLAK
                                    </span>

                                @endif

                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-5">

                                <div class="flex gap-2">

                                    {{-- LIHAT BUKTI BAYAR --}}
                                    @if($b->bukti_bayar)

                                        <a href="/uploads/proofs/{{ $b->bukti_bayar }}"
                                           target="_blank"
                                           class="px-3 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-xs font-bold hover:bg-indigo-100 transition">

                                            <i class="fa-solid fa-image mr-1"></i>
                                            Bukti

                                        </a>

                                    @endif

                                    {{-- STATUS DISETUJUI --}}
                                    @if($b->status == 'DISETUJUI')

                                        <span class="px-3 py-2 bg-green-50 text-green-600 rounded-xl text-xs font-bold">

                                            <i class="fa-solid fa-circle-check mr-1"></i>
                                            Booking Diterima

                                        </span>

                                    @endif

                                    {{-- STATUS DITOLAK --}}
                                    @if($b->status == 'DITOLAK')

                                        <span class="px-3 py-2 bg-red-50 text-red-600 rounded-xl text-xs font-bold">

                                            <i class="fa-solid fa-circle-xmark mr-1"></i>
                                            Booking Ditolak

                                        </span>

                                    @endif

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            @endif

        </div>

    </div>

</body>
</html>