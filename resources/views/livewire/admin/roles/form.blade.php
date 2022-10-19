 {{--modal--}}
 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        Roles | {{$selected_id>0 ? 'Editar':'Crear'  }}
    </x-slot>

    <x-slot name="content">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input id="name" class="block mt-1 w-full " type="text" wire:model='rolename'  placeholder="ej: Admin" />
                    @error('rolename')
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
            <x-jet-button class="ml-2 bg-green-500" wire:click="createRole()" wire:loading.attr="disabled">
                Crear
            </x-jet-button>
        @else
            <x-jet-button class="ml-2 bg-green-500" wire:click="updateRole()" wire:loading.attr="disabled">
                Actualizar
            </x-jet-button>
        @endif
        
    </x-slot>
  </x-jet-dialog-modal>
  {{--fin modal--}}


  <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
    <x-slot name="title">
        {{ __('Eliminar Registro') }}
    </x-slot>
    
    <x-slot name="content">
        {{ __('Seguro que desea eliminar el registro') }}
    </x-slot>

    <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button class="ml-2 bg-red-700" wire:click="destroy()" wire:loading.attr="disabled">
                Eliminar Post
            </x-jet-button>
        
    </x-slot>
  </x-jet-dialog-modal>