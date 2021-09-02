<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle de compra</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{asset( 'storage/' . $course->image->url)}}" alt="">
                    <h1 class=" text-lg ml-2">{{ $course->title }}</h1>
                    <p class="text-xl font-bold ml-auto">US$ {{ $course->price->value }}</p>
                </article>
                <div class="flex justify-end mt-2 mb-2">
                    <a href="{{ route('payment.pay',$course) }}" class="btn btn-primary">Comprar Curso</a>
                </div>
                <hr>
                <p class="text-sm mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores dicta perspiciatis vitae optio mollitia quae nulla ut officiis! Consectetur voluptate earum, necessitatibus vero nihil optio neque consequuntur quod dignissimos quidem?<a href="" class="text-red-500 font-bold">Terminos y Condiciones</a></p>
            </div>
        </div>


        <p>{{ Auth::user()->id }}</p>
    </div>
</x-app-layout>