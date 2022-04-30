<div>

    @include('livewire.admin.reporte.modaldatos')
    <div class="grid grid-cols-7 gap-2">
        <div class="col-span-2">
            <article class="bg-white  shadow-xl sm:rounded-lg ">
        
                {{-- <div class="px-6 py-4">
                    <h6>Elige el tipo de reporte</h6>
                    
                    
                        
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Selection</label>
                        <select class="w-full rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                            <option value="0" selected>Ventas del dia</option>
                            <option value="1" selected>Ventas por fecha</option>
                        </select>
                </div> --}}
                <div class="px-6 py-4">
                    <h6>Fecha desde</h6>
                        <input type="date" wire:model="datefrom" class="w-full rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent flatpickr"  placeholder="Elija la fecha">
                </div>
                <div class="px-6 py-4">
                    <h6>Fecha hasta</h6>
                        <input type="date" wire:model="dateto" class="w-full rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent flatpickr" placeholder="Elija la fecha">
                </div>
        
                {{-- <div class="px-6 py-4">
                    <button wire:click="$refresh" class="btn btn-primary">Consultar</button>
                    <a href="{{ url('report/pdf'.'/'. $userid .'/'. $reportType.'/'. $datefrom.'/'. $dateto) }}" target="_blank" class="btn btn-primary {{ count($courses) <1 ? 'disabled':'' }}">Generar pdf</a>
                    <a href="{{ url('report/excel'.'/'. $userid .'/'. $reportType.'/'. $datefrom.'/'. $dateto) }}" target="_blank" class="btn btn-success {{ count($courses) <1 ? 'disabled':'' }}">Generar Excel</a>
                </div> --}}
        
            </article>
            
        </div>
        <div class="col-span-5">
            <div class="overflow-hidden shadow-md sm:rounded-lg mt-5">
                <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Courses
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Fecha
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Accion
                            </th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (count($courses)<1)
                            <tr><td class="col-span-7"><h5>Sin registros</h5></td></tr>
                        @else
                            @foreach ($courses as $course)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $course->id }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $course->title }}    
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($course->created_at)->format('d-m-y')}}
                                    </td>
                                    
                                    <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                        
                                        <a  wire:click="mostrardatos({{$course->id}})" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline cursor-pointer" title="Mostrar datos"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.reporte.detalles',$course) }}"  class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline cursor-pointer" title="eliminar registros"><i class="fas fa-eraser"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    {{-- Stop trying to control. --}}
    
</div>

