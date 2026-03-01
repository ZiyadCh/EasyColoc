<x-app-layout>
   <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">
        <div class="container mx-auto p-6 md:p-12 max-w-5xl">

            <div class="mb-12 px-2">
                <h1 class="text-4xl font-black text-white tracking-tighter">Gestion des Dettes</h1>
                <p class="text-gray-500 font-medium">Suivi détaillé des remboursements en cours</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-10">

                <div class="space-y-6">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-xs font-black uppercase tracking-[0.2em] text-emerald-500">Recettes attendues</h2>
                        <span class="bg-emerald-500/10 text-emerald-500 text-[10px] px-2 py-1 rounded-md border border-emerald-500/20">Créditeur</span>
                    </div>

                    @forelse($owedToMe as $debt)
                    <div class="bg-gray-800/30 border border-gray-700/50 p-6 rounded-[2.5rem] hover:bg-gray-800/60 transition-all">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 bg-emerald-500/10 rounded-2xl flex items-center justify-center text-emerald-500 font-bold">
                                    {{ strtoupper(substr($debt->debtor->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-white font-bold text-lg">{{ $debt->debtor->name }}</p>
                                    <p class="text-[10px] text-gray-500 uppercase font-black tracking-widest">Doit vous payer</p>
                                </div>
                            </div>
                            <p class="text-2xl font-black text-emerald-500">+{{ round($debt->amount, 2) }} <span class="text-xs opacity-50">MAD</span></p>
                        </div>

                        <form action="{{ route('debt.settle', $debt->id) }}" method="POST">
                            @csrf
                            <button class="w-full py-3 bg-emerald-600 hover:bg-emerald-500 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl transition-all shadow-lg shadow-emerald-900/20">
                                    Marquer comme payé
                            </button>
                        </form>
                    </div>
                    @empty
                    <div class="border-2 border-dashed border-gray-800 rounded-[2.5rem] p-10 text-center">
                        <p class="text-gray-600 text-sm">Aucun paiement en attente.</p>
                    </div>
                    @endforelse
                </div>

                <div class="space-y-6">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-xs font-black uppercase tracking-[0.2em] text-rose-500">Mes Dettes</h2>
                        <span class="bg-rose-500/10 text-rose-500 text-[10px] px-2 py-1 rounded-md border border-rose-500/20">Débiteur</span>
                    </div>

                    @forelse($iOwe as $debt)
                    <div class="bg-gray-800/30 border border-gray-700/50 p-6 rounded-[2.5rem] hover:bg-gray-800/60 transition-all">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 bg-rose-500/10 rounded-2xl flex items-center justify-center text-rose-500 font-bold">
                                    {{ strtoupper(substr($debt->creditor->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-white font-bold text-lg">{{ $debt->creditor->name }}</p>
                                    <p class="text-[10px] text-gray-500 uppercase font-black tracking-widest">Vous devez payer</p>
                                </div>
                            </div>
                            <p class="text-2xl font-black text-rose-500">-{{ round($debt->amount, 2) }} <span class="text-xs opacity-50">MAD</span></p>
                        </div>

                        <form action="{{ route('debt.settle', $debt->id) }}" method="POST">
                            @csrf
                            <button class="w-full py-3 bg-rose-900/20 hover:bg-rose-600 text-rose-500 hover:text-white text-[10px] font-black uppercase tracking-widest rounded-2xl transition-all border border-rose-500/30">
                                Marquer comme payé
                            </button>
                        </form>
                    </div>
                    @empty
                    <div class="border-2 border-dashed border-gray-800 rounded-[2.5rem] p-10 text-center">
                        <p class="text-gray-600 text-sm">Aucune dette</p>
                    </div>
                    @endforelse
                </div>

            </div>

            <div class="mt-20 text-center">
                <a href="{{ route('colocDetails', $id) }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-white transition-colors font-bold text-xs uppercase tracking-widest">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </body>
</x-app-layout>
