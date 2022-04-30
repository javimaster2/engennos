<div  class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-6 pt-12">
    
   {{--  <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 focus:outline-none"> <i class=" fas fa-home text-lg mr-2"></i> Todos los cursos</button>

                <!-- component -->

                <!-- Dropdown -->
                <div class="relative" x-data="{open:false}">
                    <button class="block h-12 px-4 text-gray-700  rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open=true">
                        <i class=" fas fa-tags text-lg mr-2"></i>
                        Categoria
                        <i class=" fas fa-angle-down text-lg ml-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute left-0 w-64 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open=false">   
                        @foreach ($categories as $category)
                            <a wire:click="$set('category_id',{{ $category->id }})" x-on:click="open=false" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-bluee hover:text-white cursor-pointer">{{ $category->name }}</a>
                        @endforeach
                        
                    </div>
                <!-- // Dropdown Body -->
                </div>

        </div>
    </div> --}}

    

    {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
                       
        @endforeach
        
    </div> --}}
    
    
    
    <div wire:init="loadCourse">
        @if ($loaddata)
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 ">

            
                
                    <div class="col-span-1 lg:col-span-3 order-2 lg:order-1">
                            
                        <div class="relative" x-data="inputSearch()">
            
                            <span class="absolute inset-y-0 left-0 bottom-2  flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
            
                            <div class="absolute inset-y-0 right-5  flex top-2 " x-show="iconReset">
                                <svg 
                                    class="h-5 w-5 mt-1 cursor-pointer" 
                                    x-on:click="iconReset = false" 
                                    wire:click="resetInput" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke="currentColor"
                                >
                                    <path 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round" 
                                        stroke-width="2" 
                                        d="M6 18L18 6M6 6l12 12"
                                    >
                                    </path>
                                </svg>
                            </div>
                            <!-- Campo de búsqueda -->
                            <input 
                                type="text" 
                                x-on:keydown="iconReset = true" 
                                wire:model="search" 
                                placeholder="Introduzca el término a buscar..." class="mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full pl-10"
                            >
                            <!-- Icono para borrar el campo de búsqueda (ajústalo con tu css) -->
                            
                        </div>
                        @if ($courses->count())
                                <ul>
                                    @foreach ($courses as $course)
                                        <li class="pb-2 ">
                                            <a href="{{ route('courses.show',$course) }}" class="block sm:flex w-full">
                                                <div class="sm:w-36 md:w-64">
                                                    <figure class="aspect-w-16 aspect-h-9 sm:aspect-w-4 sm:aspect-h-3 md:aspect-w-16 md:aspect-h-9">
                                                        <img class=" w-full object-cover object-center rounded-md" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                                                    </figure>
                                                </div>
                                                <div class="lg:flex flex-1 mt-2 sm:mt-0 sm:ml-4 sm:mr-6">
                                                    <div class="flex-1">
            
                                                        <h3 class="text-lg mb-1 leading-5">{{ $course->title }}</h3>
                                                        <p class="text-sm text-gray-600">{{ $course->subtitle }}</p>
                                                        <p class="text-gray-500 text-sm mb-1">Docente: {{ Str::limit($course->teacher->name,15)}}</p>
                                                        <div class="flex">
                                                            <ul class="flex text-sm ">
                                                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=1 ? 'yellow':'gray' }}-400"></i></li>
                                                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=2 ? 'yellow':'gray' }}-400"></i></li>
                                                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=3 ? 'yellow':'gray' }}-400"></i></li>
                                                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=4 ? 'yellow':'gray' }}-400"></i></li>
                                                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=5 ? 'yellow':'gray' }}-400"></i></li>
                                                            </ul>
                                                            <p class="text-sm text-gray-500 ml-6"><i class="fas fa-users"></i>({{ $course->students_count }})</p>
                                    
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
            
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                        @else
                                <div class="px-6 py-4 text-center">
                                Lo sentimos no hemos encontrado resultados de tu busqueda
                                </div>
                        @endif
                    </div>
                    <div class="col-span-1 lg:col-span-1 order-1 lg:order-2">
                            <div class="sm:px-6 lg:px-2   rounded-md">
                                <button wire:click="resetFilters" class=" bg-indigo-100 shadow my-3 w-full h-14 rounded-md text-gray-700 mr-4 focus:outline-none"> <i class=" fas fa-home text-lg mr-2"></i> Todos los cursos</button>
                    
                                    <!-- component -->
                    
                                    <!-- Dropdown -->
                                    <div class="relative" x-data="{open:false}">
                                        <button class="bg-indigo-100 shadow my-3 w-full h-14 rounded-md text-gray-700 mr-4 focus:outline-none" x-on:click="open=true">
                                            <i class=" fas fa-tags text-lg mr-2"></i>
                                            Categoria
                                            <i class=" fas fa-angle-down text-lg ml-2"></i>
                                        </button>
                                        <!-- Dropdown Body -->
                                        <div class="absolute left-0 w-64 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open=false">   
                                            @foreach ($categories as $category)
                                                <a wire:click="$set('category_id',{{ $category->id }})" x-on:click="open=false" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-bluee hover:text-white cursor-pointer">{{ $category->name }}</a>
                                            @endforeach
                                            
                                        </div>
                                    <!-- // Dropdown Body -->
                                    </div>
                    
                            </div>
                    </div>
            
                </div>
        @else
        <p class="w-16 h-16 border-4 border-dashed rounded-full animate-spin border-blue-500 mx-auto"></p>
        @endif

    </div>

    <div  class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $courses->links() }}
    </div>

    
   
</div>
