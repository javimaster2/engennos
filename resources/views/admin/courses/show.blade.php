<x-app-layout>
    <section class="capa-gradient2  py-12 mb-12 " >
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure class="relative">
               
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                @else
                    <img class="h-60 w-full object-cover" src="https://images.pexels.com/photos/4218864/pexels-photo-4218864.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                @endif
                
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>  
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                <p><i class="far fa-star"></i> Calificacion: {{ $course->rating }}</p>
            </div>
        </div>
    </section>
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
        <div class="absolute right-0 top-0 m-5">
            

        </div>
        @endif
        {{-- columna de dos espacios --}}
        <div class="order-2 lg:col-span-2 lg:order-1">

            {{--Seccion Metas--}}
            <section class="card border border-gray-200 mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2 ">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-yellow-600 mr-2"></i> {{ $goal->name }}</li>
                        @empty
                            <li class="text-gray-700 text-base">Este curso no tiene asignado ninguna meta</li>
                        @endforelse
                    </ul>
                </div>
            </section>

            {{--Seccion Temario--}}
            <section class="mb-12">
                <h1 class="text-gray-700 text-3xl mb-2">Temario</h1>
                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow" 
                    @if ($loop->first)
                        x-data="{ open:true }"
                    @else
                        x-data="{ open:false }"
                    @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200 " x-on:click="open=!open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}<i class=" fas fa-angle-down text-lg ml-5"></i></h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base "><i class="fas fa-check-circle mr-2 text-bluelogo"></i> {{ $lesson->name }}</li>
                                @endforeach
                            </ul>

                        </div>
                    </article>
                @empty
                    <article class="card">
                        <div class="card-body">
                            este curso no tiene ninguna seccion asignada
                        </div>
                    </article>
                @endforelse
            </section>

              {{--Seccion Requisitos--}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-base text-gray-700">{{ $requirement->name }}</li>
                    @empty
                        <li class="text-base text-gray-700">Este curso no tiene ningun requerimiento</li>   
                    @endforelse
                </ul>
            </section>

             {{--Seccion Requisitos--}}
            <section>
                    <h1 class="font-bold text-3xl">Descripcion</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>
        </div>
        {{-- columna izquierda --}}
        <div class="order-1 lg:order-2">
            <section class="card border mb-4 border-gray-200">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class=" h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url}}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="text-gray-500 font-bold text-lg">Docente. {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 tex-sm font-bold">{{ '@'. Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>
                    <form action="{{route('admin.courses.approved',$course)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success w-full mt-4" >Aprobar curso</button>
                    </form>

                    <a href="{{route('admin.courses.observation',$course)}}" class="btn btn-danger block text-center mt-4">Observar Cursos</a>
                    

                </div>

            </section>
            
        </div>

    </div>

    
</x-app-layout>