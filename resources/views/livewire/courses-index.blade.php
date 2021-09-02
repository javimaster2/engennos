<div>
    
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button wire:click="resetFilters" class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 focus:outline-none"> <i class=" fas fa-home text-lg mr-2"></i> Todos los cursos</button>

                <!-- component -->

                <!-- Dropdown -->
                <div class="relative" x-data="{open:false}">
                    <button class="block h-12 px-4 text-gray-700  rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open=true">
                        <i class=" fas fa-tags text-lg mr-2"></i>
                        Categoria
                        <i class=" fas fa-angle-down text-lg ml-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute left-0 w-64 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open=false">   
                        @foreach ($categories as $category)
                            <a wire:click="$set('category_id',{{ $category->id }})" x-on:click="open=false" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-bluee hover:text-white cursor-pointer">{{ $category->name }}</a>
                        @endforeach
                        
                    </div>
                <!-- // Dropdown Body -->
                </div>

        </div>
    </div>

    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course" /> 
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{ $courses->links() }}
    </div>
   
</div>
