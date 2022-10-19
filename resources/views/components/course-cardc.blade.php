@props(['course'])

<article class="bg-white overflow-hidden rounded-lg flex flex-col h-full">
    <figure class="aspect-w-16 aspect-h-9">
        <a href="{{ route('courses.show',$course) }}">
            <img class=" h-52 w-full object-cover object-center" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
        </a>
        
    </figure>
    


    <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
        <h1 class="text-lg font-semibold">
            <a href="{{ route('courses.show',$course) }}">
                {{ Str::limit($course->title,30) }}
            </a>
        </h1>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Docente: {{ Str::limit($course->teacher->name,15)}}</p>
        <div class="flex">
            <ul class="flex text-sm ">
                <li class="mr-1"><i class=" {{ $course->rating>=1 ? 'fas fa-star text-yellow-400':'far fa-star text-yellow-400 '}}"></i></li>
                <li class="mr-1"><i class=" {{ $course->rating>=2 ? 'fas fa-star text-yellow-400':'far fa-star text-yellow-400 '}}"></i></li>
                <li class="mr-1"><i class=" {{ $course->rating>=3 ? 'fas fa-star text-yellow-400':'far fa-star text-yellow-400 '}}"></i></li>
                <li class="mr-1"><i class=" {{ $course->rating>=4 ? 'fas fa-star text-yellow-400':'far fa-star text-yellow-400 '}}"></i></li>
                <li class="mr-1"><i class=" {{ $course->rating>=5 ? 'fas fa-star text-yellow-400':'far fa-star text-yellow-400 '}}"></i></li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto"><i class="fas fa-users"></i>({{ $course->students_count }})</p>

        </div>
        @if ($course->price->value==0)
            <p class="my-2 text-green-800 font-bold">Gratis</p>
        @else
            
            @if ($course->oferta)
                @if ($course->oferta->value!=0)
                    <p class="my-2 text-gray-500 font-bold ">Precio: <span class="line-through">US$ {{ $course->price->value }}</span> </p>
                    <p class="my-2 text-gray-500 font-bold"> Oferta:<span class=""> US$ {{ $course->oferta->value }}</span></p>
                @else
                    <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
                @endif
                
            @else
                <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
            @endif
        @endif
        <div>
            <a href="{{ route('courses.show',$course) }}" class="btn-block  btn btn-primary">
                Mas informacion
            </a>
        </div>
        
    </div>
</article>