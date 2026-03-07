<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EasyColoc | Modern Living</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .animate-blob { animation: blob 7s infinite; }
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animation-delay-2000 { animation-delay: 2s; }
            .animation-delay-4000 { animation-delay: 4s; }
        </style>
    </head>
    <body class="bg-[#030712] min-h-screen text-white antialiased flex items-center justify-center p-6 overflow-hidden">

        <div class="fixed inset-0 z-0">
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-indigo-600/20 rounded-full blur-[120px] animate-blob"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[120px] animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[120px] animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative w-full max-w-md z-10">
            <div class="bg-gray-900/40 border border-white/10 backdrop-blur-2xl rounded-[2.5rem] p-8 md:p-12 shadow-2xl">

                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-tr from-indigo-600 to-purple-500 rounded-3xl shadow-lg shadow-indigo-500/20 mb-6 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h1 class="text-5xl font-extrabold tracking-tight italic">
                        EASY<span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">COLOC</span>
                    </h1>
                    <p class="mt-3 text-gray-400 font-medium">La colocation, version simplifiée.</p>
                </div>

                <div class="space-y-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="group relative flex items-center justify-center w-full py-4 bg-white text-black font-bold rounded-2xl hover:scale-[1.02] active:scale-95 transition-all shadow-xl">
                                Accéder au Dashboard
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="block w-full py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl hover:shadow-[0_0_20px_rgba(79,70,229,0.4)] transition-all text-center">
                                Se connecter
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="block w-full py-4 bg-white/5 border border-white/10 text-white font-bold rounded-2xl hover:bg-white/10 transition-all backdrop-blur-sm text-center">
                                    Créer un compte
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <div class="mt-10 pt-8 border-t border-white/5 flex justify-between text-center">
                    <div>
                        <p class="text-xs uppercase tracking-widest text-gray-500">Sécurisé</p>
                        <p class="text-sm font-bold text-gray-300">100%</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-widest text-gray-500">Communauté</p>
                        <p class="text-sm font-bold text-gray-300">+2k</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-widest text-gray-500">Support</p>
                        <p class="text-sm font-bold text-gray-300">24/7</p>
                    </div>
                </div>
            </div>

            <p class="mt-8 text-center text-gray-600 text-sm">
                &copy; {{ date('Y') }} EasyColoc. Made with &hearts;
            </p>
        </div>

    </body>
</html>
