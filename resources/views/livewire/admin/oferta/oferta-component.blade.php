


{{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12" >
    
    
            <article class="bg-white  shadow-xl sm:rounded-lg ">
                <div class="px-6 py-4 ">
                    
                    <h6>Elige el usuario</h6>
                        
                    
                        
                        <div class="flex justify-between">
                            <button wire:click="resetFilters" class=" bg-indigo-100 shadow w-full my-3 h-14 rounded-md text-gray-700 mr-4 focus:outline-none"> <i class=" fas fa-home text-lg mr-2"></i> All user</button>
                            <div class="relative w-full" x-data="{open:false}">
                                <button class="bg-indigo-100 shadow my-3 w-full h-14 rounded-md text-gray-700 mr-4 focus:outline-none" x-on:click="open=true">
                                    <i class=" fas fa-tags text-lg mr-2"></i>
                                    Docente
                                    <i class=" fas fa-angle-down text-lg ml-2"></i>
                                </button>
                                <div class="absolute left-0 w-64 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open=false">   
                                    @foreach ($users as $user)
                                        
                                        <a wire:click="$set('user_id',{{ $user->id }})" x-on:click="open=false" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-bluee hover:text-white cursor-pointer">{{ $user->name }}</a>
                                        
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                       
                </div>
                <div class="px-6 py-4">
                    <h6>Elige el tipo de reporte</h6>
                        
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Selection</label>
                        <select class="w-full rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                            <option value="0" selected>Ventas del dia</option>
                            <option value="1" selected>Ventas por fecha</option>
                        </select>
                </div>
                <div class="px-6 py-4">
                    <h6>Fecha desde</h6>
                        <input type="date" wire:model="datafrom" class="w-full rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent flatpickr"  placeholder="Elija la fecha">
                </div>
                <div class="px-6 py-4">
                    <h6>Fecha hasta</h6>
                        <input type="date" wire:model="datato" class="w-full rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent flatpickr" placeholder="Elija la fecha">
                </div>

                <div class="px-6 py-4">
                    <button wire:click="$refresh" class="btn btn-primary">Consultar</button>
                    <a href="{{ url('report/pdf'.'/'. $userid .'/'. $reportType.'/'. $datefrom.'/'. $dateto) }}" target="_blank" class="btn btn-primary {{ count($data) <1 ? 'disabled':'' }}">Generar pdf</a>
                    <a href="{{ url('report/excel'.'/'. $userid .'/'. $reportType.'/'. $datefrom.'/'. $dateto) }}" target="_blank" class="btn btn-success {{ count($data) <1 ? 'disabled':'' }}">Generar Excel</a>
                </div>

            </article>
        
        
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
                        
                        @if (count($data)<1)
                            <tr><td class="col-span-7"><h5>Sin registros</h5></td></tr>
                        @else
                            @foreach ($data as $da)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $da->id }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $da->title }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($da->created_at)->format('d-m-y')}}
                                    </td>
                                    
                                    <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                        <a wire:click="Edit({{ $da->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline cursor-pointer" title="Editar registro"><i class="fas fa-edit"></i></a>
                                        <a wire:click="deleteShowModal({{ $da->id }})"class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline cursor-pointer" title="eliminar registros"><i class="fas fa-eraser"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                        
                    </tbody>
                </table>
            </div>
        

    
</div> --}}


<div class="flex flex-col">
    @include('livewire.admin.oferta.form')
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            
			<div class="flex pr-4 justify-between mb-5">
				<div class="relative md:w-1/3">
					<input type="search" wire:model="search"
						class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
						placeholder="Search...">
					<div class="absolute top-0 left-0 inline-flex items-center p-2">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
							stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
							stroke-linejoin="round">
							<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
							<circle cx="10" cy="10" r="7" />
							<line x1="21" y1="21" x2="15" y2="15" />
						</svg>
					</div>
				</div>
                
               
			</div>
            <div class="flex">
                <div class="mb-3 xl:w-96">
                    <select wire:model="oferta" class="form-select appearance-none
                      block
                      w-full
                      px-3
                      py-1.5
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected value="Elegir">=Seleccione la oferta=</option>
                        @foreach ($ofertas as $oferta)
                        <option  value="{{ $oferta->id }}">{{ $oferta->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                <button wire:click.prevent="syncAll()" class="btn btn-primary mr-5 ml-5">Ofertar Todos</button>
                <button wire:click="removeAll()" class="btn btn-primary ">Revocar ofertas</button>
            </div>
            
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                
                

                <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Descripcion
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Oferta
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Accion
                            </th>
                        
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        @foreach ($courses as $course)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $course->id }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $course->title }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                   {{ $course->oferta->name}}
                                </td>
                                
                                
                                <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                    <a {{-- href="{{ route('admin.oferta.show',$course) }}" --}} wire:click="Edit({{ $course->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline cursor-pointer" title="Editar registro"><i class="fas fa-edit"></i></a>
                                   
                                </td>
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
</div>

