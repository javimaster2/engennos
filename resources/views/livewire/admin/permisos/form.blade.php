 {{--modal--}}
 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        Asignar
    </x-slot>

    <x-slot name="content">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input id="name" class="block mt-1 w-full " type="text" wire:model='permissionname'  placeholder="ej: Category_index" />
                    @error('permissionname')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                    
                </div>
            </div>
        </div>
    
    </x-slot>

    <x-slot name="footer">

        <x-jet-secondary-button wire:click="cancelar"  wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>
        @if($selected_id<1)
            <x-jet-button class="ml-2 bg-green-500" wire:click="createPermission()" wire:loading.attr="disabled">
                Crear
            </x-jet-button>
        @else
            <x-jet-button class="ml-2 bg-green-500" wire:click="updatePermission()" wire:loading.attr="disabled">
                Actualizar
            </x-jet-button>
        @endif
        
    </x-slot>
  </x-jet-dialog-modal>
  {{--fin modal--}}


  <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
    <x-slot name="title">
        {{ __('Revocar permisos') }}
    </x-slot>
    
    <x-slot name="content">
        {{ __('Seguro que desea revocar los permisos') }}
    </x-slot>

    <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button class="ml-2 bg-red-700" wire:click="destroy()" wire:loading.attr="disabled">
                Eliminar Permiso
            </x-jet-button>
        
    </x-slot>
  </x-jet-dialog-modal>