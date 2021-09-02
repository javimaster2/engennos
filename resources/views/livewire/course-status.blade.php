<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">

           

            {{-- Inicio --}}
            <video width="100%" height="300px" disablepictureinpicture controls controlsList="nodownload">
                <source src="https://filedn.com/lUsjRcKpAniL3VtPyGNja0h/HC%20%20LEARNING_1080p.mp4" type="video/mp4">
            </video>
            {{-- fin --}}

            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">{{ $current->name }}</h1>
            
            @if ($current->description)
                <div class="text-gray-600">
                    {{ $current->description->name }}
                </div>
            @endif

            <div class="flex justify-between mt-4">
                <div wire:click="completed" class="flex items-center ">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-600 cursor-pointer"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600 cursor-pointer"></i>
                    @endif
                    <p class="text-sm ml-2 cursor-pointer">Marcar esta unidad como culminada</p>
                </div>

                 @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg "></i>
                        <p class="text-sm ml-2">Descargar Recursos</p>
                    </div>
                 @endif
            </div>
            

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>
                    @endif
                    @if ($this->next)
                         <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Tema siguiente</a>
                    @endif
                    
                </div>
            </div>
            
        {{--  
             <p>Indice::{{ $this->index  }}</p>
            <p>Previous:@if ($this->previous)
                {{ $this->previous->id }}
            @endif</p>
            <p>Next @if ($this->next)
                {{ $this->next->id }}
            @endif</p>--}}
        </div>
        <div class="card border ">
            <div class="card-body ">
                <h1 class="text-gray-800 text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500 text-sm" href="">{{'@'. Str::slug($course->teacher->name,'') }}</a>
                    </div>
                </div>
                {{-- barra de navegacion --}}
                <p class="text-gray-600 text-sm mt-2">{{ $this->advance. '%'}} completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-400">
                      <div style="width:{{ $this->advance. '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-bluelogo transition-all duration-300"></div>
                    </div>
                  </div>
                  {{-- lista de lecciones --}}
                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base mb-3 block">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id==$lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                    @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                                   
                                            @else
                                                @if ($current->id==$lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                                    
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:clicK="changeLesson({{ $lesson }})">{{ $lesson->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
</div>
