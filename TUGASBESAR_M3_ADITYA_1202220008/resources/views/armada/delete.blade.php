<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title>Inventaris Armada</title>
</head>
<body class="relative min-h-screen w-full overflow-x-hidden">
    <div class="fixed inset-0 bg-slate-900/55"></div>

    <div class="relative z-10 flex min-h-screen items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-md rounded-2xl bg-white p-6 sm:p-8 shadow-2xl border border-gray-100">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-900">Hapus Armada?</h1>
                <p class="mt-1 text-sm text-gray-500">Konfirmasi penghapusan data armada.</p>
            </div>

            <form action="{{ route('armada.destroy', $armada->id) }}" method="POST">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-800 mb-1">
                        Apakah kamu mau menghapus data berikut?
                    </label>
                     <ul>
                        <li><strong>ID:</strong> {{ $armada->id }}</li>
                        <li><strong>Jenis Kendaraan:</strong> {{ $armada->jenis_kendaraan }}</li>
                        <li><strong>No Dokumen Perawatan:</strong> {{ $armada->no_dokumen_perawatan }}</li>
                        <li><strong>No Plat:</strong> {{ $armada->no_seri_kendaraan }}</li>
                    </ul>
                </div>
                      @csrf
                      @method('DELETE')
                <button
                    type="submit"
                    class="mt-2 w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-indigo-700"
                >
                    Hapus
                </button>
                <a href="{{ route('armada.table') }}">
                  <button
                      type="button"
                      class="mt-2 w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-indigo-700"
                  >
                      Batal
                  </button>
                </a>
            </form>
        </div>
    </div>
</body>
</html>