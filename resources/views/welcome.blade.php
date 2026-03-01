<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EasyColoc</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gradient-to-br from-gray-900 via-black to-gray-900 min-h-screen text-gray-300 antialiased flex items-center justify-center p-6">

        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-indigo-500/5 rounded-full blur-[120px]"></div>
        </div>

        <div class="relative w-full max-w-sm text-center z-10">
            <div class="mb-12">
                <div class="inline-block p-4 bg-gray-800/40 border border-gray-700/50 rounded-3xl mb-6 backdrop-blur-md shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h1 class="text-4xl font-black text-white tracking-tighter uppercase italic">
                    Easy<span class="text-indigo-500">Coloc</span>
                </h1>
            </div>

            <div class="space-y-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="block w-full py-4 bg-white text-black font-bold rounded-2xl hover:bg-gray-200 transition-all shadow-xl text-center">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="block w-full py-4 bg-white text-black font-bold rounded-2xl hover:bg-gray-200 transition-all shadow-xl text-center">
                            Se connecter
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="block w-full py-4 bg-gray-800/40 border border-gray-700 text-white font-bold rounded-2xl hover:bg-gray-700 transition-all backdrop-blur-sm text-center">
                                Créer un compte
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

        </div>

    </body>
</html>
