<div>

    <div class="card">
        
        <div class="card-header">
            {{-- @livewire('admin.create-role') --}}
            <x-jet-button wire:click="$set('openmodal',true)"
            wire:loading.attr="disabled" class="ml-4">
        Crear
        </x-jet-button>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                               {{-- @livewire('admin.edit-role',['role'=>$role],key($role->id)) --}}
                               <button wire:click="edit({{ $role->id }})" class="btn-primary w-full mb-2">Editar</button>
                               <button wire:click="deleteShowModal({{ $role->id }})" class="btn-delete">Eliminar</button>
                                
                            </td>
                            <td width="10px">
                               {{-- aqui va eliminar --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningun rol registrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $roles->links() }}
        </div>
    </div>
</div>
@include('livewire.admin.modal')

<script>
    document.addEventListener('DOMContentLoaded',function(){
        window.livewire.on('roleadded')
    });
</script>