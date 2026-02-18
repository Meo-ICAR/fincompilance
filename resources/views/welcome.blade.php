<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fincompilance - OAM | AML | GDPR</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        @endif

        <style>
            body { font-family: 'Inter', sans-serif; }
            h1, h2, h3 { font-family: 'Outfit', sans-serif; }
            .glass {
                background: rgba(255, 255, 255, 0.03);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .hero-gradient {
                background: radial-gradient(circle at 10% 20%, rgba(20, 184, 166, 0.1) 0%, rgba(15, 23, 42, 0) 45%),
                            radial-gradient(circle at 90% 80%, rgba(59, 130, 246, 0.1) 0%, rgba(15, 23, 42, 0) 45%);
            }
        </style>
    </head>
    <body class="bg-slate-950 text-slate-200 antialiased min-h-screen selection:bg-teal-500 selection:text-white">

        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 glass border-b border-white/5 px-6 py-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded bg-teal-500 flex items-center justify-center shadow-[0_0_20px_rgba(20,184,166,0.5)]">
                        <svg class="w-5 h-5 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04L3 20l9 2 9-2-1.382-14.016z"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-white uppercase">Fin<span class="text-teal-500">Compilance</span></span>
                </div>

                <div class="flex items-center gap-6">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm font-medium hover:text-teal-400 transition-colors">Dashboard</a>
                    @else
                        <a href="{{ url('/admin/login') }}" class="text-sm font-medium hover:text-teal-400 transition-colors">Log in</a>
                        <a href="{{ url('/admin/register') }}" class="px-4 py-2 bg-teal-500 hover:bg-teal-400 text-slate-950 text-sm font-semibold rounded-lg transition-all shadow-[0_0_15px_rgba(20,184,166,0.3)]">Inizia ora</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full glass border-teal-500/20 text-teal-400 text-xs font-semibold tracking-wider uppercase mb-6">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-500"></span>
                        </span>
                        Sotto controllo: regulatory updates
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-bold text-white leading-[1.1] mb-6">
                        Gestione <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-blue-500">Conformità</span> Finanziaria Semplificata.
                    </h1>
                    <p class="text-lg text-slate-400 mb-8 leading-relaxed">
                        La piattaforma all-in-one dedicata ai <strong class="text-slate-200">Mediatori Finanziari</strong> per garantire la conformità agli standard OAM, le normative AML (Antiriciclaggio) e i requisiti GDPR.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ url('/admin/login') }}" class="px-8 py-4 bg-teal-500 hover:bg-teal-400 text-slate-950 text-base font-bold rounded-xl transition-all shadow-[0_10px_30px_rgba(20,184,166,0.3)] flex justify-center items-center gap-2 group">
                            Entra nel Sistema
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                        <a href="#features" class="px-8 py-4 glass hover:bg-white/5 text-white text-base font-semibold rounded-xl transition-all flex justify-center items-center">
                            Scopri le funzionalità
                        </a>
                    </div>
                </div>
            </div>

            <!-- Abstract background shape -->
            <div class="absolute right-0 top-0 w-1/2 h-full opacity-20 pointer-events-none">
                <svg viewBox="0 0 500 500" class="w-full h-full text-teal-500" fill="currentColor">
                    <path d="M421,343.5C384,409,245,436,155,404C65,372,24,281,41,215.5C58,150,133,110,223,101C313,92,388,114,425,179.5C462,245,458,278,421,343.5Z"></path>
                </svg>
            </div>
        </section>

        <!-- Features Grid -->
        <section id="features" class="py-24 bg-slate-950/50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Soluzioni Complete per Ogni Esigenza</h2>
                    <p class="text-slate-400 max-w-2xl mx-auto text-lg leading-relaxed">Tutto ciò di cui hai bisogno per gestire la compliance in un unico ecosistema digitale.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- OAM Card -->
                    <div class="p-8 rounded-2xl glass hover:border-teal-500/50 transition-all group">
                        <div class="w-12 h-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-400 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">OAM Registry</h3>
                        <p class="text-slate-400 leading-relaxed">Automazione delle verifiche periodiche e gestione delle iscrizioni per Agenti e Mediatori finanziari. Resta sempre in linea con i requisiti dell'Organismo.</p>
                    </div>

                    <!-- AML Card -->
                    <div class="p-8 rounded-2xl glass hover:border-blue-500/50 transition-all group">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04L3 20l9 2 9-2-1.382-14.016z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">AML & KYC</h3>
                        <p class="text-slate-400 leading-relaxed">Valutazione del rischio antiriciclaggio automatizzata. KYC digitale integrato per una corretta verifica della clientela (Due Diligence).</p>
                    </div>

                    <!-- GDPR Card -->
                    <div class="p-8 rounded-2xl glass hover:border-purple-500/50 transition-all group">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Privacy GDPR</h3>
                        <p class="text-slate-400 leading-relaxed">Gestione completa del Registro Trattamenti (ROPA), valutazione d'impatto (DPIA) e monitoraggio dei fornitori e mandatarie.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust Section -->
        <section class="py-20 border-t border-white/5">
            <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row items-center justify-between gap-12">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-white mb-6 leading-tight">Progettato per la sicurezza e l'audit.</h2>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-teal-500/20 flex items-center justify-center text-teal-400">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <p class="text-slate-300">Log completo delle attività per ispezioni e audit.</p>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-teal-500/20 flex items-center justify-center text-teal-400">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <p class="text-slate-300">Sincronizzazione automatica con banche dati esterne.</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 grid grid-cols-2 gap-4">
                    <div class="h-32 glass rounded-2xl flex flex-col items-center justify-center">
                        <span class="text-3xl font-bold text-teal-500">99.9%</span>
                        <span class="text-slate-400 text-sm">Up-time</span>
                    </div>
                    <div class="h-32 glass rounded-2xl flex flex-col items-center justify-center">
                        <span class="text-3xl font-bold text-white">256-bit</span>
                        <span class="text-slate-400 text-sm">Crittografia</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 border-t border-white/5 bg-slate-900/30">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded bg-teal-500 flex items-center justify-center">
                        <svg class="w-4 h-4 text-slate-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04L3 20l9 2 9-2-1.382-14.016z"></path></svg>
                    </div>
                    <span class="text-neutral-200 font-semibold uppercase tracking-tight text-white uppercase">Fin<span class="text-teal-500">Compilance</span></span>
                </div>
                <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} FinCompilance. Tutti i diritti riservati.</p>
                <div class="flex gap-6">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">Termini</a>
                </div>
            </div>
        </footer>

    </body>
</html>
