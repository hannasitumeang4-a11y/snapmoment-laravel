<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | SnapMoment</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-slate-50 font-sans">

<div class="flex">

    <div class="w-64 bg-slate-900 min-h-screen p-6 text-white">

        <h2 class="text-2xl font-black italic mb-10">
            SNAP ADMIN
        </h2>

        <nav class="space-y-4">

            <a href="#"
               class="block p-3 bg-indigo-600 rounded-xl font-bold italic">
                <i class="fa-solid fa-gauge mr-2"></i>
                Dashboard
            </a>

            <a href="/logout"
               class="block p-3 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-power-off mr-2"></i>
                Logout
            </a>

        </nav>
    </div>

    <div class="flex-1 p-10">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-3xl font-black text-slate-800">
                    Kelola Pesanan
                </h1>

                <p class="text-slate-400 text-sm mt-1">
                    Semua transaksi booking customer SnapMoment.
                </p>
            </div>

        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-2xl mb-5 text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-2xl mb-5 text-sm font-semibold">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden">

            <table class="w-full text-left">

                <thead class="bg-slate-50 border-b border-slate-100">

                    <tr>

                        <th class="p-6 text-xs font-bold text-slate-400 uppercase">
                            Customer
                        </th>

                        <th class="p-6 text-xs font-bold text-slate-400 uppercase">
                            Paket
                        </th>

                        <th class="p-6 text-xs font-bold text-slate-400 uppercase">
                            Pembayaran
                        </th>

                        <th class="p-6 text-xs font-bold text-slate-400 uppercase">
                            Bukti
                        </th>

                        <th class="p-6 text-xs font-bold text-slate-400 uppercase">
                            Status
                        </th>

                        <th class="p-6 text-xs font-bold text-slate-400 uppercase">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                @foreach($pesanan as $p)

                    <tr class="hover:bg-slate-50 transition">

                        <td class="p-6">

                            <div class="font-bold text-slate-800">
                                {{ $p->nama_cust }}
                            </div>

                            <div class="text-xs text-slate-400">
                                {{ $p->no_hp }}
                            </div>

                        </td>

                        <td class="p-6">

                            <div class="font-bold text-indigo-600">
                                {{ $p->nama_paket }}
                            </div>

                            <div class="text-xs text-slate-400">
                                Rp {{ number_format($p->harga,0,',','.') }}
                            </div>

                        </td>

                        <td class="p-6">

                            @if($p->pembayaran == 'qris')

                                <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-600 text-xs font-bold">
                                    QRIS
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs font-bold">
                                    CASH
                                </span>

                            @endif

                        </td>

                        <td class="p-6">

                            @if($p->bukti_bayar)

                                <a href="{{ asset('uploads/proofs/'.$p->bukti_bayar) }}"
                                   target="_blank"
                                   class="text-indigo-600 font-bold text-sm hover:underline">
                                    Lihat Bukti
                                </a>

                            @else

                                <span class="text-slate-300 text-sm">
                                    Tidak Ada
                                </span>

                            @endif

                        </td>

                        <td class="p-6">

                            @if($p->status == 'PENDING')

                                <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-600 text-xs font-black">
                                    PENDING
                                </span>

                            @elseif($p->status == 'DISETUJUI')

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs font-black">
                                    DISETUJUI
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-xs font-black">
                                    DITOLAK
                                </span>

                            @endif

                        </td>

                        <td class="p-6 flex gap-2">

                            @if($p->status == 'PENDING')

                                <a href="/admin/update-status/{{ $p->id }}/DISETUJUI"
                                   class="w-9 h-9 bg-green-500 text-white rounded-xl flex items-center justify-center hover:bg-green-600">

                                    <i class="fa-solid fa-check"></i>

                                </a>

                                <a href="/admin/update-status/{{ $p->id }}/DITOLAK"
                                   class="w-9 h-9 bg-red-500 text-white rounded-xl flex items-center justify-center hover:bg-red-600">

                                    <i class="fa-solid fa-xmark"></i>

                                </a>

                            @endif

                            <a href="/admin/delete/{{ $p->id }}"
                               onclick="return confirm('Hapus pesanan ini?')"
                               class="w-9 h-9 bg-slate-100 text-slate-600 rounded-xl flex items-center justify-center hover:bg-slate-200">

                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>