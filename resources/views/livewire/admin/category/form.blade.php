 {{--modal--}}



 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        Crear Categoria
    </x-slot>

    <x-slot name="content">
        <div class="mb-4">
            <x-jet-label for="name" value="Nombre" />
            <x-jet-input type="text"  class="w-full" wire:model.defer="name" id="name"/>
           

            @error('name')
                <span class="text-danger text-sm">{{$message}}</span>
            @enderror
        </div>    
     
    </x-slot>

    <x-slot name="footer">

        <x-jet-secondary-button wire:click.prevent="closemodal()">
            Cancelar
        </x-jet-secondary-button >
        
        @if ($accion=="store")
            <x-jet-danger-button wire:click.prevent="guardar()">
                Crear
            </x-jet-danger-button>
        @else
            <x-jet-danger-button wire:click.prevent="guardar()">
                Actualizar
            </x-jet-danger-button>
        @endif
        
        

    </x-slot>
  </x-jet-dialog-modal>

    