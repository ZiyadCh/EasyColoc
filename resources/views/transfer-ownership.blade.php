<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 max-w-2xl">

            <div class="mb-10 px-2">
                <h1 class="text-3xl font-bold text-white uppercase tracking-tight">Transferer l'Ownership</h1>
                <p class="text-rose-500 mt-2 text-2xl w-full text-bold ">
                    !!Pour bannir un owner vous devez selectionner un nouveau owner!!
                </p>
            </div>

            <div class="bg-gray-800/40 border border-gray-700 rounded-3xl overflow-hidden mb-8 shadow-2xl">

                @foreach ($members as $member)
                    @if(!$member->isOwner)
                    <div class="p-6 flex items-center justify-between border-b border-gray-700/30 hover:bg-gray-700/10 transition duration-300">
                        <div class="flex items-center gap-4">
                                <p class="text-white font-medium">{{ $member->name }}</p>
                        </div>

                        <form action="{{ route('finirTransfer', ['id'=>$member->id,'oldOwner'=>$current_owner_id ]) }}" method="POST" >
                            @csrf
                            <button type="submit" class="px-4 py-2 text-xs font-bold uppercase text-indigo-400 border border-indigo-500/30 bg-indigo-500/5 rounded-xl hover:bg-indigo-600 hover:text-white transition-all">
                                    Assigner
                            </button>
                        </form>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="flex justify-center">
                <a href="javascript:history.back()" class="bg-rose-500 flex items-center gap-2 px-5 py-2 text-xs font-medium text-white border border-gray-800 rounded-full ">
                    Annuler
                </a>
            </div>

        </div>

    </body>
</x-app-layout>
