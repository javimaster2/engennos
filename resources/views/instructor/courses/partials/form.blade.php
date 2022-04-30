<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title', null, ['class'=>'focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded'.($errors->has('title')?' border-red-600':'')]) !!}
    @error('title')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly'=>'readonly','class'=>'focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded'.($errors->has('slug')?' border-red-600':'')]) !!}
    @error('slug')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class'=>'focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded'.($errors->has('subtitle')?' border-red-600':'')]) !!}
    @error('subtitle')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description', 'Descripcion del curso') !!}
    {!! Form::textarea('description', null, ['class'=>'focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded'.($errors->has('description')?' border-red-600':'')]) !!}
    @error('description')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>
<div class="grid grid-cols-2 gap-1">
    <div class="">
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class'=> 'focus:ring-2 focus:ring-gray-200 focus:border-transparent border border-gray-300 rounded w-full mt-1']) !!}
        
    </div>
    <div class=" ">
        {!! Form::label('price_id', 'Precio Normal') !!}
        {!! Form::select('price_id', $prices, null, ['class'=> ' focus:ring-2 focus:ring-gray-200 focus:border-transparent border border-gray-300 rounded w-full mt-1']) !!}
        
    </div>
    {{-- <div class=" ">
        {!! Form::label('oferta_id', 'Oferta') !!}
        {!! Form::select('oferta_id', $ofertas, null, ['class'=> ' focus:ring-2 focus:ring-gray-200 focus:border-transparent border border-gray-300 rounded w-full mt-1']) !!}
    </div> --}}
</div>
<h1 class="text-2xl font-bold mt-8 mb-2">Video Introductorio</h1>
<div class="mb-4">
    {!! Form::label('intro', 'Video Introductorio') !!}
    {!! Form::url('intro', null, ['class'=>'focus:ring-2 focus:ring-gray-200 focus:border-transparent w-full border border-gray-300 rounded'.($errors->has('intro')?' border-red-600':'')]) !!}
    @error('intro')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-1">
    <figure>
        @isset($course->image)
            <!--<img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">-->
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{asset( 'storage/' . $course->image->url)}}" alt="">
        @else
        <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/4218864/pexels-photo-4218864.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        @endisset
    </figure>
    <div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus illo ab nostrum consectetur, a quibusdam ipsa voluptatem iusto tempora labore aut in, iure nam animi dolor expedita minus optio.</p>
        {!! Form::file('file', ['class'=>'form-input w-full rounded border border-gray-400  mt-2'.($errors->has('file')?' border-red-600':''),'id'=>'file','accept'=>'image/*']) !!}
        @error('file')
        <strong class="text-red-600 text-xs">{{$message}}</strong>
    @enderror
    </div>
</div>