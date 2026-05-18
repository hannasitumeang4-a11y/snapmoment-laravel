<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi | SnapMoment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div id="nota-container" class="bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl overflow-hidden border border-white">
        
        <div class="{{ $booking->pembayaran == 'qris' ? 'bg-indigo-600' : 'bg-amber-500' }} p-8 text-center text-white">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid {{ $booking->pembayaran == 'qris' ? 'fa-check-double' : 'fa-receipt' }} text-3xl"></i>
            </div>
            <h2 class="text-2xl font-black">Nota Transaksi</h2>
            <p class="text-white/80 text-[10px] uppercase tracking-[0.2em] font-bold">ID: #SNAP-{{ $booking->id }}</p>
        </div>

        <div class="p-8">
            <div class="space-y-4 mb-8">
                <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase">Nama Pemesan</span>
                    <span class="text-sm font-bold text-slate-800">{{ $booking->nama }}</span>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase">Paket Pilihan</span>
                    <span class="text-sm font-bold text-indigo-600">{{ $booking->nama_paket }}</span>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase">Total Biaya</span>
                    <span class="text-sm font-black text-slate-800">Rp{{ number_format($booking->harga, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase">Metode</span>
                    <span class="text-[10px] font-bold px-2 py-1 bg-slate-100 rounded text-slate-600 uppercase">{{ $booking->pembayaran }}</span>
                </div>
            </div>

            <div class="mb-8">
                <label class="text-[10px] font-black text-slate-400 uppercase block mb-2">Informasi Pembayaran</label>
                @if($booking->pembayaran == 'qris')
                    <div class="bg-green-50 p-4 rounded-2xl border border-green-100">
                        <p class="text-xs text-green-700 font-medium leading-relaxed">
                            <i class="fa-solid fa-circle-check mr-1"></i> Bukti bayar QRIS berhasil diunggah. Kami akan memverifikasi pembayaran Anda segera.
                        </p>
                    </div>
                @else
                    <div class="bg-amber-50 p-4 rounded-2xl border border-amber-100">
                        <p class="text-xs text-amber-700 font-medium leading-relaxed">
                            <i class="fa-solid fa-hand-holding-dollar mr-1"></i> Pembayaran <b>CASH</b>. Harap siapkan uang tunai di <b>{{ $booking->lokasi }}</b>.
                        </p>
                    </div>
                @endif
            </div>

            <div id="aksi-buttons" class="space-y-3">
                @php
                    $pesanWA = "Halo SnapMoment, saya ingin konfirmasi pesanan:\n\n" . 
                               "ID: #SNAP-" . $booking->id . "\n" .
                               "Nama: " . $booking->nama . "\n" .
                               "Metode: " . strtoupper($booking->pembayaran) . "\n" .
                               "Total: Rp" . number_format($booking->harga, 0, ',', '.') . "\n" .
                               "Lokasi: " . $booking->lokasi;
                @endphp
                
                <a href="https://wa.me/6289509832775?text={{ urlencode($pesanWA) }}" 
                   target="_blank"
                   class="w-full bg-green-500 text-white py-4 rounded-2xl font-bold flex items-center justify-center gap-2 shadow-lg hover:bg-green-600 transition transform active:scale-95">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Bagikan ke WhatsApp
                </a>

                <button type="button" onclick="downloadNota()" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold hover:bg-slate-800 transition text-sm flex items-center justify-center gap-2">
                    <i class="fa-solid fa-download"></i> Unduh Nota (Gambar)
                </button>
            </div>

            <a href="/" class="block text-center text-[10px] font-black text-slate-400 uppercase tracking-widest mt-8 hover:text-indigo-600 transition">
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        function downloadNota() {
            const container = document.getElementById('nota-container');
            const buttons = document.getElementById('aksi-buttons');

            // Sembunyikan tombol biar nggak ikut kefoto
            buttons.style.display = 'none';

            html2canvas(container, {
                backgroundColor: null,
                scale: 2, // Biar gambar lebih tajam/HD
                borderRadius: 40
            }).then(canvas => {
                // Tampilkan kembali tombol setelah capture selesai
                buttons.style.display = 'block';

                // Proses download
                const link = document.createElement('a');
                link.download = 'Nota-SnapMoment-{{ $booking->id }}.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        }
    </script>

</body>
</html>