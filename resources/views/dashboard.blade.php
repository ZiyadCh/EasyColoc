<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 max-w-4xl">

<!-- Stats Cards -->
<div class="w-full max-w-2xl mb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Reputation Card -->
        <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
            <p class="text-gray-400 text-sm mb-2">Reputation Total </p>
            <h3 class="text-3xl font-bold text-white">
                            0
            </h3>
        </div>

        <!-- Expenses Card -->
        <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
            <p class="text-gray-400 text-sm mb-2">Expenses totale</p>
            <h3 class="text-3xl font-bold text-white">
                            0
            </h3>
        </div>

    </div>
</div>

            <div class="flex flex-col items-center justify-center text-center">

                <div class="mb-8 p-6 rounded-full bg-indigo-500/10 border border-indigo-500/20">
                    <svg class="w-16 h-16 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>

                <h2 class="text-4xl font-bold text-white mb-4">Aucune colocation pour le moment</h2>
                <p class="text-gray-500 p-6">Créer une nouvelle colocation ou attender une invitation</p>


                <div class="w-full max-w-sm">
                        <a href="{{ route('newColoc') }}">
                    <button class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-500 transition-all ">
                        Créer une colocation
                    </button>
                        </a>
                </div>


            </div>

            <div class="h-20"></div>
        </div>

    </body>
</x-app-layout>
