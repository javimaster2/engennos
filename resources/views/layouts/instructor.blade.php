<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="shortcut icon" href="{{{ asset('LOGO ACC INGENIERIA.png') }}}">
        {{-- asdsd --}}

        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <link
  href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css"
  rel="stylesheet"/>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
        <x-livewire-alert::flash />
        
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased ">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            

            <!-- Page Content -->
            <div class="container grid grid-cols-5  pt-36 gap-4 ">
                <aside class=" border-r-2 border-t-2 rounded bg-white h-80">
                    <h1 class="font-bold text-xl mb-4 mt-2 text-gray-600 text-center">Edicion del curso</h1>
                    <ul class="text-sm text-gray-600 mb-6">
                        <li class="leading-7  mb-2 border-l-4 @routeIs('instructor.courses.edit',$course) border-gray-600  text-lg font-bold @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit',$course)}}">Informacion del curso</a>
                        </li>
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.curriculum',$course) border-gray-600 text-lg font-bold @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum',$course)}}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.goals',$course) border-gray-600 text-lg font-bold @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals',$course)}}">Objetivos del curso</a>
                        </li>
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.students',$course) border-gray-600 text-lg font-bold @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.students',$course)}}">Estudiantes</a>
                        </li> 
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.complete',$course) border-gray-600 text-lg font-bold @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.complete',$course)}}">Recurso del curso</a>
                        </li> 
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.coupon',$course) border-gray-600 text-lg font-bold @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.coupon',$course)}}">Cupones</a>
                        </li> 
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.ofertas',$course) border-gray-600 text-lg font-bold @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.ofertas',$course)}}">Ofertas</a>
                        </li> 
                        

                        @if ($course->observation)
                            <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.students',$course) border-white text-lg font-bold @else border-transparent @endif pl-2 ">
                                <a href="{{route('instructor.courses.observation',$course)}}">Observaciones</a>
                            </li> 
                            
                        @endif
                    </ul>

                    <!---Formulario para enviar el estado -->
                    @switch($course->status)
                        @case(1)
                            <form action="{{route('instructor.courses.status',$course)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger"> Solicitar Revision</button>
                            </form>
                            @break
                        @case(2)
                            <div class="card text-gray-500 mr-3 leading-4">
                                <div class="card-body">
                                    Este curso se encuentra en revision
                                </div>
                            </div>
                            
                            @break
                        @case(3)
                            <div class="card text-green-600">
                                <div class="card-body">
                                    Este curso se encuentra en publicado
                                </div>
                            </div>
                            
                            @break
                    
                        @default
                            
                    @endswitch
                    
                    
                </aside>
                <div class="col-span-4 card ml-4  border-gray-200 ">
                    <main class="card-body text-gray-600 ">
                       {{$slot}}
                    </main>
                </div>
            </div>


        </div>

      
        @stack('modals')

        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
       <x-livewire-alert::scripts />
        
        @isset($js)
            {{$js}}
        @endisset

        
        <script>
            
            


            

/* window.addEventListener('alert', event => { 
     toastr[event.detail.type](event.detail.message, 
     event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });
 */
    @if(Session::has('message'))
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
            @endif

</script>
        
    </body>
</html>
