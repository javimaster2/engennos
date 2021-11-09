<div>
    <p class="text-lg font-bold mt-4 mb-2 text-center">Aprobar descarga del curso</p>


    <x-table-responsive>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado del curso</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado del recurso</th>
                    <th scope="col" class="relative px-6 py-3">
                       <span class="text-right">Accion</span> 
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($datos as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->completado }}%</td>
                            <td class="px-6 py-4 whitespace-nowrap ">{{ $item->state }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                @switch($item->state)
                                    @case("Pending")
                                    <a href="" class="btn btn-success cursor-not-allowed">Aprobar recurso</a>
                                        @break
                                    @case("Wait")
                                            <form id="terminado" action="{{route('instructor.course.aproved',$course)}}" method="POST">
                                                @csrf   
                                                <input type="hidden" value="{{ $item->state }}" name="estado" id="valorc">
                                                <button type="submit" class="btn btn-success"> Aprobar curso</button>
                                            </form>
                                        
                                        @break
                                    @case("Active")
                                        <p class="mt-2 text-green-600" >Ya se aprobo el recurso</p> 
                                    @break
                                
                                    @default
                                        
                                @endswitch
                                
                                {{-- @if ($item->state=="Wait")
                                
                                    <form id="terminado" action="{{route('instructor.course.aproved',$course)}}" method="POST">
                                        @csrf   
                                        <input type="hidden" value="{{ $item->state }}" name="estado" id="valorc">
                                        <button type="submit" class="btn btn-success"> Aprobar curso</button>
                                    </form>
                                @else
                                <a href="" class="btn btn-success cursor-not-allowed">Aprobar recurso</a>
                                @endif
                                @if ($item->state=="Active")
                                    <p class="mt-2 text-gray-600" >Ya se aprobo el recurso</p>
                                @endif --}}
                                
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </x-table-responsive>

    
    

</div> 

<script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

    
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message')}}");
                break;
        }
    @endif

</script>