


<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">

           

            {{-- fin --}}

            {{-- <iframe class="iframe" id="myframe" src="https://player.vimeo.com/video/499560327" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe> --}}
                @if ($current->platform_id==1)
                    
                    <div class="embed-responsive">
                        {!!$current->iframe!!}
                    </div>
                        
                   
                @else
                    {{-- <div class="">
                        <video  id="videoplay" width="100%" height="300px" disablepictureinpicture controls controlsList="nodownload"  >
                            {!!$current->iframe!!}"
                        </video>    
                    </div> --}}

                    <video id="videoplay" src="{!!$current->url!!}" width="100%" height="300px" disablepictureinpicture controls controlsList="nodownload" >
                    </video>
                @endif

                
                <div id="meta"></div>
                
                    
                
               
                {{-- <video controls width="360" height="240">
                    <source src="{!!$current->url!!}" type='video/mp4'/>
                 </video>
               --}}

                 
            <h1 class="text-3xl text-gray-600 font-bold mt-4">{{ $current->name }}</h1>
            
            @if ($current->description)
                <div class="text-gray-600">
                    {{ $current->description->name }}
                    {{ $current->id }}
                </div>
            @endif

            <div class="flex justify-between mt-4">
                <div {{-- wire:click="completed" --}} class="flex items-center ">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-600 cursor-pointer"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600 cursor-pointer"></i>
                    @endif
                    <p class="text-sm ml-2 cursor-pointer">Marcar esta unidad como culminada</p>
                </div>

                 @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg "></i>
                        <p class="text-sm ml-2">Descargar Recursos</p>
                    </div>
                 @endif
                 
            </div>
            

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>
                    @endif
                   
                    
                        @if ($this->next)
                            <a wire:click="changeLesson({{ $this->next }})"  class="ml-auto cursor-pointer">Tema siguiente</a>
                        @endif
                    
                </div>
               
            </div>
            
        {{--  
             <p>Indice::{{ $this->index  }}</p>
            <p>Previous:@if ($this->previous)
                {{ $this->previous->id }}
            @endif</p>
            <p>Next @if ($this->next)
                {{ $this->next->id }}
            @endif</p>--}}
            @livewire('course-reviews', ['course' => $course])
        </div>
        

        
        <div class="col-span-1 order-1 lg:order-2 ">
            <div class="card">
                <div class="card-body ">
                    <h1 class="text-gray-800 text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>
                    <div class="flex items-center">
                        <figure>
                            <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{ $course->teacher->profile_photo_url }}" alt="">
                        </figure>
                        <div>
                            <p>{{ $course->teacher->name }}</p>
                            <a class="text-blue-500 text-sm" href="">{{'@'. Str::slug($course->teacher->name,'') }}</a>
                        </div>
                    </div>
                    {{-- barra de navegacion --}}
                    <p class="text-gray-600 text-sm mt-2">{{ $this->advance. '%'}} completado</p>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-400">
                          <div style="width:{{ $this->advance. '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-bluelogo transition-all duration-300"></div>
                        </div>
                      </div>
                      {{-- lista de lecciones --}}
                    <ul>
                        @foreach ($course->sections as $section)

                        
                     

                        <li class="text-gray-600 mb-4" @if ($loop->first)
                            x-data="{ open:true }"
                        @else
                            x-data="{ open:false }"
                        @endif>
                                
                            <button class="w-full flex justify-between font-bold text-left focus:outline-none" x-on:click="open = !open">
                                {{ $section->name }}
                                <i class="mt-1 fas fa-angle-down" :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></i>
                            </button>

                            <ul x-show="open"  >
                                @foreach ($section->lessons as $lesson)

                                    <li class="flex"  x-show.transition.in.duration.800ms="open" >
                                        <div>
                                            @if ($lesson->completed)
                                            
                                                @if ($current->id==$lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-bluelogo rounded-full mr-2 mt-1"></span>
                                                    @else
                                                    <span class="inline-block w-4 h-4 bg-bluelogo rounded-full mr-2 mt-1"></span>
                                                @endif
                                                   
                                            @else
                                                @if ($current->id==$lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-blue-300 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-blue-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                                    
                                            @endif
                                        </div>
                                        
                                        <a class="cursor-pointer" wire:clicK="changeLesson({{ $lesson }})" >{{ $lesson->name }}</a>
                                        
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                           
                        @endforeach
                    </ul>
    
                    @foreach ($this->state as $stato)
                        @switch($stato->state)
                            @case("Pending")
                                @if ($this->advance==100)
                                <form id="terminado" action="{{route('coursestatus.complete',$course)}}" method="POST">
                                    @csrf   
                                    <input type="hidden" value="{{ $this->advance }}" name="valorc" id="valorc">
                                    <button type="submit" class="btn btn-danger"> Solicitar trabajo</button>
                                </form>
                            
                            @endif
                            @break
                            @case("Wait")
                                <div class="card text-gray-500 mr-3 leading-4 text-center">
                                    <div class="card-body">
                                        Este curso se encuentra en espera del trabajo final
                                    </div>
                                </div>
                                
                                @break
                            @case("Active")
                                <div class="card text-green-600">
                                    <div class="card-body">
                                        @if ($course->resource)
                                        <div class="flex items-center text-gray-600 cursor-pointer" wire:click="downloadcourse">
                                                <i class="fas fa-download text-lg "></i>
                                                <p class="text-sm ml-2">Descargar Recursos del curso</p>
                                            </div>
                                        @else
                                            <p>Este curso no tiene ningun recurso</p>
                                        @endif
                                    </div>
                                </div>
                                
                                @break
                        
                            @default
                                
                        @endswitch
                    @endforeach
    
                    {{-- @if ($this->advance==100)
                            <form id="terminado" action="{{route('coursestatus.complete',$course)}}" method="POST">
                                @csrf   
                                <input type="hidden" value="{{ $this->advance }}" name="valorc" id="valorc">
                                <button type="submit" class="btn btn-danger"> Solicitar trabajo</button>
                            </form>
                            
    
                    @else
                        <div class="card text-gray-500 mr-3 leading-4">
                            <div class="card-body">
                                Este curso aun no se ha completado
                            </div>
                        </div>
                    @endif --}}
                    
                </div>
            </div>
            
            
        
        </div>

        
    </div>

    <div class="bg-gray-100 h-screen w-screen flex justify-center">
        <div class="mr-8">
          
            <h1 class="font-medium max-w-xl mx-auto pt-10 pb-4">Smooth Accordion</h1>
            <div class="bg-white max-w-xl mx-auto border border-gray-200" x-data="{selected:1}">
              <ul class="shadow-box">
                              
                    <li class="relative border-b border-gray-200">
            
                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                            <div class="flex items-center justify-between">
                                <span>
                                    Should I use reCAPTCHA v2 or v3?					</span>
                                <span class="ico-plus"></span>
                            </div>
                                        </button>
            
                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <p>reCAPTCHA v2 is not going away! We will continue to fully support and improve security and usability for v2.</p>
                            </div>
                        </div>
            
                    </li>
      
                </ul>
          </div>
        </div>
        
        
    </div>

</div>

    

<script>



        /* var aud = document.getElementById("videoplay");
        document.querySelector('video').addEventListener('ended',function(){
        window.livewire.emit('completed');

        @if ($this->next)
        window.livewire.emit("changeLesson", @json($this->next));
        alert(@json($this->next->id))
        
        aud.load();
        @endif
                    
            }, 
            false
            ); */ 
    
           

       /*  var aud = document.getElementById("videoplay");
        aud.onended = function() {
            window.livewire.emit('completed');
            $('#videoplay').load();
           //Livewire.emit("changeLesson", @json($this->next));
           //Livewire.emit('changeLesson',@json($current));
           @if($this->next)
           {
            window.livewire.emit("changeLesson", @json($this->next));
           }    
           @endif
        }; */
      

        /* var myVideoPlayer = document.getElementById('videoplay'),
           meta = document.getElementById('meta');

        myVideoPlayer.addEventListener('loadedmetadata', function () {
            var duration = myVideoPlayer.duration;
            //meta.innerHTML = "Duration is " + duration.toFixed(0) + " seconds."
            output = document.getElementById('meta');

            // horas = Math.trunc(duration/3600);
            //minutos = Math.trunc(duration/60);
            //output.innerHTML = "<br>" + horas + " horas, " + minutos + " minutos y " + duration.toFixed(0) + " segundos";
            const segundos = (Math.round(duration % 0x3C)).toString();
            const horas    = (Math.floor(duration / 0xE10)).toString();
            const minutos  = (Math.floor(duration / 0x3C ) % 0x3C).toString();
                        
            output.innerHTML = `<br>${horas} horas, ${minutos} minutos y ${segundos} segundos.`;

        }); */

       

       
        
        
        
        

   @if ($this->next)
  /*  document.getElementById('videoplay').addEventListener('ended', function(e) {
        
        
    window.livewire.emit('completed');
       //  window.livewire.emit("changeLesson", @json($this->next));
       
        $('#videoplay').load();
        
    
   

    }); */

    var iframe = document.querySelector('iframe');

        var player = new Vimeo.Player(iframe);

        player.on('ended', function() {
            window.livewire.emit('completed');
            player.load();

        });
        
    
   @endif




   
    
</script>