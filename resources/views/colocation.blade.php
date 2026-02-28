<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 max-w-2xl">

            <div class="mb-10 flex justify-between items-end px-2">
                <h1 class="text-3xl font-bold text-white">Balance totale</h1>
            </div>

            <div class="bg-gray-800/40 border border-gray-700 rounded-3xl overflow-hidden mb-8">
                @foreach ($members as $member)
                <div class="p-6 flex items-center justify-between border-b border-gray-700/50">
                    <div class="flex items-center gap-4">
                        <p class="text-white font-medium">{{$member->name}}</p>
                        @if($member->isOwner)
                            <p class="text-yellow-200">| Owner |</p>
                          @endif
                    </div>

                    <div class="flex items-center gap-6">
                        <p class="text-xl font-bold text-rose-500">- {{round($member->dette,2) }} MAD</p>

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

            <div class="flex justify-center mb-24">
                <a href="expense/list/{{$id}}" class="flex items-center gap-2 px-6 py-2 text-white border border-gray-700 rounded-full hover:bg-gray-700 transition text-sm">
                    <span>Voir toutes les dépenses</span>
                </a>
            </div>

            <div class="fixed bottom-8 left-0 right-0 px-6">
                <div class="max-w-md mx-auto">
                    <!-- invite available only to owner -->
        @if(auth()->user()->isOwner)
                        @session('success')
                            <p class="text-center text-green-300">{{$value}}</p>
                        @endsession
            <form action="{{ route('invite', ['id'=>$id]) }}" method="POST" class="mb-3">
                @csrf
                <div class="flex shadow-2xl">
                    <input type="email" name="email" required placeholder="Inviter Par Email" class="w-full bg-gray-800/80 border border-gray-700 text-white px-4 py-4 rounded-l-2xl focus:outline-none focus:ring-1 focus:ring-green-500 transition-all">
                    <button type="submit" class="bg-green-600 hover:bg-green-500 text-white font-bold px-8 py-4 rounded-r-2xl transition-all whitespace-nowrap">
                        Inviter
                    </button>
                </div>
            </form>
        @endif
                            <!-- -->
                    <a href="{{ url('expense/form', ['coloc_id'=>$id]) }}">
                        <button class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl shadow-xl hover:bg-indigo-500 transition-all">
                            Ajouter Dépense
                        </button>
                    </a>
                    <a href="">
                        <button class="w-full py-4 bg-black text-red-600 font-bold rounded-2xl shadow-xl ">
                            Quitter Colocation
                        </button>
                    </a>
                </div>
            </div>


        </div>

    </body>
</x-app-layout>
