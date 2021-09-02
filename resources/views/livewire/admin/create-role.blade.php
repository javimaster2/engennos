<div >
    <x-jet-button wire:click="$set('open',true)">
        Crear Rol
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open" >
        <x-slot name="title">
            Crear Nuevo Rol
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">

                    {{--{!! Form::open(['route'=>'admin.role.store']) !!}
                         <div class="form-group">
                             {!! Form::label('name', 'Nombre') !!}
                             {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese un rol']) !!}
                         </div>

                         <strong>Permisos</strong>
                         @foreach ($permissions as $permission)
                             <div>
                                 <label >
                                     {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                                     {{ $permission->name }}
                                 </label>
                             </div>
                         @endforeach
                         {!! Form::submit('Crear Role', ['class'=>'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}--}}

                    
                    <div class="mb-4">
                        <x-jet-label value="Nombre" />
                        <x-jet-input type="text" class="w-full items-center "  wire:model="name" />
                        <x-jet-input-error for="name"/>
                        
                    </div>
                    
                    <x-jet-label value="Permiso" />
                        @foreach ($permissions as $permission)
                            <div>
                                    <input class="rounded-full " type="checkbox" wire:model="permissionsid" value="{{ $permission->id }}">
                                    {{ $permission->name }}
                            </div>
                        @endforeach
                    <x-jet-input-error for="permission"/>
                </div>

                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="bg-green-700 hover:bg-green-500 disabled:opacity-20" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Crear Post
            </x-jet-button>

        </x-slot> 
    </x-jet-dialog-modal>
</div>
