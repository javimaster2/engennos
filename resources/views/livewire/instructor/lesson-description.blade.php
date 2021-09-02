<div>
    <article class="card" x-data="{open:false}">
        <div class="card-body bg-gray-100 border">
            <header class="flex  items-center cursor-pointer"x-on:click="open=!open">
                <h1 class="text-md text-gray-500 " >Descripcion de la leccion</h1>
                
                    <template x-if="!open">
                        <i class=" fas fa-angle-down text-lg ml-2"></i> 
                    </template>
                    <template x-if="open">
                        <i class=" fas fa-angle-up text-lg ml-2"></i> 
                    </template>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name"  class="focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded"></textarea>
                        @error('description.name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button type="button" class="btn btn-danger text-sm" wire:click="destroy">Eliminar</button>
                            <button type="submit" class="btn btn-primary text-sm ml-2">Actualizar</button>
                        </div>
                    </form>
                @else
                    <div>
                        <textarea wire:model="name"  class="focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded" placeholder="Ingrese la descripcion de la leccion"></textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button  class="btn btn-primary text-sm ml-2" wire:click="store">Agregar Descripcion</button>
                        </div>
                    </div>
                
                @endif
            </div>
            
        </div>
    </article>
</div>
