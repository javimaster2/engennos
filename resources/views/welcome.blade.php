<x-app-layout>
    <section class="bg-cover relative"  style="background-image:url({{ asset('img/home/PORTADAH.png') }})">
        <div class="capa-gradient absolute w-full h-full"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-96 py-28 relative">
            <div class="w-full md:w-3/4 lg:1/2  ">
                <h1 class="text-white font-bold text-4xl">HC LEARNING</h1>
                <h2 class="text-white font-bold text-4xl">Aprende|Crece|Construye</h2>
                <p class="text-white font-bold text-xl mt-2 mb-4">En EduVirtual encontraras Diseños en infraesctructura civil</p>
                <!-- component search-->
               @livewire('search')
            </div>
        </div>
    </section>

    <section class="portada bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">No sabes que curso llevar</h1>
        <p class="text-center text-white">Ingrese al catalago de cursos</p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}" class="transition-colors border-b border-t border-white  text-white hover:bg-white hover:text-black font-bold py-2 px-4 rounded">
                Cursos HC-LEARNING
            </a>
        </div>
        
    </section >
        
    <section class="my-24 mb-3">
        <h1 class="text-center text-3xl text-gray-600">Ultimos Cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Trabajos de ingenieria civil</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" /> 
            @endforeach
        </div>
    </section>

    <style>
        .portada{
            animation:movimiento 30s infinite linear alternate;
        }
        @keyframes movimiento{
            from{
                background-position: bottom left;
            }to{
                background-position: top right; 
            }
        }
        .capa-gradient{
            background: -webkit-linear-gradient(left,black,#0672d0);
            opacity:0.5 ;
        }
    </style>

    <section class="portada bg-cover relative w-full h-60" style="background-image: url({{ asset('img/home/inge.jpg') }})">
        <div class="capa-gradient absolute w-full h-full"></div>
            <div class="container-detalles  relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 ">
                <div class="detalles w-full relative text md:w-3/4 lg:1/2">
                    <h1 class="text-white  text-4xl font-bold relative">Descripcion de portada</h1>
                    <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nihil id natus adipisci odit sit amet quas, dignissimos laudantium ex. Beatae minus nulla quae soluta, atque quod iste assumenda dolorum.</p>
                
                </div>
            </div>
        

    </section>

    

</x-app-layout>
