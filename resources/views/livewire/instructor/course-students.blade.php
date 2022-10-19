<div>
   

    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>
  

    <x-table-responsive>
        <div class="px-6 py-4 ">
            <input wire:model="search"  class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"  placeholder="Ingresar nombre de un curso...">
            
        </div>

        @if ($students->count())
            {{-- <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre  
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                  </th>
                  
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200" >
                  @foreach ($students as $student)
                  
                  
                      
                        <tr>
                            <td  class="px-6 py-4 whitespace-nowrap" >
                                <div class="flex items-center cursor-pointer" >
                                    <div class="flex-shrink-0 h-10 w-10">
                                        
                                        <img id="picture" class="rounded-full h-10 w-10 object-cover object-center" src="{{ $student->profile_photo_url }}" alt="">
                                        
                                    </div>
                                    <div>
                                        <div class="cursor-pointer text-sm font-medium text-gray-900">
                                            {{$student->name}}
                                        </div>
                                    </div>
                                </div>
                                
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$student->email}}</div>
                            </td>
                            
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                            
                            </td>
                            <div x-show="open">
                              {{-- @livewire('instructor.aprobar-resource',['student'=>$student], key($student->id)) 
                              @livewire('instructor.aprobar-resource',['student'  => $student,'course' =>  $course])
                            </div>
                          
                        </tr>


                        
                @endforeach


              </tbody>
            </table> --}}
            @foreach ($students as $student)
                  <article class="card mb-6" x-data="{open:false}">
                    <div class="card-body bg-gray-100 border border-l-1">
                      <header class="flex justify-between items-center">
                        <h1 x-on:click="open=!open" class="cursor-pointer">{{ $student->name }}</h1>
                      </header>

                      <div x-show="open" class="card">
                        @livewire('instructor.aprobar-resource',['student'  => $student,'course' =>  $course])
                      </div>
                    </div>

                  </article>
                  @endforeach
            
            <div class="px-6 py-4">
                {{$students->links()}}
            </div>

        @else
        <div class="px-6 py-4 text-center">
          No hay ningun registro coincidente
        </div>
        @endif
    </x-table-responsive>

    
</div>
