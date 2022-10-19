<div class="flex flex-col">
    @include('livewire.admin.roles.form')
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

                <x-jet-button wire:click="$set('openmodal',true)"
                    wire:loading.attr="disabled" class="ml-4">
                Crear
                </x-jet-button>
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
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                Accion
                            </th>
                        
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($roles as $role)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $role->id }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $role->name }}
                                </td>
                                
                                
                                <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                    <a wire:click="Edit({{ $role->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline cursor-pointer" title="Editar registro"><i class="fas fa-edit"></i></a>
                                    <a wire:click="deleteShowModal({{ $role->id }})"class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline cursor-pointer" title="eliminar registros"><i class="fas fa-eraser"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Product 1 -->
                        
                        <!-- Product 2 -->
                        
                        <!-- Product 2 -->
                        
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded',function(){
        window.livewire.on('role-added',Msg=>{
            noty(Msg)
        })
        window.livewire.on('role-update',Msg=>{
            noty(Msg)
        })
        window.livewire.on('role-delete',Msg=>{
            noty(Msg)
        })
        window.livewire.on('role-exists',Msg=>{
            noty(Msg)
        })
        window.livewire.on('role-error',Msg=>{
            noty(Msg)
        })
    });


    
</script>