 {{--modal--}}
 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        Ingresar los datos
    </x-slot>

    <x-slot name="content">
        <div class="card">
            <div class="card-body">
                
                

                <div class="mb-4">
                    <x-jet-label value="Nombre" />
                    <x-jet-input id="name" class="block mt-1 w-full " type="text" wire:model.debounce.200ms='name'  placeholder="Ingrese un nombre" />
                    @error('name')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                    
                </div>
            
                
                    <x-jet-label value="Permiso" />
                    @foreach ($permissions as $permission)
                        <div>
                            
                            @if ($accion=="store")
                                <input class="rounded-full" type="checkbox" wire:model="permissionsid" value="{{ $permission->id }}" >
                                {{ $permission->name }}
                                @endif
                                
                            @if ($accion=="update")
                                <input class="rounded-full" type="checkbox" wire:model="permissionsedit" value="{{ $permission->id }}" {{ $id_permission->contains($permission->is) ? 'checked':''}} >
                                {{ $permission->name }}
                             @endif
                                
                                                            
    
                        </div>
                    @endforeach
                        @error('name')
                            <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                        
                    
            </div>
        </div>
    {{ $roleid }} {{ $name }} 
    </x-slot>

    <x-slot name="footer">

        @if($accion=="store")
            <x-jet-secondary-button wire:click="$set('openmodal', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button class="ml-2 bg-green-500" wire:click="store" wire:loading.attr="disabled">
                Crear
            </x-jet-button>
        @else
            <x-jet-secondary-button wire:click="$set('openmodal', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button class="ml-2 bg-green-500" wire:click="update" wire:loading.attr="disabled">
                Actualizar
            </x-jet-button>
        @endif
        
    </x-slot>
  </x-jet-dialog-modal>
  {{--fin modal--}}


  {{-- modal delete --}}
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