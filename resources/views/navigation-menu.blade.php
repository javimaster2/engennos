@php
    $nav_links=[
        [
            'name'=>'Inicio',
            'route'=>route('home'),
            'active'=>request()->routeIs('home')
        ],
        [
            'name'=>'Cursos',
            'route'=>route('courses.index'),
            'active'=>request()->routeIs('courses.*')//
        ],
        
    ];
@endphp



<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow fixed  w-full " style="z-index: 900" {{-- :class="{ 'scrolled': !view.atTopOfPage }" --}}>
    <!-- Primary Navigation Menu -->
    <div class="container h-20">
        <div class="flex justify-between h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <x-jet-application-logo class="block h-9 w-auto" />
                </a>
            </div>
            <div class="flex items-center ">
                <!-- Logo -->
                

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex  lg:mr-10">
                    @foreach ($nav_links as $nav_link)
                        <x-jet-nav-link  href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-nav-link>
                    @endforeach
                </div>
                

                <div class="hidden sm:flex sm:items-center sm:ml-6 mt-5">
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                            {{ Auth::user()->currentTeam->name }}
    
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>
    
                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>
    
                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>
    
                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan
    
                                        <div class="border-t border-gray-100"></div>
    
                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>
    
                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif
                       
                    
    
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative ">
    
                        @auth
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}
    
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>
    
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Administrar cuenta') }}
                                    </div>
    
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Perfil') }}
                                    </x-jet-dropdown-link>
    
                                        <x-jet-dropdown-link href="{{ route('courses.mecourses') }}">
                                            {{ __('Mis Cursos') }}
                                        </x-jet-dropdown-link>
    
                                    @can('Leer Cursos')
                                        <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}">
                                            {{ __('Instructor') }}
                                        </x-jet-dropdown-link>
                                    @endcan
    
                                    @can('Ver Dashboard')
                                        <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                            {{ __('Administrador') }}
                                        </x-jet-dropdown-link>
                                    @endcan
                                    
                                        
    
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif
    
                                    <div class="border-t border-gray-100"></div>
    
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
    
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Salir') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        @else
                            {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" >Login</a> --}}
                            {{-- <button type="button" class="focus:outline-none openModal text-white text-sm py-2.5 px-5 mt-5 mx-5  rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">Open Modal</button> --}}
                            {{-- <div x-data="{ showModal : false }">
                                <!-- Button -->
                                <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Open Modal</button>
                                <!-- Modal Background -->
                                @include('partials.login')
                            </div> --}}
                            {{-- <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                                <div @click="open = ! open">
                                    <button type="button" class="pt-0.5 text-gray-600 hover:text-gray-700">
                                                                <i class="far fa-user-circle text-xl md:text-2xl inline-block pt-1"></i>
                                                            </button>
                                </div>
                            
                                <div x-show="open" 
                                x-transition:enter="transition ease-out duration-200" 
                                x-transition:enter-start="transform opacity-0 scale-95" 
                                x-transition:enter-end="transform opacity-100 scale-100" 
                                x-transition:leave="transition ease-in duration-75" 
                                x-transition:leave-start="transform opacity-100 scale-100" 
                                x-transition:leave-end="transform opacity-0 scale-95" 
                                class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0 " style="display: none;" @click="open = false">
                                    <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('login') }}">Iniciar sesión</a>
                            
                                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('register') }}">Registrarse</a>
                                    </div>
                                </div>
                            </div> --}}
    
                            <div class="relative" x-data="{ open: false }">
                                <!-- @click toggles the open state from x-data by assigning !open -->
                                <button type="button" @click="open = !open" :class="{ 'font-bold text-indigo-500': open === true }" class="focus:outline-none inline-block bg-gray-200 rounded-lg text-lg px-4 py-2 leading-none  text-gray-600 border-white hover:border-transparent hover:text-teal-500 hover:bg-white">
                                    <template x-if="!open">
    
                                        <i class="fas fa-user-plus"></i> 
                                    </template>
                                    <template x-if="open">
                                        <i class="fas fa-user-times"></i>
                                    </template>
                                </button>
                                <!-- x-show will show the element when open from x-data is true and hide it otherwise -->
                                <!-- @click.away is what happens when you click outside of the element -->
                                <!-- all the x-transition styles are added to the element at different points when the element becomes visible/invisible -->
                                <ul x-cloak x-show="open" @click.away="open = false" class="border rounded-md border-gray-200 text-gray-600 text-sm bg-white shadow-md py-1 absolute w-32 right-0 mr-2"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                >
                                  <li><a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-200 focus:outline-none focus:bg-gray-100 transition" href="{{ route('login') }}">Iniciar sesión</a></li>
                                  <li><a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-200 focus:outline-none focus:bg-gray-100 transition" href="{{ route('register') }}">Registrarse</a></li>
                                </ul>
                              </div>
                            
                            
                            
                        @endauth
                        
                    </div>
                </div>
            </div>
            

            

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($nav_links as $nav_link)
            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                {{ $nav_link['name'] }}
            </x-jet-responsive-nav-link>
        @endforeach
        </div>
         <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>
                    @can('Leer Cursos')
                        <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                            {{ __('Instructor') }}
                        </x-jet-responsive-nav-link>
                    @endcan
                    @can('Ver Dashboard')
                        <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                            {{ __('Administrador') }}
                        </x-jet-responsive-nav-link>
                    @endcan
                    

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        @else
        <div class="py-1 border-t border-gray-200 ">
            <x-jet-responsive-nav-link href="{{ route('login')}}" :active="request()->routeIs('login')">
                Login
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                Register
            </x-jet-responsive-nav-link>
        </div>
        @endauth
    </div> --}}

    <div class="absolute min-h-screen sm:flex md:hidden" >

        {{-- <div class="bg-gray-700 text-gray-100 flex justify-between md:hidden">
            <a href="" class="block p-4-text-white font-bold">Dev</a>
            <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                  </svg>
            </button>
        </div> --}}
        <div  class="sidebar bg-white border-t border-r text-blue-600 w-64 space-y-6 px-2 py-7 absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-out md:relative md:translate-x-0">
            
            <p class="text-gray-600 text-center font-extrabold">Aprende | Crece | Construye</p>
            
            <nav>
                        <div class="pt-2 pb-3 space-y-1 ">
                            @foreach ($nav_links as $nav_link)
                            <x-jet-responsive-nav-link class="rounded " href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-jet-responsive-nav-link>
                        @endforeach
                        </div>

                            @auth
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="flex items-center px-4">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div class="flex-shrink-0 mr-3">
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                                @endif

                                <div>
                                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                    {{-- <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
                                </div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <!-- Account Management -->
                                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                    {{ __('Profile') }}
                                </x-jet-responsive-nav-link>
                                @can('Leer Cursos')
                                    <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                                        {{ __('Instructor') }}
                                    </x-jet-responsive-nav-link>
                                @endcan
                                @can('Ver Dashboard')
                                    <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                                        {{ __('Administrador') }}
                                    </x-jet-responsive-nav-link>
                                @endcan
                                

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                        {{ __('API Tokens') }}
                                    </x-jet-responsive-nav-link>
                                @endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>

                                <!-- Team Management -->
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                    <div class="border-t border-gray-200"></div>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                        {{ __('Team Settings') }}
                                    </x-jet-responsive-nav-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                            {{ __('Create New Team') }}
                                        </x-jet-responsive-nav-link>
                                    @endcan

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @else
                    <div class="py-1 border-t border-gray-200 ">
                        <x-jet-responsive-nav-link class="rounded" href="{{ route('login')}}" :active="request()->routeIs('login')">
                            Login
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link class="rounded" href="{{ route('register') }}" :active="request()->routeIs('register')">
                            Register
                        </x-jet-responsive-nav-link>
                    </div>
                    @endauth
            </nav>
        </div>
        <div>

        </div>
    </div>
</nav>


