<x-app-layout>
    {{-- <section class="capa-gradient2  py-12 mb-12 " >
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure class="relative">
                <!--<img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">-->
                <img class="h-60 w-full object-cover" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>  
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                <p><i class="far fa-star"></i> Calificacion: {{ $course->rating }}</p>
            </div>
        </div>
    </section> --}}

    @livewire('course-cupon',['similar'=>$similares,'course' =>  $course])
 {{--   <div>
        <div class="container grid grid-cols-1 lg:grid-cols-3 gap-12 pt-5">
            
            
            <div class="order-2 lg:col-span-2 lg:order-1">
                
                <section class="capa-gradient2  py-12 mb-12 " >
                    <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <figure class="relative">
                            
                            <img class="h-60 w-full object-cover" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                        </figure>
                        <div class="text-white">
                            <h1 class="text-4xl">{{ $course->title }}</h1>  
                            <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                            <p class="mb-2"><i class="fas fa-"></i> Categoria: {{ $course->category->name }}</p>
                            <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                            <p><i class="far fa-star"></i> Calificacion: {{ $course->rating }}</p>
                        </div>
                    </div>
                </section>
    
              
                <section class="card border border-gray-200 mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-2xl mb-2 ">Lo que aprenderas</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                            @foreach ($course->goals as $goal)
                                <li class="text-gray-700 text-base"><i class="fas fa-check text-yellow-600 mr-2"></i> {{ $goal->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
    
                
                <section class="mb-12">
                    <h1 class="font-bold text-gray-800 text-3xl mb-2">Temario</h1>
                    @foreach ($course->sections as $section)
                        <article class="mb-4 shadow" 
                        @if ($loop->first)
                            x-data="{ open:true }"
                        @else
                            x-data="{ open:false }"
                        @endif>
                            <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200 " x-on:click="open=!open">
                                <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}<i class=" fas fa-angle-down text-lg ml-5"></i></h1>
                            </header>
                            <div class="bg-white py-2 px-4" x-show="open">
                                <ul class="grid grid-cols-1 gap-2">
                                    @foreach ($section->lessons as $lesson)
                                        <li class="text-gray-700 text-base "><i class="fas fa-check-circle mr-2 text-bluelogo"></i> {{ $lesson->name }}</li>
                                    @endforeach
                                </ul>
    
                            </div>
                        </article>
                    @endforeach
                </section>
    
               
                <section class="mb-8">
                    <h1 class="font-bold text-3xl text-gray-800">Requisitos</h1>
                    <ul class="list-disc list-inside">
                        @foreach ($course->requirements as $requirement)
                            <li class="text-base text-gray-700">{{ $requirement->name }}</li>
                        @endforeach
                    </ul>
                </section>
    
               
                <section>
                    <h1 class="font-bold text-3xl text-gray-800">Descripcion</h1>
                    <div class="text-gray-700 text-base">
                        {!! $course->description !!}
                    </div>
                </section>
    
                @livewire('course-reviews', ['course' => $course])
            </div>
            
            <div class="order-1 xl:order-2 xl:fixed xl:mr-28  xl:right-40 z-0">
                <section class="card border mb-4 border-gray-200">
                    <div class="card-body">
                        <div class="flex items-center">
                            <img class=" h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url}}" alt="{{ $course->teacher->name }}">
                            <div class="ml-4">
                                <h1 class="text-gray-500 font-bold text-lg">Docente. {{ $course->teacher->name }}</h1>
                                <a class="text-blue-400 tex-sm font-bold">{{ '@'. Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>
                        @can('enrolled', $course)
                        <a href="{{ route('courses.status',$course) }}" class="btn btn-primary btn-block mt-4">Continuar con el curso</a>
                        @else
                                @if ($course->price->value==0)
                                <p class="text-2xl font-bold text-green-800 mt-3 mb-2">Gratis</p>
                                    <form action="{{ route('courses.enrolled',$course) }}" method="POST">
                                        @csrf   
                                        <button class="btn btn-success btn-block mt-4" type="submit">Llevar este curso</button>
                                    </form>
                                @else
                                    <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                                     <form action="{{ route('payment.checkout',$course) }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="id_cupon" name="id-cupon">
                                        <button type="submit" class="btn btn-success btn-block ">Comprar este curso</button>
                                    </form> 

                                    <a href="{{ route('payment.checkout',$course) }}" class="btn btn-success btn-block ">Comprar este curso</a>
                                    
                                @endif
    
                               
                                
                                <h2 id="error" class="text-red-500 text-center mt-4" style="display: none" >Cupon no valido</h2>
                                
                              
    
                                
                                
    
                                
                            
                        @endcan
    
                        <div x-data="{open:true}" class="mt-6 text-center">
                            <a x-on:click="open=!open" class="font-bold cursor-pointer ">Aplicar cupón</a>
                            <div x-show="open" class="">
                                <form action="{{ route('courses.applycupon',$course) }}" method="POST">
                                    @csrf
                                    <input type="text" placeholder="Ingrese el codigo" name="codigo" id="codecupon" class="border-black" required >
                                    <button type="button" class="bg-red-500 p-2 font-bold text-white rounded-sm" id="button-aplicar" >Aplicar</button>
                                </form>
                                @error('codigo')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class=" hidden" id="datosCupon">
                            <h2 id="textcupon" class="text-green-500 " ></h2>
                        </div>

                        
                       
    
                    </div>
    
                </section>
                <aside class="hidden md:block">
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
                </aside>
            </div>
    
        </div>
</div> --}}
     
    
</x-app-layout>

<script>
    $(document).ready(function(){
        $("#button-aplicar").click(function(){

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

                        $("#datosCupon").show();
                        $("#id_cupon").val(element.id);
                        
                        
                    });
                    
                }
               
                
            
            });


        });
        $("#codecupon").keyup(function()
        {
            $("#error").hide();
            $("#premio").hide();
            $("#datosCupon").hide();
        })

       

    });

   
    
</script>