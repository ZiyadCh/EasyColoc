<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 flex flex-col lg:flex-row gap-12 justify-center items-start">

            <div class="flex-1 max-w-2xl w-full">
                <div class="mb-10 flex justify-between items-center px-2">
                    <h1 class="text-3xl font-bold text-white">Balance totale</h1>

                    <a href="{{ route('categories', ['id'=>$id]) }}" class="flex items-center gap-2 px-4 py-2 text-xs font-semibold tracking-wide uppercase text-gray-400 border border-gray-700 rounded-xl hover:bg-gray-800 hover:text-indigo-400 transition-all border-dashed">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        Catégories
                    </a>
                </div>

                <div class="bg-gray-800/40 border border-gray-700 rounded-3xl overflow-hidden mb-8">
                    @foreach ($members as $member)
                    <div class="p-6 flex items-center justify-between border-b border-gray-700/50">
                        <div class="flex items-center gap-4">
                            <p class="text-white font-medium">{{$member->name}}</p>
                            @if($member->isOwner)
                                <p class="text-yellow-200 text-xs font-bold px-2 py-1 bg-yellow-900/20 rounded-lg">Owner</p>
                            @endif
                        </div>

                        <div class="flex items-center gap-6">
                            <p class="text-xl font-bold {{ $member->dette <= 0 ? 'text-emerald-500' : 'text-rose-500' }}">
                                {{ $member->dette <= 0 ? '+' : '-' }} {{round(abs($member->dette) ,2) }} MAD
                            </p>

                            <div class="flex gap-2">
                                @if(auth()->user()->isOwner && auth()->user()->id != $member->id)
                                <form action="{{ route('retirerUser', ['id'=>$member->id]) }}" method="POST" onsubmit="return confirm('Retirer ce membre ?')">
                                    @csrf
                                    <button class="px-3 py-1 text-xs font-medium text-gray-400 border border-gray-700 rounded-lg hover:bg-gray-700 hover:text-white transition">
                                        Retirer
                                    </button>
                                </form>
                                @endif
                                @if(auth()->user()->role == 'admin' && auth()->user()->id != $member->id )
                                <form action="{{ route('bannUser', ['id'=>$member->id]) }}" method="POST" onsubmit="return confirm('Bannir cet ustilisateur ?')">
                                    @csrf
                                    <button class="px-3 py-1 text-xs font-medium text-rose-400/80 border border-rose-900/30 bg-rose-900/10 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                        Bannir
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="flex justify-center mb-32">
                    <a href="expense/list/{{$id}}" class="flex items-center gap-2 px-6 py-2 text-white border border-gray-700 rounded-full hover:bg-gray-700 transition text-sm">
                        <span>Voir toutes les dépenses</span>
                    </a>
                </div>
            </div>

<aside class="w-full lg:w-96 shrink-0 lg:sticky lg:top-12">
    <div class="bg-gray-800/40 backdrop-blur-xl border border-gray-700/60 rounded-[3rem] p-10 shadow-2xl">
        <div class="flex items-center gap-3 mb-8">
            <div class="h-10 w-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h2 class="text-xl font-black text-white tracking-tight">Ma situation</h2>
        </div>

        <div class="space-y-6">


            <a href="{{ route('debts', ['id' => auth()->user()->id]) }}" class="block group">
                <div class="flex items-center justify-between p-5 bg-indigo-600/10 border border-indigo-500/20 rounded-3xl group-hover:bg-indigo-600/20 group-hover:border-indigo-500/40 transition-all">
                    <span class="text-sm font-bold text-indigo-400">Gérer mes dettes</span>

                </div>
            </a>
        </div>
    </div>
</aside>

            <div class="fixed bottom-8 left-0 right-0 px-6 pointer-events-none">
                <div class="max-w-md mx-auto space-y-3 pointer-events-auto">
                    @if(auth()->user()->isOwner)
                        @session('success')
                            <p class="text-center text-green-300 mb-2">{{$value}}</p>
                        @endsession
                        <form action="{{ route('invite', ['id'=>$id]) }}" method="POST">
                            @csrf
                            <div class="flex shadow-2xl">
                                <input type="email" name="email" required placeholder="Inviter Par Email" class="w-full bg-gray-800/80 border border-gray-700 text-white px-4 py-4 rounded-l-2xl focus:outline-none focus:ring-1 focus:ring-green-500 transition-all">
                                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white font-bold px-8 py-4 rounded-r-2xl transition-all whitespace-nowrap">
                                    Inviter
                                </button>
                            </div>
                        </form>
                    @endif

                    <a href="{{ url('expense/form', ['coloc_id'=>$id]) }}" class="block">
                        <button class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl shadow-xl hover:bg-indigo-500 transition-all">
                            Ajouter Dépense
                        </button>
                    </a>

                    @if(!auth()->user()->isOwner)
                    <a href="{{ route('leave', ['id'=>$id]) }}" class="block text-center">
                        <button class="w-full py-4 bg-black/40 text-red-500 font-bold rounded-2xl border border-red-900/20 hover:bg-red-900/10 transition-colors">
                            Quitter Colocation
                        </button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
