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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased ">
        <x-jet-banner />

        <div class="min-h-screen bg-bluelogo">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            

            <!-- Page Content -->
            <div class="container grid grid-cols-5  mt-4 gap-4">
                <aside class=" border-r-2 border-t-2 rounded">
                    <h1 class="font-bold text-xl mb-4 mt-2 text-white text-center">Edicion del curso</h1>
                    <ul class="text-sm text-gray-100 mb-6">
                        <li class="leading-7  mb-2 border-l-4 @routeIs('instructor.courses.edit',$course) border-white text-lg font-bold @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit',$course)}}">Informacion del curso</a>
                        </li>
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.curriculum',$course) border-white text-lg font-bold @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum',$course)}}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.goals',$course) border-white text-lg font-bold @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals',$course)}}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-2 border-l-4 @routeIs('instructor.courses.students',$course) border-white text-lg font-bold @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.students',$course)}}">Estudiantes</a>
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
        
        @isset($js)
            {{$js}}
        @endisset
        
    </body>
</html>
