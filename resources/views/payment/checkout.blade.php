<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
            <div class="lg:col-span-3">
                <article class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4">
                        <div class="flex">
                            <div class="w-48">
                                <div class="aspect-w-16 aspect-h-9">
                                    <img class="rounded w-full h-full object-cover object-center" src="{{asset( 'storage/' . $course->image->url)}}" alt="">
                                </div>

                            </div>
                            <div class="ml-2">
                                <h1 class=" text-lg font-semibold">{{ $course->title }}</h1>
                                <p class="text-gray-500">{{ $course->teacher->name }}</p>
                            </div>
                            <div class="ml-auto pl-4 flex-shrink-0">
                                @isset($coupon)
                                    @if($coupon->status=="activo")
                                        <p class="text-lg font-bold ml-auto line-through"> {{ $course->price->value }} USD</p>
                                    @else
                                        <p class="text-lg font-bold ml-auto ">{{ $course->price->value }} USD</p>
                                    @endif

                                    @isset($coupon)

                                        @if ($coupon->status=="activo")
                                            <p class="text-green-500 font-bold">Descuento:  {{ $coupon->valor }} %</p>
                                            <p class="font-bold">Total: {{round($course->price->value-($coupon->valor/100*$course->price->value),2) }}</p>    
                                        @endif
                                    @endisset
                                @else

                                    @if ($course->oferta)
                                        @if ($course->oferta->value!=0)
                                            <div class="ml-auto">
                                                <p class="text-lg font-bold line-through">{{ $course->price->value }} USD</p>
                                                <p class="text-lg font-bold  ">{{ $course->oferta->value }} USD</p>  
                                            </div>
                                        @else
                                            <p class="text-lg font-bold ml-auto "> {{ $course->price->value }} USD</p>
                                        @endif
                                                    
                                    @else
                                        <p class="text-lg font-bold ml-auto "> {{ $course->price->value }} USD</p>
                                    @endif

                                @endisset
                            </div>

                            

                        </div>
                        <hr class="mt-4 mb-2">

                    </div>
                </article>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4">
                        <h1 class="text-2xl font-semibold mb-2">Detalles</h1>
                        
                        <p class="flex justify-between">Precio original<span>{{ $course->price->value }} USD</span></p>
                        @isset($coupon)

                            @if ($coupon->status=="activo")
                                
                                <p class="flex justify-between">Descuento<span>{{round(($coupon->valor/100*$course->price->value),2) }}.00 USD</span></p>  
                                <p class="flex justify-between">Total<span>{{round($course->price->value-($coupon->valor/100*$course->price->value),2) }} USD</span></p> 
                                
                            @endif
                        @endisset
                        
                        

                        @if ($course->oferta)
                            @if ($course->oferta->value!=0)
                                <p class="flex justify-between">Descuento<span>{{round(($course->oferta->value-$course->price->value),2) }}.00 USD</span></p> 
                                <p class="flex justify-between mb-1 font-semibold">Total: <span>{{ $course->oferta->value }}</span></p>
                            @endif
                                                    
                        @else
                        <p class="flex justify-between mb-1 font-semibold">Total: <span>{{ $course->price->value }}</span></p>
                        @endif
                        
                        
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

                        <div id="paypal-button-container"></div>
                    </div>

                </div>
            </div>

        </div>
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

@push('script')

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Call your server to set up the transaction
        createOrder: function(data, actions) {
            return fetch('api/paypal/order/create/', {
                method: 'post',
                body:JSON.stringify({"value":productvalue})
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                return orderData.id;
            });
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                method: 'post'
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                // Three cases to handle:
                //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                //   (2) Other non-recoverable errors -> Show a failure message
                //   (3) Successful transaction -> Show confirmation or thank you

                // This example reads a v2/checkout/orders capture response, propagated from the server
                // You could use a different API or structure for your 'orderData'
                var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                    return actions.restart(); // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                }

                if (errorDetail) {
                    var msg = 'Sorry, your transaction could not be processed.';
                    if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                    if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                    return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                }

                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }

    }).render('#paypal-button-container');
</script>
@endpush

    
