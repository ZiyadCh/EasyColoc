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
                <h1 class="text-3xl font-bold text-white mt-4">Gestion des Catégories</h1>
            </div>

            <div class="bg-gray-800/40 border border-gray-700 rounded-3xl p-8 backdrop-blur-sm shadow-2xl mb-10">
                <form action="{{ route('addCat', ['id'=>$coloc]) }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-400 mb-2 ml-1">
                            Nom de la nouvelle catégorie
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            required
                            class="w-full bg-gray-900/50 border border-gray-700 text-white px-5 py-4 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all placeholder:text-gray-600"
                            placeholder="Ex: Courses, Loyer, Internet..."
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

            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-white ml-2 mb-4">Catégories existantes</h2>

                @forelse($categories as $category)
                    <div class="flex items-center justify-between bg-gray-800/30 border border-gray-700/50 p-5 rounded-2xl hover:bg-gray-800/50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="h-2 w-2 rounded-full bg-indigo-500"></div>
                            <span class="text-gray-200 font-medium">{{ $category->name }}</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('categories.show', $category->id) }}" class="p-2 text-gray-500 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-gray-500 hover:text-rose-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 border-2 border-dashed border-gray-800 rounded-3xl">
                        <p class="text-gray-600">Aucune catégorie pour le moment.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </body>
</x-app-layout>
