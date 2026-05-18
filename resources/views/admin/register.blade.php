<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | SnapMoment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-purple-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white p-10 rounded-[2.5rem] shadow-2xl border border-white">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-black text-slate-800">
                Daftar Akun
            </h2>

            <p class="text-slate-400 mt-2">
                Isi data diri untuk mulai memesan
            </p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-4 rounded-2xl mb-5 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="/register"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 pl-1">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="nama"
                       class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-purple-600 outline-none transition"
                       placeholder="Nama Anda"
                       required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 pl-1">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-purple-600 outline-none transition"
                       placeholder="email@contoh.com"
                       required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 pl-1">
                    Nomor HP
                </label>

                <input type="text"
                       name="no_hp"
                       class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-purple-600 outline-none transition"
                       placeholder="08xxxxxxxxxx"
                       required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 pl-1">
                    Foto Profile
                </label>

                <input type="file"
                       name="foto"
                       class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none"
                       required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 pl-1">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-purple-600 outline-none transition"
                       placeholder="••••••••"
                       required>
            </div>

            <button class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-purple-700 transition transform active:scale-95">
                Buat Akun
            </button>

        </form>

        <p class="text-center mt-8 text-slate-500 text-sm">
            Sudah punya akun?
            <a href="/login"
               class="text-purple-600 font-bold hover:underline">
                Login di sini
            </a>
        </p>

    </div>

</body>
</html>