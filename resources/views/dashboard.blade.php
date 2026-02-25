<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 max-w-4xl">

    <div class="w-full max-w-2xl mb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
            <p class="text-gray-400 text-sm mb-2">Reputation Total </p>
            <h3 class="text-3xl font-bold text-white">
                {{auth()->user()->reputation}}
            </h3>
        </div>

        <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
            <p class="text-gray-400 text-sm mb-2">Dette totale</p>
            <h3 class="text-3xl font-bold text-white">

                {{auth()->user()->total_dette}}
            </h3>
        </div>

        </div>
    </div>

            @if (auth()->user()->colocations->isNotEmpty())

            <div class="flex flex-col items-center justify-center text-center">
                <div class="w-full max-w-sm">
                        <a href="colocation/{{auth()->user()->colocations->first()->id}}">
                    <button class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-500 transition-all ">
                            votre colocation
                    </button>
                        </a>
                </div>
                </div>
            @else


                <h2 class="text-4xl font-bold text-white mb-4">Aucune colocation pour le moment</h2>
                <p class="text-gray-500 p-6">Créer une nouvelle colocation ou attender une invitation</p>


                <div class="w-full max-w-sm">
                        <a href="colocForm">
                    <button class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-500 transition-all ">
                        Créer une colocation
                    </button>
                        </a>
                </div>


            </div>
            @endif


            <div class="h-20"></div>
        </div>

    </body>
</x-app-layout>
