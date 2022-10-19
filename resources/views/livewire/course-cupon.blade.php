



<div>
    
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-12  pt-5 ">
        
        
        <div class="order-2 lg:col-span-2 lg:order-1">
            
            <div class="text-gray-700 mb-4">
                <h2 class="md:text-4xl font-semibold text-3xl mb-2 ">{{ $course->title }}</h2> 
                <p class="text-gray-700">{{ $course->subtitle }}</p>
            </div>

            
        
            <div class="embed-responsive">
                {!!$course->iframe!!}
            </div>
                
            

           {{--  <div class="aspect-w-16 aspect-h-9">
                <video id="videoplay"  width="100%" height="300px" disablepictureinpicture controls controlsList="nodownload" poster="https://yumagic.com/wp-content/uploads/2018/11/edicion-video-programas.jpg" >
                    <source src="{{ $course->intro }}" type="video/mp4">    
                </video>
            </div> --}}
                
            <section class=" py-7 flex items-center justify-between " >
                
                <div class="flex items-center">
                    <img class=" h-8 w-8 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url}}" alt="{{ $course->teacher->name }}">
                    <div class="ml-4">
                        <h1 class="text-gray-500 font-bold text-sm">Docente. {{ $course->teacher->name }}</h1>
                    </div>
                </div>
               

                <div class="flex text-gray-700">
                    <p><i class="fas fa-star text-yellow-300"></i> Calificacion: {{ $course->rating }}</p>
                </div>
                
            </section>

            
            
            <hr class="mb-4">
            <section class="bg-white w-full ">
                <div class=" mx-auto px-8">
                    <div class="table  w-full">
                        <div class="block sm:table-cell">
                            <p class="uppercase text-grey text-sm sm:mb-6 text-gray-600">Categoria</p>
                            <ul class="list-reset text-xs mb-6">
                                <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                                    <p class=" text-gray-600 font-semibold">{{ $course->category->name }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="block sm:table-cell">
                            <p class="uppercase text-grey text-sm sm:mb-6 text-gray-600">Personas Inscritas</p>
                            <ul class="list-reset text-xs mb-6">
                                <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                                    <p>{{ $course->students->count() }}</p>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="block sm:table-cell">
                            <p class="uppercase text-grey text-sm sm:mb-6 text-gray-600">Última actualizacion</p>
                            <ul class="list-reset text-xs mb-6">
                                <li class="mt-2 inline-block mr-2 sm:block sm:mr-0">
                                    <p>{{ $course->updated_at->diffForHumans() }}</p>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            
            <hr class="mb-4 -mt-2">


            <section class="border  mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2 text-gray-600">¿Que aprenderé?</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-600 text-base"><i class="fas fa-check text-yellow-600 mr-2"></i> {{ $goal->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            
            <section class="mb-12">
                <h1 class="font-bold text-gray-600 text-2xl mb-2">Temario</h1>
                @foreach ($course->sections as $section)
                    <article class="mb-4 " 
                    @if ($loop->first)
                        x-data="{ open:true }"
                    @else
                        x-data="{ open:false }"
                    @endif>
                        <header class="border rounded-lg border-gray-300 px-4 py-2 cursor-pointer flex items-center space-x-2" x-on:click="open=!open">
                            <template x-if="!open" >
                                <i class=" fas fa-plus text-lg ml-2"></i> 
                            </template>
                            <template x-if="open">
                                <i class=" fas fa-minus text-lg ml-2"></i> 
                            </template>
                            <h1 class="font-bold text-lg text-gray-500">{{ $section->name }}</h1>
                        </header>
                        <div class="bg-white py-2 px-4 rounded-lg" x-show.transition="open"
                        >
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base "><i class="fas fa-file-video mr-2 text-gray-400 "></i> {{ $lesson->name }}</li>
                                @endforeach
                            </ul>

                        </div>
                    </article>
                @endforeach
            </section>

            
            <section class="mb-8">
                <h1 class="font-bold text-2xl text-gray-600">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-base text-gray-700">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>

            
            <section>
                <h1 class="font-bold text-2xl text-gray-600">Descripcion</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>

            
            <div id="recor"></div>

            
        </div>
        
        <div class="order-1 lg:order-2 ">
            
            <section class="card border mb-4 border-gray-200 sticky top-28">
                
                <figure class="relative">
                    @if ($course->image)
                <img class="h-60   lg:w-full object-cover w-screen" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                    @else
                        <img class="h-60 w-full object-cover" src="https://images.pexels.com/photos/4218864/pexels-photo-4218864.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                @endif
                </figure>
                <div class="card-body">
                   {{--  <div class="flex items-center">
                        <img class=" h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url}}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="text-gray-500 font-bold text-lg">Docente. {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 tex-sm font-bold">{{ '@'. Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div> --}}
                    
                        
                        
                   
                    @can('enrolled', $course)
                    <a href="{{ route('courses.status',$course) }}" class="btn btn-primary btn-block mt-4">Continuar con el curso</a>
                    @else
                            @if ($course->price->value==0.00)
                            <p class="text-2xl font-bold text-green-800 mt-3 mb-2">Gratis</p>
                                <form action="{{ route('courses.enrolled',$course) }}" method="POST">
                                    @csrf   
                                    <button class="btn btn-success btn-block mt-4" type="submit">Llevar este curso</button>
                                </form>
                            @else
                                
                                @if ($course->oferta)
                                   
                                    @if ($course->oferta->value!=0)
                                    <p class="bg-red-500 text-white w-20 rounded-sm text-center">Oferta</p>
                                        <p class="text-xl font-bold text-gray-500 mt-3 mb-2 ">Precio: <span class="line-through">US$ {{ $course->price->value }}</span> </p>
                                        <p class="text-xl font-bold text-gray-500 mt-3 mb-2">Oferta: US$ {{ $course->oferta->value }}</p>
                                    @else
                                        <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                                    @endif
                                @else
                                    <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                                @endif

                                @if ($coupon!="")
                                    <a href="{{ route('payment.checkout',[$course,$coupon]) }}" class="btn btn-success btn-block ">Comprar este curso</a>
                                    
                                @else
                                    <a href="{{ route('payment.checkoutt',$course) }}" class="btn btn-success btn-block ">Comprar este curso</a>
                                @endif
                                
                                
                            @endif

                            
                          
                            
                            
                            
                            {{-- @if (session()->has('livewire-alert'))
                            <script> 
                                window.onload = event => {
                                    flashAlert(
                                        @json(session('livewire-alert'))
                                    ) 
                                }
                            </script>
                        @endif --}}
                            
                            
                        
                    @endcan
                    <div class="mt-4 text-gray-600">
                        <p class="font-bold text-lg mb-1" >Detalles del curso</p>
                        <ul class="space-y-1">
                            <li><i class="fas fa-folder-open inline-block w-6"></i> Recursos descargables {{ $this->lessoncount }}</li>
                            <li><i class="fas fa-users inline-block w-6"></i> Matriculados {{ $course->students->count() }}</li>
                            <li><i class="fas fa-infinity inline-block w-6"></i> Acceso de por vida</li>
                        </ul>
                    </div>
                   


                    
                    <div class="mt-4 mb-4 text-center" x-data="{open:false}" x-cloak>
                        <a x-on:click="open=!open" class="font-bold cursor-pointer ">Aplicar cupón</a>
                        
                        <form wire:submit.prevent="aply" method="POST"  x-show="open">
                            @csrf
                            <input type="text" placeholder="Ingrese el codigo" name="codigo" wire:model="codecupon" class="border-gray-500 rounded" required>
                            <button type="submit" class="btn btn-danger" >Aplicar</button>
    
                        </form>
                        @error('codecupon')
                                    <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    


                    @if(session()->has('message'))
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 mt-4 relative" role="alert" x-data="{show: true}" x-show="show">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{{ session('message') }} {{ $valorcupon }} % <br>en su compra</p>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
                            <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="flex items-center  bg-blue-500 text-white text-sm font-bold px-4 py-5 relative " role="alert" x-data="{show: true}" x-show="show">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{{ session('error') }}</p> 
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-0" @click="show = false">
                            <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                    @endif

                   
                    
                    
                    

                    {{-- <div x-data="{open:true}" class="mt-6 text-center">
                        <a x-on:click="open=!open" class="font-bold cursor-pointer ">Aplicar cupón</a>
                        <div x-show="open" class="">
                            
                                @csrf
                                <input type="text" placeholder="Ingrese el codigo" name="codigo" id="codecupon" class="border-black" required>
                                <button type="button" class="bg-red-500 p-2 font-bold text-white rounded-sm" id="button-aplicar" >Aplicar</button>
                            </form>
                            @error('codigo')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div> --}}
                    
                   

                </div>

            </section>
            {{-- <aside class="hidden md:block"> 
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        
                        <img class="h-32 w-40 object-cover" src="{{ asset( 'storage/' . $course->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1><a class="font-bold text-gray-500 mb-3" href="{{ route('courses.show',$similar ) }}">{{ Str::limit($similar->title,30)}}</a> </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{ $similar->teacher->name }}</p>
                            </div>

                            <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{ $similar->rating }}</p>
                        </div>
                    </article>
                @endforeach
            </aside> --}}
        </div>

    </div>
</div>



<script>
    $(document).ready(function(){
        /* $("#button-aplicar").click(function(){

            var codigo=$("#codecupon").val();
            var token="{{ csrf_token() }}";
            var data={_token:token,codigo:codigo}
            console.log(data);
            $.ajax({
                url:"{{ route('courses.applycupon',$course) }}",
                data:data,
                type:'POST',
            }).done(function(respuesta){
                if(respuesta=="Error" || respuesta=="Codigo no valido" || respuesta=="cupon no valido")
                {
                   $("#error").show();
                   $("#id_cupon").val("");
                   //document.getElementById('premio').style.display="block";
                   
                }else{
                    var arreglo=JSON.parse(respuesta);
                    
                    arreglo.forEach(element => {
                        console.log(element.valor);
                        if(element.tipo=="porcentaje")
                        {
                            $("#textcupon").text("Ustede tiene un descuento de: "+element.valor+" % en su compra");
                        }else{
                            $("#textcupon").text("Ustede tendra un descuento de: "+element.valor+" dolares");
                        }

                        
                        @this.idcupon=element.id;
                        
                        
                    });
                    
                }
               
                
            
            });


        }); */

        

      


        /* $("#codecupon").keyup(function()
        {
            $("#error").hide();
            $("#premio").hide();
            $("#datosCupon").hide();
        }) */

       

    });

    function recorrer()
        {
            metaa = document.getElementById('recor');
            @foreach ($course->sections as $section)
               metaa.innerHTML=$section;
            @endforeach
        }
    
</script>