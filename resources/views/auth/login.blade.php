<x-guest-layout>

   
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
    {{-- <div class="min-h-full  flex items-center justify-center py-18 px-4 sm:px-6 lg:px-8 mb-20 mt-20">
        <div class="max-w-md w-full space-y-8">
          <div>
            
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
              {{ __('Iniciar sesión') }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
              
              
            </p>
          </div>
         
          <x-jet-validation-errors class="mb-4 " />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            
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
        </div>
    </div> --}}

    <style>
      /*remove custom style*/
        .circles{
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          overflow: hidden;
      }
        .circles li{
          position: absolute;
          display: block;
          list-style: none;
          width: 20px;
          height: 20px;
          background: rgba(255, 255, 255, 0.2);
          animation: animate 25s linear infinite;
          bottom: -150px;  
      }
      .circles li:nth-child(1){
          left: 25%;
          width: 80px;
          height: 80px;
          animation-delay: 0s;
      }
       
       
      .circles li:nth-child(2){
          left: 10%;
          width: 20px;
          height: 20px;
          animation-delay: 2s;
          animation-duration: 12s;
      }
       
      .circles li:nth-child(3){
          left: 70%;
          width: 20px;
          height: 20px;
          animation-delay: 4s;
      }
       
      .circles li:nth-child(4){
          left: 40%;
          width: 60px;
          height: 60px;
          animation-delay: 0s;
          animation-duration: 18s;
      }
       
      .circles li:nth-child(5){
          left: 65%;
          width: 20px;
          height: 20px;
          animation-delay: 0s;
      }
       
      .circles li:nth-child(6){
          left: 75%;
          width: 110px;
          height: 110px;
          animation-delay: 3s;
      }
       
      .circles li:nth-child(7){
          left: 35%;
          width: 150px;
          height: 150px;
          animation-delay: 7s;
      }
       
      .circles li:nth-child(8){
          left: 50%;
          width: 25px;
          height: 25px;
          animation-delay: 15s;
          animation-duration: 45s;
      }
       
      .circles li:nth-child(9){
          left: 20%;
          width: 15px;
          height: 15px;
          animation-delay: 2s;
          animation-duration: 35s;
      }
       
      .circles li:nth-child(10){
          left: 85%;
          width: 150px;
          height: 150px;
          animation-delay: 0s;
          animation-duration: 11s;
      }
        @keyframes animate {
       
          0%{
              transform: translateY(0) rotate(0deg);
              opacity: 1;
              border-radius: 0;
          }
       
          100%{
              transform: translateY(-1000px) rotate(720deg);
              opacity: 0;
              border-radius: 50%;
          }
       
      }
      </style>
    <div class="relative max-w-7xl mx-auto mt-20 flex ">
          <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <div class="sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
              style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
              <div class="absolute bg-gradient-to-b from-indigo-600 to-blue-500 opacity-75 inset-0 z-0"></div>
              <div class="w-full  max-w-md z-10">
                <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Engennos</div>
                <div class="sm:text-sm xl:text-md text-gray-200 font-normal"> Ingresa a engennos.com para escoger un sin numero de cursos en la palma de tu mano,
                recuerda que para nosotros eres muy especial. ¡Que esperas! Ven y crece con nosotros
                </div>
              </div>
              <!---remove custom style-->
             <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
         </ul>
            </div>
            <div class="md:flex md:items-center md:justify-center  sm:w-auto md:h-full w-full xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white">
              <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                  <h2 class="mt-6 text-3xl font-bold text-gray-900">
                    Bienvenido
                  </h2>
                  <p class="mt-2 text-sm text-gray-500">Por favor ingresa a tu cuenta</p>
                </div>
                <div class="flex flex-row justify-center items-center space-x-3">
                  <a href="{{ url('login/facebook') }}" target="_blank"
                    class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg   bg-blue-900 hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                      class="w-4 h-4"
                      src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNS45OTcgMy45ODVoMi4xOTF2LTMuODE2Yy0uMzc4LS4wNTItMS42NzgtLjE2OS0zLjE5Mi0uMTY5LTMuMTU5IDAtNS4zMjMgMS45ODctNS4zMjMgNS42Mzl2My4zNjFoLTMuNDg2djQuMjY2aDMuNDg2djEwLjczNGg0LjI3NHYtMTAuNzMzaDMuMzQ1bC41MzEtNC4yNjZoLTMuODc3di0yLjkzOWMuMDAxLTEuMjMzLjMzMy0yLjA3NyAyLjA1MS0yLjA3N3oiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+"></span>
                  <a href="{{ url('login/google') }}" class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-gray-200 hover:shadow-lg cursor-pointer transition ease-in duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6" viewBox="0 0 48 48"><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/></svg>
                  </a>
                </div>
                <div class="flex items-center justify-center space-x-2">
                  <span class="h-px w-16 bg-gray-200"></span>
                  <span class="text-gray-300 font-normal">o continua con</span>
                  <span class="h-px w-16 bg-gray-200"></span>
                </div>

                <x-jet-validation-errors class="mb-4" />

              @if (session('status'))
                  <div class="mb-4 font-medium text-sm text-red-600">
                      {{ session('status') }}
                  </div>
              @endif

                
                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                  @csrf
                  <input type="hidden" name="remember" value="true">
                  <div class="relative">
                    <div class="absolute right-3 mt-8"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide" for="email" >Email</label>
                    <input
                      class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" id="email"
                      name="email" type="email" autocomplete="email"  :value="old('email')" required autofocus placeholder="email@gmail.com" >
                  </div>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <div class="mt-8 content-center">
                    <label class="ml-3 text-sm font-bold text-gray-700 tracking-wide" for="password">
                      Contraseña
                    </label>
                    <input
                      class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" id="password"
                      name="password" type="password" autocomplete="current-password" required placeholder="********" >
                  </div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <input id="remember_me" name="remember_me" type="checkbox"
                        class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                      <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Recordarme
                      </label>
                    </div>
                    <div class="text-sm">

                      @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}" class="text-indigo-400 hover:text-blue-500">
                          ¿Se te olvido la contraseña?
                        </a>
                      @endif
                      
                    </div>
                  </div>
                  <div>
                    <button type="submit"
                      class="w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                      Iniciar Sesion
                    </button>
                  </div>
                  <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                    <span>¿No tienes una cuenta?</span>
                    <a href="{{ route('register') }}"
                      class="text-indigo-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Registrarse</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
    </div>
  
</x-guest-layout>





