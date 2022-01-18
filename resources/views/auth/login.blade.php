<x-app-layout>

   
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4 " />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Electronico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center"> 
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Iniciar sesion') }}
                </x-jet-button>
            </div>
        </form>

        <div class="">
            <p class="text-center ">-o-</p>
            <div class="flex justify-center space-x-4 ">
                <a href="{{ url('login/facebook') }}" class="btn btn-primary ">Iniciar con facebook</a>
                <a href="{{ url('login/google') }}" class="btn btn-danger">Iniciar con google</a>
            </div>
            
        </div>
    </x-jet-authentication-card> --}}
    <div class="min-h-full  flex items-center justify-center py-18 px-4 sm:px-6 lg:px-8 mb-20 mt-20">
        <div class="max-w-md w-full space-y-8">
          <div>
            {{-- <img class="mx-auto h-28 w-auto" src="{{ asset('LOGO ACC INGENIERIA.png') }}" alt="Workflow"> --}}
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
              {{ __('Iniciar sesión') }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
              
              {{-- <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                start your 14-day free trial
              </a> --}}
            </p>
          </div>
          {{-- validacion error --}}
          <x-jet-validation-errors class="mb-4 " />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            {{-- inicia formulario --}}
          <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm ">
              <div class="">
                <label for="email" value="{{ __('Correo Electronico') }}" class="sr-only">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email"  :value="old('email')" required autofocus class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Correo Electronico">
              </div>
              <div class="mt-8">
                <label for="password" value="{{ __('Contraseña') }}" class="sr-only">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Contraseña">
              </div>
            </div>
      
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox"  class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                  Remember me
                </label>

                
              </div>
      
              <div class="text-sm">
                

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Forgot your password?
                  </a>
                @endif
              </div>
            </div>
      
            <div>
              <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <svg class="h-5 w-5 text-white group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                  </svg>
                </span>
                Iniciar Sesion
              </button>
            </div>
            <div class="">
                
                <div class="my-2 flex flex-row justify-center mb-6">
                    <span class="absolute bg-white px-4">or</span>
                    <div
                      class="w-full bg-gray-200 mt-3" style="height: 1px"
                    ></div>
                  </div>
                <div class="flex justify-center space-x-8 ">
                    <a href="{{ url('login/facebook') }}" ><i class="fab fa-facebook text-5xl text-blue-600"></i></a>
                    <a href="{{ url('login/google') }}" class="" ><i class="fab fa-google text-5xl text-red-500"></i></a>
                </div>
                
            </div>
          </form>
         {{--  terminana formulario --}}
        </div>
    </div>
</x-app-layout>





