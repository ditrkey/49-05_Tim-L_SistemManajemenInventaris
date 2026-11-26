<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Register - Manajemen Armada</title>
</head>
<body class="relative min-h-screen w-full overflow-x-hidden">
    <div
        class="fixed inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('https://cdn.cosmos.so/c4365dec-5bc6-47e1-944b-d73a545c8640?format=webp');"
    ></div>

    <div class="fixed inset-0 bg-slate-900/55"></div>

    <div class="relative z-10 flex min-h-screen items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-md rounded-2xl bg-white p-6 sm:p-8 shadow-2xl border border-gray-100">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Armada</h1>
                <p class="mt-1 text-sm text-gray-500">Masuk untuk mengelola inventaris kendaraan operasional.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-600">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-800 mb-1">
                        Username
                    </label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        class="w-full rounded-lg border border-gray-300 px-3.5 py-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none"
                        required
                        autofocus
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-800 mb-1">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="w-full rounded-lg border border-gray-300 px-3.5 py-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none"
                        required
                    >
                </div>

                                <div>
                    <label for="password" class="block text-sm font-medium text-gray-800 mb-1">
                        Konfirmasi Password
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Masukkan ulang password"
                        class="w-full rounded-lg border border-gray-300 px-3.5 py-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:outline-none"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="mt-2 w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-indigo-700"
                >
                    Daftar
                </button>
            </form>

            @if (Route::has('register'))
                <p class="mt-6 text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:underline">
                        Login di sini
                    </a>
                </p>
            @endif
        </div>
    </div>
</body>
</html>