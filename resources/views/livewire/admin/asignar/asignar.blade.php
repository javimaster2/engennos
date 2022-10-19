<div class="flex flex-col">
    
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            
			<div class="flex pr-4  mb-5">

				<div class="mb-3 xl:w-96">
                    <select wire:model="role" class="form-select appearance-none
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
                        <option selected value="Elegir">=Seleccione el rol=</option>
                        @foreach ($roles as $role)
                        <option  value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                <button wire:click.prevent="syncAll()" class="btn btn-primary mr-5 ml-5">Sincronizar Todos</button>
                <button wire:click="removeAll()" class="btn btn-primary ">Revocar Todos</button>

			</div>
            
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Permisos
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Usuarios con permiso
                            </th>
                        
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($permisos as $permiso)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $permiso->id }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <div class="block ">
                                        
                                                 <label class="inline-flex  whitespace-nowrap items-center mt-3">
                                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded-full"
                                                    wire:change="syncPermiso($('#p'+ {{ $permiso->id }}).is(':checked'), '{{ $permiso->name }}')" type="checkbox" value="" id="p{{ $permiso->id }}"
                                                    value="{{ $permiso->id }}" 
                                                    {{ $permiso->checked==1 ? 'checked':'' }}><span class="ml-2 text-gray-700">{{ $permiso->name }}</span>
                                                </label>
                                        
                                    </div>
                                     
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 text-center dark:text-white">
                                    <h6> {{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                </td>
                                
                               
                            </tr>
                        @endforeach
                        <!-- Product 1 -->
                        
                        <!-- Product 2 -->
                        
                        <!-- Product 2 -->
                        
                    </tbody>
                </table>
                {{ $permisos->links() }}
            </div>
        </div>
        
    </div>
    
</div>



