<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-black text-gray-300 antialiased font-sans">

        <div class="container mx-auto p-6 max-w-xl">

            <div class="mb-10 px-2">
                <h1 class="text-2xl font-bold text-white">Nouvelle dépense</h1>
            </div>

            <form>
                <div class="bg-gray-800/40 border border-gray-700 rounded-3xl p-8">

                    <div class="mb-10 text-center">
                        <label class="block text-xs text-gray-500 uppercase mb-4">Montant</label>
                        <input type="number" placeholder="0.00"
                            class="w-full bg-transparent text-center text-4xl font-bold text-white focus:outline-none placeholder-gray-800">
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs text-gray-500 uppercase mb-2 ml-1">Catégorie</label>
                            <input type="text" placeholder="Restaurant"
                                class="w-full bg-gray-900 border border-gray-700 rounded-2xl p-4 text-white outline-none focus:border-indigo-500">
                        </div>

                        <div>
                            <label class="block text-xs text-gray-500 uppercase mb-2 ml-1">Payé par</label>
                            <select class="w-full bg-gray-900 border border-gray-700 rounded-2xl p-4 text-white outline-none focus:border-indigo-500">
                                <option>Ahmed</option>
                                <option>Sara</option>
                                <option>Yassine</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fixed bottom-8 left-0 right-0 px-6">
                    <div class="max-w-md mx-auto space-y-2">
                        <button type="button" class="w-full py-4 bg-indigo-600 text-white font-bold rounded-2xl">
                            Enregistrer
                        </button>

                        <button type="button" class="w-full py-4 text-gray-500">
                            Annuler
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </body>
</x-app-layout>
