<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased">

        <div class="container mx-auto p-6 md:p-12 max-w-2xl">

            <div class="mb-8">
                <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-indigo-400 flex items-center gap-2 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour à la balance
                </a>
                <h1 class="text-3xl font-bold text-white mt-4">Nouvelle Catégorie</h1>
                <p class="text-gray-500 mt-1">Organisez vos dépenses par type (Courses, Loyer, Loisirs...)</p>
            </div>

            <div class="bg-gray-800/40 border border-gray-700 rounded-3xl p-8 backdrop-blur-sm shadow-2xl">
                <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <input type="hidden" name="colocation_id" value="{{ $id }}">

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-400 mb-2 ml-1">
                            Nom de la catégorie
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            required
                            placeholder="ex: Alimentation, Énergie, Internet..."
                            class="w-full bg-gray-900/50 border border-gray-700 text-white px-5 py-4 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all placeholder:text-gray-600"
                        >
                        @error('name')
                            <p class="text-rose-500 text-xs mt-2 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl shadow-lg shadow-indigo-500/20 transition-all transform active:scale-[0.98]">
                            Enregistrer la catégorie
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8 px-4 py-4 bg-indigo-900/10 border border-indigo-500/20 rounded-2xl">
                <div class="flex gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm text-indigo-300/80">
                        Cette catégorie sera disponible pour tous les membres de la colocation lors de l'ajout d'une dépense.
                    </p>
                </div>
            </div>

        </div>

    </body>
</x-app-layout>
