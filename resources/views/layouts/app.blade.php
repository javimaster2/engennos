<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Eduvirtual') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="shortcut icon" href="{{{ asset('LOGOHC-LEARNING.png') }}}">
        
        
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        



        
        <style>
            .portada{
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
                }


                [x-cloak] { 
                        display: none !important;
                    }
        </style>

        <script>
                $(document).ready(function () {
                    $('.openModal').on('click', function(e){
                        $('#interestModal').removeClass('invisible');
                    });
                    $('.closeModal').on('click', function(e){
                        $('#interestModal').addClass('invisible');
                    });
                });

                //modal register
                /* window.addEventListener ('DOMContentLoaded',()=>{
                    const showmodal=document.querySelector('#showmodal')
                    const btnInit=document.querySelector('#btn_init')
                    const closemodal=document.querySelector('#close-modal')

                    const togglemodal=()=>{
                        showmodal.classList.toggle('hidden')
                        showmodal.classList.toggle('flex')
                    }

                    btnInit.addEventListener('click',togglemodal)
                    closemodal.addEventListener('click',togglemodal)

                    window.addEventListener('click',function(e)
                    {
                        console.log(e.target);
                        if(e.target==showmodal)
                        {
                            showmodal.classList.toggle('hidden')
                            showmodal.classList.toggle('flex')
                        }
                    })
                    
                }) */
               
    </script>
    </head>
    <body class="font-sans antialiased ">
        <x-jet-banner />

        <div class="min-h-screen " >
            @livewire('navigation-menu')
            <!-- Page Heading -->
            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>


        </div>

        
        @stack('modals')

        @livewireScripts
        
        @isset($js)
            {{$js}}
        @endisset
        

        <div class="pt-12">
            <footer id="footer" class="relative z-50 dark:bg-gray-900">
                <div tabindex="0" aria-label="footer" class="focus:outline-none border-t border-b border-gray-200 dark:border-gray-700 py-16">
                    <div class="mx-auto container grid grid-cols-1">
                        <div class="lg:flex ">
                            {{-- div 1 footer --}}
                            <div class="w-full lg:w-1/2  lg:mb-0 lg:flex  ">
                                <div class="w-full lg:w-1/2 px-6  text-center lg:text-left text-lg lg:text-sm">
                                    <ul>
                                        <li><a class="focus:outline-none focus:underline leading-none hover:text-red-500 lg:text-gray-800 " href="javascript:void(0)">Quienes Somos</a></li>
                                        <li class="mt-6"><a class="focus:outline-none focus:underline leading-none hover:text-red-500 text-gray-800" href="javascript:void(0)">Contactanos</a></li>
                                    </ul>
                                </div>
                                <div class="w-full lg:w-1/2 px-6  text-center lg:text-left text-lg lg:text-sm lg:mt-0 mt-5">
                                    <ul>
                                        <li><a class="focus:outline-none focus:underline  leading-none hover:text-brand dark:hover:text-brand text-gray-800 dark:text-gray-50" href="javascript:void(0)">Ayuda Y Asistencia</a></li>
                                        <li class="mt-6"><a class="focus:outline-none focus:underline  leading-none hover:text-brand dark:hover:text-brand text-gray-800 dark:text-gray-50" href="javascript:void(0)">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- div 2 footer --}}
                            <div class="w-full lg:w-1/2 lg:flex ">
                                <div class="w-full lg:w-1/2 px-6 text-center lg:text-left text-lg lg:text-sm lg:mt-0 mt-5    ">
                                    <ul>
                                        <li><a href="javascript:void(0)" class="focus:underline focus:outline-none  leading-none hover:text-brand dark:hover:text-brand text-gray-800 dark:text-gray-50">Politica de Privacidad</a></li>
                                        <li class="mt-6"><a class="focus:underline focus:outline-none  leading-none hover:text-brand dark:hover:text-brand text-gray-800 dark:text-gray-50" href="javascript:void(0)">Terminos y Condiciones</a></li>
                                    </ul>
                                </div>
                                <div class="w-full lg:w-1/2 px-6 lg:mt-0 mt-5">
                                    <div class="flex  mb-4 justify-center ">
                                        
                                            <div >
                                                    <button aria-label="Facebook" class="text-gray-500 focus:outline-none ml-2 text-4xl cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150"><i class="fab fa-instagram hover:text-pink-500"></i></button>
                                            </div> 
                                        
                                            <div class="">
                                                <button aria-label="Facebook" class="text-gray-500 focus:outline-none ml-4 text-4xl cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150"><i class="fab fa-twitter hover:text-blue-400"></i></button>
                                            </div>
                                        
                                            <div class="">
                                                <button aria-label="Facebook" class="text-gray-500 focus:outline-none ml-4 text-4xl cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150"><i class="fab fa-facebook hover:text-blue-600"></i></button>
                                            </div>
                                            <div class="">
                                                <button aria-label="Facebook" class="text-gray-500 focus:outline-none ml-4 text-4xl cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-150 "><i class="fab fa-youtube hover:text-red-500"></i></button> 
                                            </div>
                                    </div>
                                    <div class="relative w-36">
                                        
                                        <!--posible cuadro-->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-4 flex flex-col justify-center items-center  ">
                    <a class="focus:outline-none" tabindex="0" role="link" aria-label="home link" href="{{route('home')}}">

                        <img class="h-20 w-20" src="{{asset('LOGOHC-LEARNING.png')}}">
                        
                    </a>
                    <p tabindex="0" class="focus:outline-none mt-6 text-xs lg:text-sm leading-none text-gray-900 dark:text-gray-50">©  2021  Todos los derechos reservados | EduVirtual | Términos y Condiciones | Política de Privacidad.</p>
                </div>
            </footer>
        </div>

        
        
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
            window.addEventListener('alert', event => { 
            toastr[event.detail.type](event.detail.message, 
            event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
                    }
                });


                

        </script>
       
            
    </body>
    </html>
    
    

    
    