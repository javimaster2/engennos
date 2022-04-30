{{-- <div class="max-w-7xl mx-auto" wire:init="loadPostt">
    
    

    @if (count($coursesscount))
    
        <div class="glider-contain">
            <ul class="gliderr ">
                @foreach ($coursesscount as $course)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '':'sm:mr-4' }}">
                        <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                            <img class="h-52 w-full object-cover" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                        
                            <div class="px-6 pt-4 pb-5 flex-1 flex flex-col ">
                                <h1 class="card-title ">{{ Str::limit($course->title,30) }}</h1>
                                <p class="text-gray-500 text-sm mb-2 mt-auto">Docente: {{ $course->teacher->name }}</p>
                                <div class="flex">
                                    <ul class="flex text-sm ">
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=1 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=2 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=3 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=4 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=5 ? 'yellow':'gray' }}-400"></i></li>
                                    </ul>
                                    <p class="text-sm text-gray-500 ml-auto"><i class="fas fa-users"></i>({{ $course->students_count }})</p>

                                </div>
                                @if ($course->price->value==0)
                                    <p class="my-2 text-green-800 font-bold">Gratis</p>
                                @else
                                    
                                    @if ($course->oferta)
                                        @if ($course->oferta->value!=0)
                                            <p class="my-2 text-gray-500 font-bold ">Precio: <span class="line-through">US$ {{ $course->price->value }}</span> </p>
                                            <p class="my-2 text-gray-500 font-bold"> Oferta:<span class=""> US$ {{ $course->oferta->value }}</span></p>
                                        @else
                                            <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
                                        @endif
                                        
                                    @else
                                        <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
                                    @endif
                                @endif
                                <a href="{{ route('courses.show',$course) }}" class="btn-block  btn btn-primary">
                                    Mas informacion
                                </a>
                            </div>
                        </article>
                        
                    </li>
                @endforeach

                </ul>
        
            <button aria-label="Previous" class="glider-prevv">«</button>
            <button aria-label="Next" class="glider-nextt">»</button>
            <div role="tablist" class="dotss"></div>
        </div>

    
         
    @else
            <div class="flex justify-center items-center">
                <div class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full" role="status">
                
                </div>
            </div>
            
    @endif


    
    
</div>
 --}}
{{-- <div class="max-w-7xl mx-auto flex"  wire:init="loadPostt">

    
        
            <div class="swiper">
            @if (count($coursesscount))
                <ul class="swiper-wrapper" style="transform: translate3d(-4784px, 0px, 0px); transition-duration: 0ms;">
                    @foreach ($coursesscount as $course)
                    <li class="swiper-slide bg-white rounded-lg shadow {{ $loop->last ? '':'sm:mr-4' }}" style="width: 368px;">
                        <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                            <figure class="aspect-w-16 aspect-h-9">
                                <img class=" w-full object-cover object-center" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                            </figure>
                            


                            <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                                <h1 class="text-lg font-semibold">
                                    <a href="">
                                        {{ Str::limit($course->title,30) }}
                                    </a>
                                </h1>
                                <p class="text-gray-500 text-sm mb-2 mt-auto">Docente: {{ Str::limit($course->teacher->name,15)}}</p>
                                <div class="flex">
                                    <ul class="flex text-sm ">
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=1 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=2 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=3 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=4 ? 'yellow':'gray' }}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=5 ? 'yellow':'gray' }}-400"></i></li>
                                    </ul>
                                    <p class="text-sm text-gray-500 ml-auto"><i class="fas fa-users"></i>({{ $course->students_count }})</p>

                                </div>
                                @if ($course->price->value==0)
                                    <p class="my-2 text-green-800 font-bold">Gratis</p>
                                @else
                                    
                                    @if ($course->oferta)
                                        @if ($course->oferta->value!=0)
                                            <p class="my-2 text-gray-500 font-bold ">Precio: <span class="line-through">US$ {{ $course->price->value }}</span> </p>
                                            <p class="my-2 text-gray-500 font-bold"> Oferta:<span class=""> US$ {{ $course->oferta->value }}</span></p>
                                        @else
                                            <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
                                        @endif
                                        
                                    @else
                                        <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
                                    @endif
                                @endif
                                <div>
                                    <a href="{{ route('courses.show',$course) }}" class="btn-block  btn btn-primary">
                                        Mas informacion
                                    </a>
                                </div>
                                
                            </div>
                        </article>
                    </li>
                    @endforeach
                
                    
                </ul>

                
                
                    <div class="swiper-button-prev"></div>
                
                <button id="js-next" class=" flex absolute top-52 h-40 w-40 z-10 right-0 justify-end" >Next page icon by Icons8</button>            
                
            
                @else
                <div class="flex justify-center items-center">
                    <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-blue-900"></div>
                 </div>
             @endif
            </div>
        

        
