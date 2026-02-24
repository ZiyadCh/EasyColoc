<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 max-w-md">

            <div class="flex flex-col items-center justify-center text-center">

                <div class="mb-8 p-6 rounded-full bg-indigo-500/10 border border-indigo-500/20">
                    <svg class="w-16 h-16 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>

                <h2 class="text-3xl font-bold text-white mb-6">Créer une nouvelle colocation</h2>

                <form action="{{ route('newColoc') }}" method="POST" class="w-full space-y-6 bg-gray-800/30 p-8 rounded-2xl border border-gray-700">
                    @csrf
                    <div class="flex flex-col text-left">
                        <label for="nom" class="mb-2 text-gray-400 font-semibold">Nom du Colocation</label>
                        <input type="text" name="nom" id="nom"
                            class="p-4 rounded-xl bg-gray-900 text-white border border-gray-700 focus:outline-none focus:border-indigo-500 transition-all" >
                    </div>
                @error('nom')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                     <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-500 transition-all">
                        Confirmer
                    </button>
                </form>

            </div>

        </div>

    </body>
</x-app-layout>
