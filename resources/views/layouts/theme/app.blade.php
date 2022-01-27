<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Eduvirtual') }}</title>
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="shortcut icon" href="{{{ asset('LOGO ACC INGENIERIA.png') }}}">

        @include('layouts.theme.styles')
        @livewireStyles
        
       
        
      
      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
        <x-livewire-alert::flash />

       
    </head>
    <body class="font-sans antialiased ">
        

        <div x-data="setup()" :class="{ 'dark': isDark }">
            <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
                @include('layouts.theme.header')
                @include('layouts.theme.sidebar')
                <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
                        @yield('content')
                </div>
        
            </div>
        </div>
       

        @livewireScripts
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
  
       <x-livewire-alert::scripts />
       @include('layouts.theme.scripts')
       
    
    </body>
    </html>
    
    

    
    