<x-app-layout>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Inter', sans-serif; letter-spacing: -0.01em; }
        </style>
    </head>
    <body class="bg-gray-900 text-gray-300 antialiased min-h-screen pb-20">

        <nav class="border-b border-gray-800 bg-gray-900/50 backdrop-blur-md sticky top-0 ">
            <div class="container mx-auto max-w-7xl px-6 h-16 flex items-center justify-between">
                <div class="flex items-center gap-8">
                    <span class="text-white font-bold tracking-tight text-lg">EasyColoc <span class="text-gray-600 font-normal">/</span> <span class="text-indigo-400">Workspace</span></span>
                </div>
                <div class="flex items-center gap-4 text-xs font-semibold text-gray-400">
                    <a href="{{ route('categories', ['id'=>$id]) }}" class="hover:text-white transition-colors">Catégories</a>
                    <div class="h-4 w-[1px] bg-gray-800"></div>
                    <span class="font-mono text-gray-500 italic">ID: {{ substr($id, 0, 8) }}</span>
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-6 max-w-7xl mt-12">

            <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-10 pb-8 border-b border-gray-800">
                <div>
                    <h1 class="text-3xl font-semibold text-white tracking-tight">Récapitulatif des soldes</h1>
                    <p class="text-sm text-gray-400 mt-2 max-w-xl">Vue d'ensemble de la situation financière des membres de la colocation.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ url('expense/form', ['coloc_id'=>$id]) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-md hover:bg-indigo-500 transition-all shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        Nouvelle dépense
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <div class="lg:col-span-8">
                    <div class="bg-gray-800 border border-gray-700 rounded-lg overflow-hidden shadow-xl">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-700/50 text-[11px] uppercase tracking-wider text-gray-400 font-bold">
                                    <th class="px-6 py-4">Membre</th>
                                    <th class="px-6 py-4">Rôle</th>
                                    <th class="px-6 py-4 text-right">Balance</th>
                                    <th class="px-6 py-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach ($members as $member)
                                    <tr class="group hover:bg-gray-700/30 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded bg-gray-900 border border-gray-700 flex items-center justify-center text-[10px] font-bold text-gray-400">
                                                    {{ strtoupper(substr($member->name, 0, 2)) }}
                                                </div>
                                                <span class="text-gray-100 font-medium text-sm">{{$member->name}}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($member->isOwner)
                                                <span class="text-[10px] bg-indigo-900/40 text-indigo-300 border border-indigo-800/50 px-2 py-0.5 rounded font-semibold uppercase">Admin</span>
                                            @else
                                                <span class="text-[10px] text-gray-500 font-semibold uppercase tracking-tight">Membre</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <span class="font-mono text-sm font-bold {{ $member->dette <= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
                                                {{ $member->dette <= 0 ? '+' : '' }}{{ number_format($member->dette * -1, 2) }} <span class="text-[10px] opacity-60">MAD</span>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            @if(auth()->user()->isOwner && auth()->id() != $member->id)
                                                <button class="text-[11px] font-bold text-gray-500 hover:text-rose-400 transition-colors">Révoquer</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <aside class="lg:col-span-4 space-y-6">

                    <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 shadow-xl">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Ma situation personnelle</p>
                        <h2 class="text-3xl font-bold text-white tracking-tight mb-4">
                             {{ number_format(auth()->user()->dette, 2) }} <span class="text-sm font-normal text-gray-500 italic">MAD</span>
                        </h2>
                        <a href="{{ route('debts', ['id' => $id]) }}" class="block text-center w-full py-2 bg-gray-700 text-white text-xs font-bold rounded hover:bg-gray-600 transition-all border border-gray-600">
                            Détails des créances
                        </a>
                    </div>

                    @if(auth()->user()->isOwner)
                    <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 shadow-xl">
                        <h3 class="text-sm font-semibold text-white mb-4">Inviter un membre</h3>
                        <form action="{{ route('invite', ['id'=>$id]) }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="email" name="email" required placeholder="adresse@email.com" class="w-full bg-gray-900 border border-gray-700 text-sm text-white px-3 py-2 rounded focus:border-indigo-500 outline-none transition-all placeholder:text-gray-600">
                            <button type="submit" class="w-full py-2 bg-indigo-600 text-white text-xs font-bold rounded hover:bg-indigo-500 transition-all">
                                Envoyer l'invitation
                            </button>
                        </form>
                        @session('success')
                             <p class="mt-3 text-[11px] text-emerald-400 text-center font-medium">{{ $value }}</p>
                        @endsession
                    </div>
                    @endif


                </aside>
            </div>
        </div>
    </body>
</x-app-layout>
