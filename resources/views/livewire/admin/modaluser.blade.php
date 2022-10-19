 {{-- modal --}}
 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        {{ __('Eliminar Registro') }}
    </x-slot>
    
    <x-slot name="content">
        <div class="card">
            <div class="card-body">
                
                <h1 class="h5">Nombre</h1>
                <p class="form-control">{{ $user->name }}</p>
                <h1 class="h5">Lista de roles</h1>
                {!! Form::model($user,['route'=>['admin.users.update',$user],'method'=>'put']) !!}
                    @foreach ($roles as $role)
                    <div>
                        <label for="">
                            {!! Form::checkbox('roles[]', $role->id,null, ['class'=>'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                        
                    @endforeach
                    {!! Form::submit('Asignar role', ['class'=>'btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
              
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('openmodal', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
    </x-slot>
    </form>
  </x-jet-dialog-modal>