<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Booking | SnapMoment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-md p-10 rounded-[2.5rem] shadow-2xl border border-white">
        <h2 class="text-3xl font-black text-slate-900 mb-2 text-center">Detail Acara</h2>
        <p class="text-slate-500 mb-8 text-center text-sm">Lengkapi lokasi dan tanggal untuk paket yang dipilih.</p>

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-2xl mb-6 text-xs font-medium">
                {{ session('error') }}
            </div>
        @endif

        <form action="/booking" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="paket_id" value="{{ request('paket_id') }}">

            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Lokasi Acara</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-600 outline-none transition" placeholder="Contoh: Ballroom Hotel" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Tanggal Acara</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-600 outline-none transition" required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Metode Pembayaran</label>
                <select name="pembayaran" id="pembayaran" onchange="toggleBuktiBayar()" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-600 outline-none transition" required>
                    <option value="">-- Pilih Pembayaran --</option>
                    <option value="cash">Cash (Konfirmasi via WA)</option>
                    <option value="qris">QRIS (Upload Bukti)</option>
                </select>
            </div>

            {{-- Bagian QRIS & Upload --}}
            <div id="section_bukti" class="hidden animate-fade-in">
                <div class="mb-6 p-4 bg-slate-50 rounded-3xl border border-slate-100 text-center">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Scan QRIS Di Sini</p>
                    <img src="{{ asset('assets/img/qris-payment.png') }}" alt="QRIS SnapMoment" class="w-40 h-40 mx-auto rounded-2xl shadow-sm mb-2 border-4 border-white">
                    <p class="text-[10px] text-indigo-600 font-semibold">A.N. SNAPMOMENT STUDIO</p>
                </div>

                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1 text-indigo-600">Upload Bukti Bayar</label>
                <div class="flex flex-col items-center p-4 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50">
                    <input type="file" name="bukti_bayar" accept="image/*" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
                <p class="text-[10px] text-slate-400 mt-2 text-center italic">*Unggah foto struk atau screenshot bukti transfer.</p>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-indigo-700 transition transform active:scale-95">
                Konfirmasi Pesanan
            </button>
            
            <a href="/" class="block text-center text-sm text-slate-400 mt-4 hover:underline">Kembali ke Home</a>
        </form>
    </div>

    <script>
        function toggleBuktiBayar() {
            const pembayaran = document.getElementById('pembayaran').value;
            const sectionBukti = document.getElementById('section_bukti');
            
            if (pembayaran === 'qris') {
                sectionBukti.classList.remove('hidden');
            } else {
                sectionBukti.classList.add('hidden');
            }
        }
    </script>

</body>
</html>