<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
  

    @include('livewire.admin.category.form')

    <div class="card">
        <div class="card-body">
            
            <x-jet-danger-button class="btn btn-primary btn-sm float-right" wire:click="$set('openmodal',true)">
                Crear Categoria
            </x-jet-danger-button>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                {{-- <a href="{{route('admin.categories.edit',$category)}}" class="btn btn-success">Editar</a> --}}
                                <button class="btn btn-success" wire:click="editar({{$category->id}})">Editar</button>
                            </td>
                            <td width="10px">
                                {{-- <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger ">Eliminar</button>
                                </form> --}}
                                <button class="btn btn-danger" wire:click="$emit('deleteCat',{{ $category }})"><i class="fas fa-trash text-white"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

