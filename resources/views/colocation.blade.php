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
                    </div>
                    <p class="text-xl font-bold text-white">{{$member->dette}} MAD</p>
                </div>
                @endforeach


            </div>

            <div class="flex justify-center mb-24">
                <a href="" class="flex items-center gap-2 px-6 py-2 text-white border border-gray-700 rounded-full hover:bg-gray-700 transition text-sm">
                    <span>Voir toutes les dépenses</span>
                </a>
            </div>

            <div class="fixed bottom-8 left-0 right-0 px-6">
                <div class="max-w-md mx-auto">
                    <a href="{{ url('expense/form', ['coloc_id'=>$id]) }}">
                    <button class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl shadow-xl hover:bg-indigo-500 transition-all">
                        Ajouter Dépense
                    </button></a>
                </div>
            </div>

        </div>

    </body>
</x-app-layout>
