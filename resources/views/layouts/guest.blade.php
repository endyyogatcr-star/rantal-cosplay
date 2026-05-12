<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cosplay Rental - Login</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .glass-card {
                background: rgba(15, 12, 41, 0.5) !important;
                backdrop-filter: blur(12px) saturate(180%);
                -webkit-backdrop-filter: blur(12px) saturate(180%);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 24px;
                box-shadow: 0 10px 40px 0 rgba(0, 0, 0, 0.6);
            }

            body {
                /* Menggunakan format .png sesuai folder kamu */
                background: linear-gradient(rgba(15, 12, 41, 0.7), rgba(15, 12, 41, 0.7)), 
                            url("{{ asset('images/Cosplaybg.png') }}") no-repeat center center fixed;
                background-size: cover;
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center p-4">
            <div class="w-full sm:max-w-[420px] glass-card px-8 py-10">
                {{ $slot }}
            </div>
            
            <div class="mt-6 text-[10px] text-white/30 uppercase tracking-[0.3em] font-bold text-center">
                &copy; {{ date('Y') }} COSPLAY RENTAL SYSTEM
            </div>
        </div>
    </body>
</html>