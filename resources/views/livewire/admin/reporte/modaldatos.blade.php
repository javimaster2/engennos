 {{--modal--}}



 <x-jet-dialog-modal wire:model="openmodal"  maxWidth="7xl">
  <x-slot name="title"></x-slot>
  <x-slot name="content">
    <section class="bg-gray-100 py-10">
      <div class="max-w-5xl mx-auto py-0 md:py-16">
        <article class="shadow-none md:shadow-md md:rounded-md overflow-hidden">
          <div class="md:rounded-b-md  bg-white">
            <div class="p-9 border-b border-gray-200">
              <div class="space-y-6">
                <div class="flex justify-between items-top">
                  <div class="space-y-4">
                    <div>
                      <img class="h-20 object-cover mb-4  " src="{{asset('LOGO-ENGENNOS.png')}}" >
                      <p class="font-bold text-lg"> Nombre del curso </p>
                      <p> {{ $title}} </p>
                      
                    </div>
                    <div>
                      <p class="font-medium text-sm text-gray-400"> Creado por: </p>
                      <p> {{ Auth()->user()->name }} </p>
                    </div>
                  </div>
                  <div class="space-y-2">
                    <div>
                      <p class="font-medium text-sm text-gray-400"> Invoice Number </p>
                      <p> INV-MJ0001 </p>
                    </div>
                    <div>
                      <p class="font-medium text-sm text-gray-400"> Fecha de emision </p>
                      <p> {{ Carbon\Carbon::now()->format('d-m-Y') }} </p>
                    </div>
                    
                    <div>
                      <a {{-- href="{{ route('admin.reporte.download',[$datos,$d2,$d3])}}" --}}  wire:click="export"  target="_blank" class="cursor-pointer inline-flex items-center text-sm font-medium text-blue-500 hover:opacity-75 "> Download PDF <svg class="ml-0.5 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                          <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                        </svg>
                      </a>

                      
                      {{-- <form action="{{ route('admin.exportexcel') }}" method="POST">
                        @csrf
                      <input type="hidden" value="{{ $da }}" name="datos">
                      <button type="submit" class="btn btn-success">Exportar Excel</button>
                      </form> --}}
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <table class="w-full divide-y divide-gray-200 text-sm">
              <thead>
                <tr>
                  <th scope="col" class="px-9 py-4 text-left font-semibold text-gray-400"> Estudiante </th>
                  <th scope="col" class="py-3 text-left font-semibold text-gray-400">  </th>
                  <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Monto </th>
                  <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Fecha de creacion </th>
                  <th scope="col" class="py-3 text-left font-semibold text-gray-400"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                
                @foreach ($datos as $item)
                    <tr>
                      <td class="px-9 py-2 whitespace-nowrap space-x-1 flex items-center">
                        
                          <p class="text-sm text-gray-400"> {{ $item->name }}</p>
                        
                      </td>
                      <td class="whitespace-nowrap text-gray-600 truncate"></td>
                      <td class="whitespace-nowrap text-gray-600 truncate"> {{ $item->value }} USD</td>
                      <td class="whitespace-nowrap text-gray-600 truncate "> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-y')}} </td>
                    </tr>
                @endforeach
                
                {{-- <tr>
                  <td class="px-9 py-5 whitespace-nowrap space-x-1 flex items-center">
                    <div>
                      <p> Jericho III (YA-4) </p>
                      <p class="text-sm text-gray-400"> Nuclear-armed ICBM </p>
                    </div>
                  </td>
                  <td class="whitespace-nowrap text-gray-600 truncate"></td>
                  <td class="whitespace-nowrap text-gray-600 truncate"> $380,000.00 </td>
                  <td class="whitespace-nowrap text-gray-600 truncate"> 0% </td>
                </tr>
                <tr>
                  <td class="px-9 py-5 whitespace-nowrap space-x-1 flex items-center">
                    <div>
                      <p> Pym Particles (Pack of 10,000) </p>
                      <p class="text-sm text-gray-400"> Redacted Description </p>
                    </div>
                  </td>
                  <td class="whitespace-nowrap text-gray-600 truncate"></td>
                  <td class="whitespace-nowrap text-gray-600 truncate"> $280,000.00 </td>
                  <td class="whitespace-nowrap text-gray-600 truncate"> 0% </td>
                </tr> --}}
              </tbody>
            </table>
            
            <div class="p-9 border-b border-gray-200">
              <div class="space-y-3">
                <div class="flex justify-between">
                  <div>
                    <p class="font-bold text-black text-lg"> Suma total: </p>
                  </div>
                  
                    <p class="font-bold text-black text-lg"> {{ $suma}} USD</p>
                
                  
                </div>
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>

  </x-slot>
  <x-slot name="footer">
      
  </x-slot>
</x-jet-dialog-modal>


