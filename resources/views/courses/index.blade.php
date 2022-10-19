<x-app-layout>
    {{-- <section class=" bg-cover relative -my-3 mb-auto"  style="background-image:url({{ asset('img/home/PORTADAH.png') }})">
        <div class="capa-gradient absolute w-full h-full"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-96 py-28 relative">
            <div class="w-full md:w-3/4 lg:1/2  ">
                <h1 class="text-white font-bold text-4xl">HC LEARNING</h1>
                <h2 class="text-white font-bold text-4xl">Aprende|Crece|Construye</h2>
                <p class="text-white font-bold text-xl mt-2 mb-4">Si deseas ampliar tus conocimientos EduVirtual es la solucion.</p>
                
                <!-- component search-->
               @livewire('search')
            </div>
        </div>
    </section> --}}

    @livewire('courses-index')
    

    
    <script>
        function inputSearch() {
            return {
                iconReset: false,
                search: '',
            }
        }
    </script>

</x-app-layout>