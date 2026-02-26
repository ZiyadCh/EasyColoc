<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 max-w-6xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gray-800/50 border border-gray-700 rounded-2xl p-6 backdrop-blur-sm">
                    <p class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">Reputation</p>
                    <h3 class="text-4xl font-black text-white">
                        {{ auth()->user()->reputation }}
                    </h3>
                </div>

                <div class="bg-gray-800/50 border border-gray-700 rounded-2xl p-6 backdrop-blur-sm">
                    <p class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">Dette totale</p>
                    <h3 class="text-4xl font-black text-rose-500">
                        {{ round(auth()->user()->total_dette, 2) }} <span class="text-lg font-normal">MAD</span>
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <div class="lg:col-span-2 space-y-6">
                    <h2 class="text-2xl font-bold text-white mb-4">Gestion Colocation</h2>

                    @if (auth()->user()->colocations->isNotEmpty())
                        <div class="bg-indigo-600/10 border border-indigo-500/30 rounded-3xl p-8 flex flex-col items-center text-center">
                            <div class="mb-6 bg-indigo-600 p-4 rounded-full shadow-lg shadow-indigo-500/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-6">Vous faites partie d'une colocation</h3>
                            <a href="colocation/{{auth()->user()->colocations->first()->id}}" class="w-full max-w-xs">
                                <button class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-500 hover:scale-[1.02] transition-all shadow-xl shadow-indigo-500/20">
                                    Accéder à ma colocation
                                </button>
                            </a>
                        </div>
                    @else
                        <div class="bg-gray-800/30 border border-dashed border-gray-700 rounded-3xl p-10 flex flex-col items-center text-center">
                            <h2 class="text-3xl font-bold text-white mb-2">Aucune colocation</h2>
                            <p class="text-gray-500 mb-8">Créer une nouvelle colocation ou attendez une invitation</p>
                            <a href="colocForm" class="w-full max-w-xs">
                                <button class="w-full py-4 bg-white text-black font-bold rounded-2xl hover:bg-gray-200 transition-all">
                                    Créer une colocation
                                </button>
                            </a>
                        </div>
                    @endif
                </div>

                @if(auth()->user()->role == 'admin')
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-white mb-4">Utilisateurs Bannis</h2>
                    <div class="bg-gray-800/40 border border-gray-700 rounded-2xl overflow-hidden">

                        <div class="divide-y divide-gray-700/50 max-h-[400px] overflow-y-auto">
                            @forelse($bannedUsers as $banned)
                                <div class="p-4 flex items-center justify-between hover:bg-gray-700/20 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <p class="text-sm font-semibold text-white">{{ $banned->name }}</p>
                                            <p class="text-xs text-gray-500">Banni le {{ $banned->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                            <button type="" class = "px-3 py-1 text-xs font-medium rounded-lg bg-green-500">Activer</button>
                                </div>
                            @empty
                                <div class="p-8 text-center">
                                    <p class="text-gray-600 italic text-sm">Aucun utilisateur banni</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="h-20"></div>
        </div>
    </body>
</x-app-layout>
