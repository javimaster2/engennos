<div>
    @include('livewire.instructor.cupones.form')
    <p class="text-lg font-bold mt-4 mb-2 text-center">Aprobar cupon para {{ $course->title }} </p>
    {{$current}}
    <div class="flex justify-end mt-5">
        <button class="btn btn-success" wire:click="$set('openmodal',true)">Agregar Cupon</button>
    </div>

    @if (session()->has('livewire-alert'))
    <script> 
        window.onload = event => {
            flashAlert(
                @json(session('livewire-alert'))
            ) 
        }
    </script>
    @endif

    
    <x-table-responsive>
        @if ($cupons->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Codigo</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uso</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">cantidad</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FechaVencimiento</th>
                    <th scope="col" class="relative px-6 py-3">
                       <span class="text-right">Accion</span> 
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                
                        @foreach ($cupons as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->codigo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap ">{{ $item->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap ">{{ $item->uso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap ">{{ $item->tipo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap ">{{ $item->cantidad }}</td>
                            <td class="px-6 py-4 whitespace-nowrap ">{{ $item->valor }}</td>
                            <td class="px-6 py-4 whitespace-nowrap ">{{ $item->fecha_vencimiento }}</td>
                            <td width="10px" >
                                <button class="btn btn-success" wire:click="editar({{$item->id}})"><i class="far fa-edit"></i></button>
                            </td>
                            <td width="10px">
                                <button class="btn btn-danger" wire:click="deletecupon({{ $item->id }})"><i class="fas fa-trash text-white"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="px-6 py-4 text-center">
                        No hay cupones de descuentos
                    </div>
                @endif
                    
                    
            </tbody>
        </table>
    </x-table-responsive>
    
</div>
