<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Inter', sans-serif; letter-spacing: -0.01em; }
            input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
        </style>
    </head>
    <body class="bg-gray-900 text-gray-300 antialiased min-h-screen">

        <div class="container mx-auto p-6 md:p-12 max-w-xl">

            <div class="mb-10 px-2">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-indigo-400 mb-2">Finance / Nouvelle Entrée</p>
                <h1 class="text-3xl font-semibold text-white tracking-tight">Nouvelle dépense</h1>
            </div>

            <form action="{{ route('addExp', ['id'=>$id]) }}" method="POST">
                @csrf
                <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-2xl overflow-hidden">

                    <div class="p-8 border-b border-gray-700 bg-gray-800/50 text-center">
                        <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-6">Montant de la transaction</label>
                        <div class="relative flex items-center justify-center max-w-[280px] mx-auto">
                            <input name="montant" type="number" step="0.01" min="1" required placeholder="0.00"
                                class="w-full bg-transparent border-b-2 border-gray-700 py-4 px-2 text-center text-5xl font-bold text-white focus:outline-none focus:border-indigo-500 placeholder-gray-800 transition-all">
                        </div>
                    </div>

                    <div class="p-8 space-y-8">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3 ml-1">Catégorie</label>
                            <div class="relative">
                                <select name="categorie" required
                                    class="w-full bg-gray-900 border border-gray-700 rounded-lg p-4 text-sm text-white outline-none focus:border-indigo-500 appearance-none transition-all cursor-pointer">
                                    <option value="" disabled selected>Choisir une catégorie...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3 ml-1">Payé par</label>
                            <div class="relative">
                                <select name="payeur" required
                                    class="w-full bg-gray-900 border border-gray-700 rounded-lg p-4 text-sm text-white outline-none focus:border-indigo-500 appearance-none transition-all cursor-pointer">
                                    @foreach ($members as $member)
                                        <option value="{{$member->id}}" {{ auth()->id() == $member->id ? 'selected' : '' }}>
                                            {{$member->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-gray-900/30 border-t border-gray-700 flex flex-col gap-3">
                        <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold rounded-lg transition-all shadow-lg shadow-indigo-500/20">
                            Enregistrer la dépense
                        </button>
                        <button onclick="window.history.back()" type="button" class="w-full py-4 bg-transparent text-gray-500 hover:text-white text-xs font-semibold rounded-lg transition-all">
                            Annuler et retourner
                        </button>
                    </div>
                </div>
            </form>

            <p class="mt-8 text-center text-xs text-gray-600">
                La dépense sera automatiquement divisée entre les membres actifs.
            </p>
        </div>

    </body>
</x-app-layout>
