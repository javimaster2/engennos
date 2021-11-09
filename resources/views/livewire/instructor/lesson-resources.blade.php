<div class="card " x-data="{open:false}">
    
    <div class="card-body bg-gray-100 border">
        <header class="flex  items-center cursor-pointer" x-on:click="open=!open">
            <h1 class="text-md text-gray-500 ">Recursos de la leccion</h1>
            <template x-if="!open">
                <i class=" fas fa-angle-down text-lg ml-2"></i> 
            </template>
            <template x-if="open">
                <i class=" fas fa-angle-up text-lg ml-2"></i> 
            </template>
        </header>

        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i class="fas fa-download text-gray-500 mr-2 cursor-pointer" wire:click="download"></i>{{ $lesson->resource->url }}</p>
                    <i class="fas fa-trash text-red-500 cursor-pointer" wire:clicK="destroy"></i>
                </div>
            @else
                
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <label
                            class="w-full flex flex-col items-center  bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-bluee hover:text-white text-purple-600 ease-linear transition-all duration-150">
                                <i class="fas fa-cloud-upload-alt fa-3x"></i>
                                <span class="mt-2 text-base leading-normal">Seleccionar archivo</span>
                                <input type='file' class="hidden"  wire:model="file"/>
                                
                                
                            </label>
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
