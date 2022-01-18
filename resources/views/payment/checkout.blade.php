<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle de compra</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex">
                    <img class="h-12 w-12 object-cover" src="{{asset( 'storage/' . $course->image->url)}}" alt="">
                    <h1 class=" text-lg ml-2">{{ $course->title }}</h1>
                    @isset($coupon)
                        @if($coupon->status=="activo")
                            <p class="text-xl font-bold ml-auto line-through">US$ {{ $course->price->value }}</p>
                        @else
                            <p class="text-xl font-bold ml-auto ">US$ {{ $course->price->value }}</p>
                        @endif
                    @else
                        {{-- @if ($course->oferta)
                                @if ($course->oferta->value!=0)
                                    <p class="text-xl font-bold ml-auto ">US$ {{ $course->price->value }}</p>
                                @else
                                    <div class="justify-end">
                                            <p class="text-xl font-bold line-through">US$ {{ $course->price->value }}</p>
                                            <p class="text-xl font-bold  ">US$ {{ $course->oferta->value }}</p>  
                                    </div>
                                @endif
                         @else
                                <p class="my-2 text-gray-500 font-bold ">U$ {{ $course->price->value }}</p>    
                        @endif --}}
                        

                        @if ($course->oferta)
                            @if ($course->oferta->value!=0)
                                <div class="ml-auto">
                                    <p class="text-xl font-bold line-through">US$ {{ $course->price->value }}</p>
                                    <p class="text-xl font-bold  ">US$ {{ $course->oferta->value }}</p>  
                                </div>
                            @else
                                <p class="text-xl font-bold ml-auto ">US$ {{ $course->price->value }}</p>
                            @endif
                                        
                        @else
                            <p class="text-xl font-bold ml-auto ">US$ {{ $course->price->value }}</p>
                        @endif

                    @endisset

                    
                    
                
                </article>
                <div class="flex justify-end mt-2 mb-2">
                    <div class="block">
                        @isset($coupon)

                            @if ($coupon->status=="activo")
                                <p class="text-green-500 font-bold">Descuento:  {{ $coupon->valor }} %</p>
                                <p class="font-bold">Total: {{round($course->price->value-($coupon->valor/100*$course->price->value),2) }}</p>    
                            @endif
                        @endisset
                    </div>
                    
                    
                </div>
                {{-- <div class="flex justify-end mt-2 mb-2">
                    <form action="{{ route('payment.pay',$course,$coupon)}}" method="POST">
                        @csrf
                        @isset($coupon)
                            @foreach ($coupon as $item)
                            <input type="hidden" id="idcupon" name="idcupon" value="{{ $coupon }}" disabled>
                            
                            @endforeach
                        @endisset
                        
                        <button type="submit" class="btn btn-success  ">Comprar este curso</button>
                    </form>
                </div> --}}
                
                @isset($coupon)
                    @if ($coupon->status=="activo")
                        <div class="flex justify-end mt-2 mb-2">
                            <a href="{{ route('payment.pay',[$course,$coupon]) }}" class="btn btn-primary">Comprar Curso</a>
                        </div>
                    @else
                        <div class="flex justify-end mt-2 mb-2">
                            <a href="{{ route('payment.payy',$course) }}" class="btn btn-primary">Comprar Curso</a>
                            
                        </div>
                    @endif
                        
                    
                @else
                <div class="flex justify-end mt-2 mb-2">
                    <a href="{{ route('payment.payy',$course) }}" class="btn btn-primary">Comprar Curso</a>
                   
                </div>
                @endisset
                
               
                
               
                
                <hr>
                <p class="text-sm mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores dicta perspiciatis vitae optio mollitia quae nulla ut officiis! Consectetur voluptate earum, necessitatibus vero nihil optio neque consequuntur quod dignissimos quidem?<a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
            </div>
        </div>

        
        
    </div>
</x-app-layout>