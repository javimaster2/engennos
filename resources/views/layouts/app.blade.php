
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Engennos') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="shortcut icon" href="{{ asset('LOGO ENGENNOS-min.png') }}">

        
        @livewireStyles
   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.css" integrity="sha512-8GrXJjYUgBA5dHliU+yZYZS+ic/okSTz0lZFW2PerQbO7lwmVFL5WBaAJhpvZd8Pc/Qh//AxwMik5ZTd8mmAUg==" crossorigin="anonymous" referrerpolicy="no-referrer">
        
    
	 {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
        <x-livewire-alert::flash />
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
        
       
       {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine-ie11.min.js" integrity="sha512-fTsYx0MbHyjq1vtD1hkb8pg/t06gIUsxiZc1THqiClKqd7bBKitKw/39mrL3bsOfIAi72vIa3BJngjLZXTYxBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        
       <script src="https://player.vimeo.com/api/player.js"></script>

        
        <style>
            /* .portada{
                animation:movimiento 30s infinite linear alternate;
            }
            @keyframes movimiento{
                from{
                    background-position: bottom left;
                }to{
                    background-position: top right; 
                }
            }
            .capa-gradient{
                background: -webkit-linear-gradient(left,black,#0672d0);
            opacity:0.5 ;
                }
            .capa-gradient2{
                background: -webkit-linear-gradient(left,black,#063761);
            opacity:0.7 ;
                } */


                [x-cloak] { 
                        display: none !important;
                    }
                    .loader {
                        border-top-color: #3498db;
                        -webkit-animation: spinner 1.5s linear infinite;
                        animation: spinner 1.5s linear infinite;
                    }

                   /*  @-webkit-keyframes spinner {
                        0% {
                            -webkit-transform: rotate(0deg);
                        }
                        100% {
                            -webkit-transform: rotate(360deg);
                        }
                    }

                    @keyframes spinner {
                        0% {
                            transform: rotate(0deg);
                        }
                        100% {
                            transform: rotate(360deg);
                        }
                    }
 */
                    
         
        </style>

       
    </head>
    <body class="font-sans antialiased ">
        <x-jet-banner />

        <div class="">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            

            <!-- Page Content -->
            <main class="py-20 bg-gray-100">
                {{ $slot }}
            </main>


        </div>

        
        @stack('modals')

        @livewireScripts
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
  
       <x-livewire-alert::scripts />
        
        @isset($js)
            {{$js}}
        @endisset
        
        
        

        <footer class="px-4 divide-y bg-coolGray-100 text-coolGray-800 ">
            <div class="container flex flex-col justify-between py-10 mx-auto space-y-8 lg:flex-row lg:space-y-0 ">
                <div class="lg:w-1/3">
                    <a href="#" class="flex justify-center space-x-3 lg:justify-start b">
                        <div class="flex items-center justify-center w-28 h-28 rounded-full bg-violet-600 ">
                            <img class="h-28 w-28" src="{{asset('logo-engennos.png')}}">
                        </div>
                    </a>
                </div>
                <div class="grid grid-cols-2 text-sm gap-x-3 gap-y-8 lg:w-2/3 sm:grid-cols-4">
                    <div class="space-y-3">
                        <h3 class="tracking-wide uppercase text-coolGray-900">Nosotros</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="#">Quienes Somo</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contactanos</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="space-y-3">
                        <h3 class="tracking-wide uppercase text-coolGray-900">Compañia</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('policy.show') }}">Politicas y privacidad</a>
                            </li>
                            <li>
                                <a href="{{ route('terms.show') }}">Terminos y condiciones</a>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-3">
                        <h3 class="uppercase text-coolGray-900">Servicios</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="#">Asesorias</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="space-y-3">
                        <div class="uppercase text-coolGray-900">Social media</div>
                        <div class="flex justify-start space-x-3">
                            <a href="#" title="Facebook" class="flex items-center p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                                    <path d="M32 16c0-8.839-7.167-16-16-16-8.839 0-16 7.161-16 16 0 7.984 5.849 14.604 13.5 15.803v-11.177h-4.063v-4.625h4.063v-3.527c0-4.009 2.385-6.223 6.041-6.223 1.751 0 3.584 0.312 3.584 0.312v3.937h-2.021c-1.984 0-2.604 1.235-2.604 2.5v3h4.437l-0.713 4.625h-3.724v11.177c7.645-1.199 13.5-7.819 13.5-15.803z"></path>
                                </svg>
                            </a>
                            <a href="#" title="Twitter" class="flex items-center p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="30" height="30"
                                    viewBox="0 0 50 50"
                                style=" fill:#000000;"><path d="M 44.898438 14.5 C 44.5 12.300781 42.601563 10.699219 40.398438 10.199219 C 37.101563 9.5 31 9 24.398438 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.398438 17 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.898438 40.5 17.898438 41 24.5 41 C 31.101563 41 37.101563 40.5 40.601563 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.101563 35.5 C 45.5 33 46 29.398438 46.101563 25 C 45.898438 20.5 45.398438 17 44.898438 14.5 Z M 19 32 L 19 18 L 31.199219 25 Z"></path></svg>
                            </a>
                            <a href="#" title="Instagram" class="flex items-center p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="w-5 h-5 fill-current">
                                    <path d="M16 0c-4.349 0-4.891 0.021-6.593 0.093-1.709 0.084-2.865 0.349-3.885 0.745-1.052 0.412-1.948 0.959-2.833 1.849-0.891 0.885-1.443 1.781-1.849 2.833-0.396 1.020-0.661 2.176-0.745 3.885-0.077 1.703-0.093 2.244-0.093 6.593s0.021 4.891 0.093 6.593c0.084 1.704 0.349 2.865 0.745 3.885 0.412 1.052 0.959 1.948 1.849 2.833 0.885 0.891 1.781 1.443 2.833 1.849 1.020 0.391 2.181 0.661 3.885 0.745 1.703 0.077 2.244 0.093 6.593 0.093s4.891-0.021 6.593-0.093c1.704-0.084 2.865-0.355 3.885-0.745 1.052-0.412 1.948-0.959 2.833-1.849 0.891-0.885 1.443-1.776 1.849-2.833 0.391-1.020 0.661-2.181 0.745-3.885 0.077-1.703 0.093-2.244 0.093-6.593s-0.021-4.891-0.093-6.593c-0.084-1.704-0.355-2.871-0.745-3.885-0.412-1.052-0.959-1.948-1.849-2.833-0.885-0.891-1.776-1.443-2.833-1.849-1.020-0.396-2.181-0.661-3.885-0.745-1.703-0.077-2.244-0.093-6.593-0.093zM16 2.88c4.271 0 4.781 0.021 6.469 0.093 1.557 0.073 2.405 0.333 2.968 0.553 0.751 0.291 1.276 0.635 1.844 1.197 0.557 0.557 0.901 1.088 1.192 1.839 0.22 0.563 0.48 1.411 0.553 2.968 0.072 1.688 0.093 2.199 0.093 6.469s-0.021 4.781-0.099 6.469c-0.084 1.557-0.344 2.405-0.563 2.968-0.303 0.751-0.641 1.276-1.199 1.844-0.563 0.557-1.099 0.901-1.844 1.192-0.556 0.22-1.416 0.48-2.979 0.553-1.697 0.072-2.197 0.093-6.479 0.093s-4.781-0.021-6.48-0.099c-1.557-0.084-2.416-0.344-2.979-0.563-0.76-0.303-1.281-0.641-1.839-1.199-0.563-0.563-0.921-1.099-1.197-1.844-0.224-0.556-0.48-1.416-0.563-2.979-0.057-1.677-0.084-2.197-0.084-6.459 0-4.26 0.027-4.781 0.084-6.479 0.083-1.563 0.339-2.421 0.563-2.979 0.276-0.761 0.635-1.281 1.197-1.844 0.557-0.557 1.079-0.917 1.839-1.199 0.563-0.219 1.401-0.479 2.964-0.557 1.697-0.061 2.197-0.083 6.473-0.083zM16 7.787c-4.541 0-8.213 3.677-8.213 8.213 0 4.541 3.677 8.213 8.213 8.213 4.541 0 8.213-3.677 8.213-8.213 0-4.541-3.677-8.213-8.213-8.213zM16 21.333c-2.948 0-5.333-2.385-5.333-5.333s2.385-5.333 5.333-5.333c2.948 0 5.333 2.385 5.333 5.333s-2.385 5.333-5.333 5.333zM26.464 7.459c0 1.063-0.865 1.921-1.923 1.921-1.063 0-1.921-0.859-1.921-1.921 0-1.057 0.864-1.917 1.921-1.917s1.923 0.86 1.923 1.917z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6 text-sm text-center text-coolGray-600">© 2022 ACCINGENIERIA. Todos los derechos reservados.</div>
        </footer>

        
        
        <script>
            /* @if(Session::has('message'))
                var type="{{Session::get('alert-type','info')}}"

            
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message')}}");
                        break;
                }
            @endif */
            /* window.addEventListener('alert', event => { 
            toastr[event.detail.type](event.detail.message, 
            event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
                    }
                }); */

                const btn=document.querySelector('.mobile-menu-button');
                const sidebar=document.querySelector('.sidebar')
                
                btn.addEventListener('click',()=>{
                    sidebar.classList.toggle('-translate-x-full');
                });

               

    

               

        </script>
       {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
       
            @stack('script')
            

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.6/swiper-bundle.min.js" integrity="sha512-n6GpoPKzdir52uRa3Z+M+BxBFNGwMMVTISZM9LMg9lMXyRVrtCcQavkP81NOI06NyVUskN9GLzZIQtPuF3GWLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            
    </body>
    </html>
    
    

    
    