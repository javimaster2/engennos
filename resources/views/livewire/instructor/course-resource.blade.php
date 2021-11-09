<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    
    <div class="flex justify-center mb-5 mt-10">
        <h2 class="font-bold">Nombre del curso: <span class="font-normal">{{ $course->title }}</span></h2>
        
    </div>
    {{ $prueba }}
    
    <div class="card " x-data="{open:true}">
        <div class="card-body bg-gray-100 border">
            <header class="flex  items-center cursor-pointer" x-on:click="open=!open">
                <h1 class="text-md text-gray-500 ">Recurso del curso</h1>
                <template x-if="!open">
                    <i class=" fas fa-angle-down text-lg ml-2"></i> 
                </template>
                <template x-if="open">
                    <i class=" fas fa-angle-up text-lg ml-2"></i> 
                </template>
            </header>
    
            <div x-show="open">
                <hr class="my-2">
                @if ($course->resource)
                    <div class="flex justify-between items-center">
                        <p><i class="fas fa-download text-gray-500 mr-2 cursor-pointer" wire:click="download"></i>{{ $course->resource->url }}</p>
                        <i class="fas fa-trash text-red-500 cursor-pointer" wire:clicK="destroy"></i>
                    </div>
                @else
                    <form wire:submit.prevent="saved">
                        <div class="flex items-center">
                                    <input type='file' class="form-input flex-1"  wire:model="file"/>
                                
                            <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                        </div>
                       
                        <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                            Cargando...
                        </div>
                        @error('file')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                
                @endif
            </div>
        </div>
    </div>
    
</div>
