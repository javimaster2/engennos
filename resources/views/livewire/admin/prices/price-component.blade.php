<div class=" mx-auto max-w-7xl">
    

    @include('livewire.admin.prices.form')

    <div class="card">
        <div class="card-body">
            
            <x-jet-danger-button class="btn btn-primary btn-sm float-right" wire:click="$set('openmodal',true)">
                Crear Precio
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
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td width="10px">
                                
                                <button class="btn btn-success" wire:click="editar({{$price->id}})"><i class="far fa-edit"></i></button>
                            </td>
                            <td width="10px">
                                
                                <button class="btn btn-danger" wire:click="$emit('deleteCat',{{ $price }})"><i class="fas fa-trash text-white"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{--  <div class="flex flex-col">
    @include('livewire.admin.prices.form')
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Nombre                                
                            </th>
                            
                            <th scope="col" class="relative py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Product 1 -->
                        @foreach ($prices as $price)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$price->id}}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{$price->name}}
                                </td>
                                
                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                    <a class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline" wire:click="editar({{$price->id}})">Edit</a>
                                    <a class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline" wire:click="$emit('deleteCat',{{ $price }})">Delete</a>
                                </td>
                         
                        </tr>
                        <!-- Product 2 -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
     --}}