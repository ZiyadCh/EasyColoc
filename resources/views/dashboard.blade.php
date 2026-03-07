<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <style>body { font-family: 'Inter', sans-serif; }</style>
    </head>

    <body class="bg-[#050505] text-slate-300 antialiased min-h-screen">

        <div class="container mx-auto p-6 md:p-12 max-w-6xl">

            <div class="mb-10">
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Tableau de bord</h1>
                <p class="text-slate-500">Bienvenue, {{ auth()->user()->name }}. Voici l'état de votre colocation.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-[#111111] border border-slate-800 rounded-2xl p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-indigo-500/10 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z" />
                            </svg>
                        </div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Reputation Score</p>
                    </div>
                    <h3 class="text-5xl font-extrabold text-white tracking-tighter">
                        {{ auth()->user()->reputation }}
                    </h3>
                </div>

                <div class="bg-[#111111] border border-slate-800 rounded-2xl p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-rose-500/10 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Dette Totale</p>
                    </div>
                    <h3 class="text-5xl font-extrabold text-white tracking-tighter">
                        {{ round(auth()->user()->dette, 2) }} <span class="text-xl font-medium text-slate-500 tracking-normal ml-1">MAD</span>
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">
                    @if (auth()->user()->colocations->isNotEmpty())
                        <div class="bg-[#111111] border border-slate-800 rounded-[2rem] p-10 flex flex-col items-center text-center">
                            <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Colocation Active</h3>
                            <p class="text-slate-500 mb-8 max-w-sm">Vous êtes actuellement membre de <span class="text-indigo-400 font-semibold">"{{ auth()->user()->colocations->first()->nom ?? 'Ma Coloc' }}"</span></p>

                            <a href="colocation/{{auth()->user()->colocations->first()->id}}" class="w-full max-w-xs">
                                <button class="w-full py-4 bg-white text-black font-bold rounded-xl hover:bg-slate-200 transition-colors shadow-sm">
                                    Ouvrir l'espace membre
                                </button>
                            </a>
                        </div>
                    @else
                        <div class="bg-[#0A0A0A] border-2 border-dashed border-slate-800 rounded-[2rem] p-12 flex flex-col items-center text-center">
                            <div class="w-16 h-16 bg-slate-900 rounded-full flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-white mb-2">Aucune colocation</h2>
                            <p class="text-slate-500 mb-8 max-w-xs">Créez votre propre espace ou attendez une invitation de vos futurs colocataires.</p>
                            <a href="colocForm" class="w-full max-w-xs">
                                <button class="w-full py-4 bg-[#111111] border border-slate-700 text-white font-bold rounded-xl hover:bg-slate-800 transition-colors">
                                    Créer une colocation
                                </button>
                            </a>
                        </div>
                    @endif

                    @session('colocationError')
                        <div class="p-4 bg-rose-500/10 border border-rose-500/20 text-rose-500 rounded-xl font-medium text-center">
                            {{ $value }}
                        </div>
                    @endsession
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-[#111111] border border-slate-800 rounded-2xl p-6">
                        <h4 class="text-white font-bold mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
                            Dernières Activités
                        </h4>
                        <div class="space-y-4">
                            <div class="flex gap-3 text-sm">
                                <div class="w-8 h-8 rounded-full bg-slate-800 flex-shrink-0"></div>
                                <div>
                                    <p class="text-slate-300"><span class="font-bold text-white">Hamza</span> a ajouté une course</p>
                                    <p class="text-xs text-slate-600 italic">Il y a 2 heures</p>
                                </div>
                            </div>
                            <div class="flex gap-3 text-sm">
                                <div class="w-8 h-8 rounded-full bg-slate-800 flex-shrink-0"></div>
                                <div>
                                    <p class="text-slate-300">Nettoyage de la cuisine <span class="text-emerald-500 font-bold">terminé</span></p>
                                    <p class="text-xs text-slate-600 italic">Hier</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</x-app-layout>
