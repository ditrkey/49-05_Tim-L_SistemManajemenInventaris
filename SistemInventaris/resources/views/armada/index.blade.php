<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title>Inventaris Armada</title>
</head>
<body class="flex min-h-screen">
    <aside class="flex min-h-screen flex-col justify-between border-e border-gray-100 bg-white w-64 flex-shrink:0">
<div class="p-4 flex-1 overflow-y-auto">
    <span
      class="grid h-12 w-32 place-content-center rounded-lg bg-gray-100 text-sm text-gray-500"
    >
      Logo
    </span>

    <ul class="mt-4 space-y-1">

    <li>
        <a
          href="{{ route('armada.index') }}"
          class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-900"
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
          class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900"
        >
          Form Armada
        </a>
      </li>


      <li>
        <form class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        </a>
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

        <span> eric@frusciante.com </span>
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

<div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
        <div class="overflow-x-auto">
          

</div>
</div>

</div>
  </main>
</div>

</body>
</html>