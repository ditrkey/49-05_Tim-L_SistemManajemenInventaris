<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Inventaris Armada</title>
</head>
<body class="flex min-h-screen bg-gray-50">
    <aside class="flex min-h-screen flex-col justify-between border-e border-gray-100 bg-white w-64 shrink-0">
        <div class="p-4 flex-1 overflow-y-auto">
            <span class="grid h-12 w-32 place-content-center rounded-lg bg-gray-100 text-sm text-gray-500">
                Logo
            </span>

            <ul class="mt-4 space-y-1">
                <li>
                    <a
                        href="{{ route('armada.index') }}"
                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900"
                    >
                        Beranda
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('armada.table') }}"
                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900"
                    >
                        Data Armada
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('armada.create') }}"
                        class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-900"
                    >
                        Form Armada
                    </a>
                </li>

                <li>
                    <form
                        class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900"
                        action="{{ route('logout') }}"
                        method="POST"
                    >
                        @csrf
                        <button type="submit" class="w-full text-left">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
            <a
                href="#"
                class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50 hover:transition-colors"
            >
                <img
                    alt=""
                    src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&fit=crop&q=80&w=1160"
                    class="size-10 rounded-full object-cover"
                />

                <p class="text-xs text-gray-900">
                    <strong class="block font-medium">Eric Frusciante</strong>
                    <span>eric@frusciante.com</span>
                </p>
            </a>
        </div>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        <div class="max-w-7xl mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Armada</h1>
                <p class="text-sm text-gray-500">Inventaris seluruh kendaraan operasional.</p>
            </div>

            @php
                $isEdit = isset($armada) && $armada !== null;
            @endphp

            <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    {{-- KOLOM KIRI: GAMBAR --}}
                    <div class="lg:col-span-5">
                        <img
                            src="https://cdn.cosmos.so/628d0cbf-718b-4332-ab06-754301bece3e?format=webp"
                            class="w-full h-auto opacity-80 object-cover rounded-lg"
                            alt="Ilustrasi Armada"
                        >
                    </div>

                    {{-- KOLOM KANAN: FORM --}}
                    <div class="lg:col-span-7">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">
                            {{ $isEdit ? 'Edit Data Armada' : 'Tambah Data Armada' }}
                        </h2>

                        @if ($errors->any())
                            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-600">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            action="{{ $isEdit ? route('armada.update', $armada->id) : url('/form') }}"
                            method="POST"
                            class="grid grid-cols-1 sm:grid-cols-2 gap-4"
                        >
                            @csrf
                            @if ($isEdit)
                                @method('PUT')
                            @endif

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900" for="id">ID Khusus</label>
                                <input
                                    id="id"
                                    class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                                    name="id"
                                    type="text"
                                    placeholder="ID Khusus"
                                    value="{{ old('id', $armada->id ?? '') }}"
                                    required
                                />
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-900" for="jenis_kendaraan">Nama Kendaraan</label>
                                <input
                                    id="jenis_kendaraan"
                                    class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                                    name="jenis_kendaraan"
                                    type="text"
                                    placeholder="Nama Kendaraan"
                                    value="{{ old('jenis_kendaraan', $armada->jenis_kendaraan ?? '') }}"
                                    required
                                />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-900" for="no_seri_kendaraan">No Plat</label>
                                <input
                                    id="no_seri_kendaraan"
                                    class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                                    name="no_seri_kendaraan"
                                    type="text"
                                    placeholder="No Plat"
                                    value="{{ old('no_seri_kendaraan', $armada->no_seri_kendaraan ?? '') }}"
                                    required
                                />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-900" for="no_dokumen_perawatan">No Dokumen Perawatan</label>
                                <input
                                    id="no_dokumen_perawatan"
                                    class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                                    name="no_dokumen_perawatan"
                                    type="text"
                                    placeholder="No Dokumen Perawatan"
                                    value="{{ old('no_dokumen_perawatan', $armada->no_dokumen_perawatan ?? '') }}"
                                    required
                                />
                            </div>

                            <div class="sm:col-span-2 pt-2">
                                <button
                                    class="block w-full rounded-lg border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-indigo-600"
                                    type="submit"
                                >
                                    {{ $isEdit ? 'Simpan Perubahan' : 'Tambahkan' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>