<div>
    
    <div class="card">
        <div class="card-header">
            <input class="form-control w-100" placeholder="Ingrese un nombre" wire:model="search" >
        </div>
        @if ($users->count())  
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary text-white" wire:click="edit({{ $user }})">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <div class="card-body text-center text-lg">
            <strong >No hay registro para {{ $search }}</strong>
        </div>
        @endif
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
    @include('livewire.admin.modaluser')
</div>
