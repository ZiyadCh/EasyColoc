<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-black text-white antialiased font-sans">

        <div class="container mx-auto p-6 max-w-xl">

            <div class="mb-10 px-2 flex flex-col gap-6">
                <a href="{{ url()->previous() }}" class="text-white font-bold text-xs uppercase tracking-widest opacity-50 hover:opacity-100 transition-opacity">
                    ← Retour
                </a>

                <div class="flex justify-between items-end">
                    <h1 class="text-4xl font-black tracking-tighter text-white">Dépenses</h1>

                </div>
            </div>

            <div class="space-y-2 mb-32">

                @foreach ($expenses as $expense)
                <div class="bg-zinc-800 border border-gray-800 rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg bold text-white tracking-tight">{{$expense->categorie}}</h3>
                        <p class="text-sm font-medium text-white opacity-40">{{$expense->created_at}}</p>
                    </div>
                    <p class="text-2xl font-black italic text-emerald-500">{{$expense->montant}} MAD</p>
                </div>
                @endforeach

            </div>



        </div>
    </body>
</x-app-layout>
