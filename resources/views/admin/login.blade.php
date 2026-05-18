<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin System | SnapMoment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white p-10 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.3)]">
        <div class="text-center mb-8">
            <div class="inline-block p-4 bg-slate-100 rounded-2xl mb-4 text-slate-900">
                <i class="fa-solid fa-lock text-3xl"></i>
            </div>
            <h2 class="text-3xl font-black text-slate-800">Admin Login</h2>
            <p class="text-slate-400 mt-2 font-medium">Internal System Only</p>
        </div>

        @if(session('error'))
            <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 text-sm font-bold text-center border border-red-100">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.proses') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Username Admin</label>
                <input type="text" name="username" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-slate-900 focus:bg-white outline-none transition-all" placeholder="username" required>
            </div>
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                <input type="password" name="password" class="w-full px-5 py-4 rounded-2xl bg-slate-50 border-2 border-transparent focus:border-slate-900 focus:bg-white outline-none transition-all" placeholder="••••••••" required>
            </div>
            <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-black transition transform active:scale-95 uppercase tracking-tighter">
                Access Dashboard
            </button>
        </form>

        <a href="/" class="block text-center mt-8 text-slate-400 text-sm font-bold hover:text-slate-600 transition">
            <i class="fa-solid fa-house mr-1"></i> Back to Homepage
        </a>
    </div>
</body>
</html>