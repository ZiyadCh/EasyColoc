<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-black text-gray-300 antialiased font-sans">

        <div class="container mx-auto p-6 max-w-xl">

            <div class="mb-10 px-2">
                <h1 class="text-2xl font-bold text-white">Nouvelle dépense</h1>
            </div>

            <form action="{{ route('addExp', ['id'=>$id]) }}" method="POST">
                @csrf
                <div class="bg-gray-800/40 border border-gray-700 rounded-3xl p-8 space-y-6">

                    <div class="mb-10">
                        <label class="block text-xs text-gray-500 uppercase mb-4 text-center">Montant</label>
                        <input name="montant" type="number" step="0.01" min="1" required
                            class="w-full bg-transparent border border-gray-700 rounded-2xl text-center text-4xl font-bold text-white focus:outline-none focus:border-indigo-500 placeholder-gray-800 transition-colors">
                    </div>

                    <div>
                        <label class="block text-xs text-gray-500 uppercase mb-2 ml-1">Catégorie</label>
                        <select name="categorie" required
                            class="w-full bg-gray-900 border border-gray-700 rounded-2xl p-4 text-white outline-none focus:border-indigo-500 appearance-none transition-colors">
                            <option value="" disabled selected>Choisir une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs text-gray-500 uppercase mb-2 ml-1">Payé par</label>
                        <select name="payeur" required
                            class="w-full bg-gray-900 border border-gray-700 rounded-2xl p-4 text-white outline-none focus:border-indigo-500 transition-colors">
                            @foreach ($members as $member)
                                <option value="{{$member->id}}" {{ auth()->id() == $member->id ? 'selected' : '' }}>
                                    {{$member->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="fixed bottom-8 left-0 right-0 px-6">
                    <div class="max-w-md mx-auto space-y-3">
                        <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl transition-all shadow-lg shadow-indigo-500/10">
                            Ajouter
                        </button>

                        <button onclick="window.history.back()" type="button" class="w-full bg-zinc-900 border border-gray-800 py-4 text-white font-medium rounded-2xl hover:bg-zinc-800 transition-all">
                            Annuler
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </body>
</x-app-layout>
