<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Berhasil! | SnapMoment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-md p-10 rounded-[2.5rem] shadow-2xl border border-white text-center">
        <div class="flex justify-center mb-6">
            <div class="bg-green-100 p-4 rounded-full">
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <h2 class="text-3xl font-black text-slate-900 mb-2">Yeay, Berhasil!</h2>
        <p class="text-slate-500 mb-8 text-sm px-4">
            Pesanan kamu sudah masuk ke sistem SnapMoment. 
            @if(session('pembayaran_terakhir') == 'cash')
                Silakan lakukan konfirmasi pembayaran melalui WhatsApp admin kami.
            @else
                Tunggu kabar dari kami ya!
            @endif
        </p>

        <div class="space-y-3">
            @if(session('pembayaran_terakhir') == 'cash')
                <a href="https://wa.me/6289509832775?text=Halo%20SnapMoment,%20saya%20ingin%20konfirmasi%20booking%20cash%20saya."
                   target="_blank"
                   class="block w-full bg-green-500 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-green-600 transition transform active:scale-95">
                   Konfirmasi ke WhatsApp
                </a>
            @endif

            <a href="/" class="block w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-indigo-700 transition transform active:scale-95">
                Balik ke Home
            </a>
        </div>
    </div>

</body>
</html>