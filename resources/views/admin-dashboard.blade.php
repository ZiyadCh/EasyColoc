<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        @if(auth()->user()->role == 'admin')
        <div class="container mx-auto p-6 md:p-12 max-w-6xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-gray-800/50 border border-gray-700 rounded-2xl p-6 backdrop-blur-sm">
                    <p class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">Reputation</p>
                    <h3 class="text-4xl font-black text-white">{{ auth()->user()->reputation }}</h3>
                </div>
                <div class="bg-gray-800/50 border border-gray-700 rounded-2xl p-6 backdrop-blur-sm">
                    <p class="text-gray-400 text-sm font-medium mb-1 uppercase tracking-wider">Dette totale</p>
                    <h3 class="text-4xl font-black text-rose-500">{{ auth()->user()->total_dette }} <span class="text-lg font-normal">MAD</span></h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-white px-2">Utilisateurs Bannis</h2>
                    <div class="bg-gray-800/40 border border-gray-700 rounded-2xl overflow-hidden">
                        <div class="divide-y divide-gray-700/50 max-h-[500px] overflow-y-auto">
                            @forelse($bannedUsers as $banned)
                                <div class="p-4 flex items-center justify-between hover:bg-gray-700/20 transition-colors">
                                    <p class="text-sm font-semibold text-white">{{ $banned->name }}</p>
                                    <a href="{{ route('activateUser', ['id'=>$banned->id]) }}">
                                        <button class="px-3 py-1 text-xs font-medium rounded-lg bg-green-500 text-white hover:bg-green-400 transition-colors">Activer</button>
                                    </a>
                                </div>
                            @empty
                                <div class="p-12 text-center">
                                    <p class="text-gray-600 italic text-sm">Aucun utilisateur banni</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-white px-2">Vos Colocations</h2>

                    <div class="bg-gray-800/40 border border-gray-700 rounded-2xl overflow-hidden">
                        <div class="divide-y divide-gray-700/50 max-h-[400px] overflow-y-auto">
                            @forelse($colocations as $coloc)
                                <div class="p-4 flex items-center justify-between hover:bg-gray-700/20 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-indigo-500/20 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                        </div>
                                        <p class="text-sm font-semibold text-white">{{$coloc->nom}}</p>
                                    </div>
                                    <a href="colocation/{{ $coloc->id }}">
                                        <button class="px-3 py-1 text-xs font-medium rounded-lg bg-gray-700 text-gray-200 hover:bg-gray-600 transition-colors">Voir</button>
                                    </a>
                                </div>
                            @empty
                                <div class="p-12 text-center">
                                    <p class="text-gray-600 italic text-sm">Aucune colocation trouvée</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="colocForm">
                            <button class="w-full py-4 bg-white text-black font-bold rounded-2xl hover:bg-gray-200 transition-all shadow-lg">
                                Créer une colocation
                            </button>
                        </a>
                    </div>
                </div>

            </div>

            <div class="h-20"></div>
        </div>
        @endif
    </body>
</x-app-layout>
