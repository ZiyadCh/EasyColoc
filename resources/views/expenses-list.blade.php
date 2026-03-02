<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-black text-white antialiased font-sans">

        <div class="container mx-auto p-6 max-w-xl">

            <div class="mb-10 px-2 flex flex-col gap-6">
                <a href="javascript:history.back()" class="text-white font-bold text-xs uppercase tracking-widest opacity-50 hover:opacity-100 transition-opacity">
                    ← Retour
                </a>

                <div class="flex justify-between items-center">
                    <h1 class="text-4xl font-black tracking-tighter text-white">Dépenses</h1>
                </div>
            </div>

            <form action="{{ route('filter', ['id' => $id]) }}" method="POST" class="flex items-center gap-2 mb-8">
                @csrf
                <select name="month" class="flex-1 bg-zinc-900 border border-zinc-800 text-zinc-300 rounded-2xl px-4 py-3 text-sm outline-none focus:border-indigo-500 transition-all">
                    <option value="">Tous les mois</option>
                    <option value="1">Janvier</option>
                    <option value="2">Février</option>
                    <option value="3">Mars</option>
                    <option value="4">Avril</option>
                    <option value="5">Mai</option>
                    <option value="6">Juin</option>
                    <option value="7">Juillet</option>
                    <option value="8">Août</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                </select>

                <button type="submit" class="bg-white text-black font-bold px-6 py-3 rounded-2xl text-sm hover:bg-zinc-200 transition-colors">
                    Filtrer
                </button>

            </form>

            <div class="space-y-3 mb-32">
                @forelse ($expenses as $expense)
                    <div class="bg-zinc-900/50 border border-zinc-800 rounded-3xl p-6 flex items-center justify-between hover:bg-zinc-800/50 transition-colors">
                        <div class="space-y-1">
                            <h3 class="text-lg font-bold text-white tracking-tight">
                                {{ $expense->category->name   }}
                            </h3>
                            <p class="text-xs font-medium text-zinc-500">
                                Payé par <span class="text-indigo-400">{{ $expense->user->name }}</span>
                                <span class="mx-1">•</span>
                                {{ $expense->created_at->format('d M Y') }}
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="text-xl font-black italic text-emerald-500">
                                {{ number_format($expense->montant, 2) }} <span class="text-xs not-italic ml-1">MAD</span>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 bg-zinc-900/30 border border-dashed border-zinc-800 rounded-3xl">
                        <p class="text-zinc-500 italic">Aucune dépense enregistrée.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </body>
</x-app-layout>
