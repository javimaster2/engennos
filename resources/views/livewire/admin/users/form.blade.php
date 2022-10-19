 {{--modal--}}
 <x-jet-dialog-modal wire:model="openmodal">
    <x-slot name="title">
        Actualizar roles
    </x-slot>

    <x-slot name="content">
        <div class="card">
                    <p>{{$name}}</p>

                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                ID
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Role
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                                                Permiso con roles
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
                                                    <div class="flex justify-center ">
                                                        
                                                    
                                                            
                                                            <label class="inline-flex items-center mt-3">
                                                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                                                wire:change="syncRole($('#p'+ {{ $role->id }}).is(':checked'), '{{ $role->name }}')" type="checkbox" value="" id="p{{ $role->id }}"
                                                                value="{{ $role->id }}" 
                                                                {{ $role->checked==1 ? 'checked':'' }}><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                                                            </label>
                                                        
                                                    
                                                        
                                                    </div>
                                                    
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                   {{--  <h6> {{ \App\Models\User::role($role->name)->count() }}</h6> --}}
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
    
    </x-slot>

    <x-slot name="footer">

        <x-jet-secondary-button wire:click="cancelar"  wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>
       
          {{--   <x-jet-button class="ml-2 bg-green-500" wire:click="update()" wire:loading.attr="disabled">
                Actualizar
            </x-jet-button> --}}
        
        
    </x-slot>
  </x-jet-dialog-modal>
  {{--fin modal--}}


