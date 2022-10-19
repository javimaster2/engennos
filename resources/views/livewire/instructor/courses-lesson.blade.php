<div>
    @foreach ($section->lessons as $item)
         <article class="card mt-4" x-data="{open:false}">
             <div class="card-body">
                 @if ($lesson->id==$item->id)
                     <form wire:submit.prevent="update">
                         <div class="flex items-center">
                             <label class="w-32">Nombre:</label>
                             <input class="focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded" wire:model="lesson.name">
                         </div>
                            @error('lesson.name')
                                <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror
                         <div class="flex items-center mt-4">
                             <label class="w-32">Plataforma:</label>
                             <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                 @foreach ($platforms as $platform)
                                     <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                 @endforeach
                             </select>
                         </div>

                         <div class="flex items-center mt-4">
                            <label class="w-32">Url:</label>
                            <input class="focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded" wire:model="lesson.url">
                        </div>
                            @error('lesson.url')
                                <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror
                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn btn-danger text-xs" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-primary text-xs ml-2">Actualizar</button>
                        </div>
                     </form>
                 @else
                    <header>
                        <h1 class="cursor-pointer" x-on:click="open=!open"><i class="far fa-play-circle text-blue-500 mr-1"></i> Leccion: {{$item->name}}</h1>
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a>  </p>
                        <div class="my-2">
                            <button class="btn btn-primary text-sm mr-2" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{ $item }})">Eliminar</button>
                        </div>
                        {{-- section descripcion livewire --}}
                        <div class="mb-4">
                            @livewire('instructor.lesson-description',['lesson'=>$item],key('lesson-description-'.$item->id))
                        </div>
                        <div>
                            @livewire('instructor.lesson-resources',['lesson'=>$item],key('lesson-resources'.$item->id))
                        </div>
                    </div>
                @endif
             </div>
         </article>
    @endforeach

    <div class="mt-4" x-data="{open:false}">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva leccion
        </a>

        <article x-show="open" class="card">
            <div class="card-body ">
                <h1 class="text-xl font-bold mb-4">Agregar Nueva leccion</h1>
                <div class="mb-4">
                    {{-- formulario para agregar nueva leccion --}}
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input class="focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded" wire:model="name">
                        </div>
                            @error('name')
                                <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>
                            @error('platform_id')
                                <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Url:</label>
                            <input class="focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded" wire:model="url">
                        </div>
                        @error('url')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                        {{ $iframe }}
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open=false">Cancelar</button>
                    <button class="btn btn-primary ml-2 " wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
