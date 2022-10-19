<div >
    {{-- Care about people's approval and you will be their prisoner. --}}
    
        <x-jet-danger-button class="btn btn-primary btn-sm float-right" wire:click="$set('open',true)">
            Crear Categoria
        </x-jet-danger-button>
    

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text"  class="w-full" wire:model.defer="name"/>

                @error('name')
                    <span class="text-danger text-sm">{{$message}}</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button >
            <x-jet-danger-button wire:click="save">
                Crear Categoria
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
