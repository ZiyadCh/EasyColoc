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
                <div class="bg-gray-800/40 border border-gray-700 rounded-3xl p-8">

                    <div class="mb-10 ">
                        <label class="block text-xs text-gray-500 uppercase mb-4">Montant</label>
                        <input name="montant" type="number" min=1 class="w-full bg-transparent border border-gray-700 rounded-2xl text-center text-4xl font-bold text-white focus:outline-none placeholder-gray-800">
                    </div>

                    <div class="space-y-6">
                        <div>
    <label class="block text-xs text-gray-500 uppercase mb-2 ml-1">Catégorie</label>
    <select name="categorie" class="w-full bg-gray-900 border border-gray-700 rounded-2xl p-4 text-white outline-none focus:border-indigo-500 appearance-none">
        <option value="" disabled selected>Choisir une catégorie</option>
        <option value="">Loyer</option>
        <option value="">Facture</option>
        <option value="">Diner</option>
        <option value="">Reparation</option>
    </select>
</div>

                        <div>
                            <label class="block text-xs text-gray-500 uppercase mb-2 ml-1">Payé par</label>
                            <select name="payeur" class="w-full bg-gray-900 border border-gray-700 rounded-2xl p-4 text-white outline-none focus:border-indigo-500">
                                @foreach ($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fixed bottom-8 left-0 right-0 px-6">
                    <div class="max-w-md mx-auto space-y-2">
                        <button type="submit" class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl">
                            Ajouter
                        </button></button>

                        <button onclick="javascript:history.back()" type="button" class="w-full bg-rose-500  py-4 text-white rounded-2xl">
                            Annuler
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </body>
</x-app-layout>
