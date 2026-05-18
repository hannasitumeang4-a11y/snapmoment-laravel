<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | SnapMoment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-xl">
        <h2 class="text-2xl font-bold text-center mb-6">Login SnapMoment</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4 text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">Email / Username</label>
                <input type="text" name="email" class="w-full p-3 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Email (User) atau Username (Admin)" required>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Password</label>
                <input type="password" name="password" class="w-full p-3 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-xl font-bold hover:bg-blue-700 transition">MASUK</button>
        </form>
        <p class="text-center mt-6 text-sm">Customer baru? <a href="/register" class="text-blue-600 font-bold">Daftar di sini</a></p>
    </div>
</body>
</html>