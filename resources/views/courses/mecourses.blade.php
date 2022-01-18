<x-app-layout>
    

   
        
    <section class="my-10 mb-3">
        <h1 class="text-center text-3xl text-gray-600">Mis cursos</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 ">
            @foreach ($courses as $course)
                
                    <article class="card flex flex-col">
                        <!--<img class="h-52 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">-->
                        <img class="h-44 w-full object-cover " src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                       
                        <div class="card-body flex-1 flex flex-col">
                            <h1 class="card-title">{{ Str::limit($course->title,40) }}</h1>
                            <p class="text-gray-500 text-sm mb-2 mt-auto">Docente: {{ $course->teacher->name }}</p>
                    
                            

                            <a href="{{ route('courses.status',$course) }}" class="btn-block  btn btn-primary">
                                Ir al curso
                            </a>
                        </div>
                    </article>
            
            @endforeach
        </div>
            
    </section>

    @if ($courses->count()==0)
    <div class= "max-w-7xl mx-auto ">
        <p class="my-2 text-gray-500 font-bold text-center">No tiene cursos disponibles aun</p>
    </div>
    @endif
    

   
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $courses->links() }}
    </div>

</x-app-layout>