</div>


 --}}

{{-- 
<div class="max-w-7xl mx-auto" wire:init="loadPostt">

    @if (count($coursesscount))

        <div x-data="{swiper: null}"
        x-init="swiper = new Swiper($refs.container, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
        
            breakpoints: {
                640: {
                slidesPerView: 1,
                spaceBetween: 0,
                },
                768: {
                slidesPerView: 2,
                spaceBetween: 0,
                },
                1024: {
                slidesPerView: 4,
                spaceBetween: 10,
                },
            },
            })"
        class="relative mx-auto flex flex-row"
        >
        
        <div class="absolute inset-y-0 left-0 z-10 flex items-center">
            <button id="js-prev1"  
                    class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
            <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        
        <div class="swiper-container" x-ref="container">

            
            <ul class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($coursesscount as $course)
            <li class="swiper-slide bg-white rounded-lg shadow {{ $loop->last ? '':'sm:mr-4' }}" style="width: 368px;">
                <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                    <figure class="aspect-w-16 aspect-h-9">
                        <img class=" w-full object-cover object-center" src="{{ asset( 'storage/' . $course->image->url) }}" alt="">
                    </figure>
                    


                    <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                        <h1 class="text-lg font-semibold">
                            <a href="">
                                {{ Str::limit($course->title,30) }}
                            </a>
                        </h1>
                        <p class="text-gray-500 text-sm mb-2 mt-auto">Docente: {{ Str::limit($course->teacher->name,15)}}</p>
                        <div class="flex">
                            <ul class="flex text-sm ">
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=1 ? 'yellow':'gray' }}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=2 ? 'yellow':'gray' }}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=3 ? 'yellow':'gray' }}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=4 ? 'yellow':'gray' }}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{ $course->rating>=5 ? 'yellow':'gray' }}-400"></i></li>
                            </ul>
                            <p class="text-sm text-gray-500 ml-auto"><i class="fas fa-users"></i>({{ $course->students_count }})</p>

                        </div>
                        @if ($course->price->value==0)
                            <p class="my-2 text-green-800 font-bold">Gratis</p>
                        @else
                            
                            @if ($course->oferta)
                                @if ($course->oferta->value!=0)
                                    <p class="my-2 text-gray-500 font-bold ">Precio: <span class="line-through">US$ {{ $course->price->value }}</span> </p>
                                    <p class="my-2 text-gray-500 font-bold"> Oferta:<span class=""> US$ {{ $course->oferta->value }}</span></p>
                                @else
                                    <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
                                @endif
                                
                            @else
                                <p class="my-2 text-gray-500 font-bold">U$ {{ $course->price->value }}</p>
                            @endif
                        @endif
                        <div>
                            <a href="{{ route('courses.show',$course) }}" class="btn-block  btn btn-primary">
                                Mas informacion
                            </a>
                        </div>
                        
                    </div>
                </article>
            </li>
            @endforeach
            
            
            
            </ul>
            
        </div>
        
        <div class="absolute inset-y-0 right-0 z-10 flex items-center">
            <button id="js-next1"
                    class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
            <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        </div>
        @else
        <div class="flex justify-center">
            <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-blue-900"></div>
         </div>
     @endif
</div> --}}

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-6" wire:init="loadPostt" >

    
    @if (count($coursesscount))
        
    
         
         <div x-data="{swiper: null}"
         x-init="swiper = new Swiper($refs.container, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            grabCursor:true,
        
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                
            },
          })"
         class="relative  mx-auto flex flex-row" 
       >
 
       
         <div class="absolute inset-y-0 left-0 z-10 flex items-center">
           <button @click="swiper.slidePrev()" 
                   class="bg-gray-100  -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
             <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
           </button>
         </div>
        
         <div class="swiper-container " x-ref="container" >
           <ul class="swiper-wrapper" >
             <!-- Slides -->
             
             @foreach ($coursesscount as $course)
             <li class="swiper-slide bg-white rounded-lg border {{ $loop->last ? '':'sm:mr-4' }}" style="width: 368px;">
                <x-course-cardc :course="$course" /> 
             </li>
             @endforeach
           </ul>
         </div>
         
         <div class="absolute inset-y-0 right-0 z-10 flex items-center ">
           <button @click="swiper.slideNext()" 
                   class="bg-gray-100 -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
             <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
           </button>
         </div>
 
         
       </div>
       
       @else
         
         <p class="w-16 h-16 border-4 border-dashed rounded-full animate-spin border-blue-500 mx-auto"></p>
       @endif
 </div> 