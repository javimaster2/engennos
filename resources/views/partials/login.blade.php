


<div 
    x-cloak
    x-show.transition.duration.500ms="open"
    x-init="()=>{setTimeOut(()=>{open=true},3000);}"
 class="fixed inset-0 z-10 bg-gray-600 bg-opacity-70 flex items-center justify-center px-4 md:px-0">
    <div class="flex justify-center bg-white shadow-2xl rounded-lg border-2 border-gray-400 h-3/6 w-2/4" @click.away="open=false">
        
        <div class="sm:w-1/2 lg:w-2/5 bg-gray-200 h-full hidden lg:flex flex-auto items-center justify-center p-10 overflow-hidden  text-white bg-no-repeat bg-cover relative">
            <figure class="rounded-full ">
                <img src="{{ asset('LOGOHC-LEARNING.png') }}" alt="">
                
            </figure>
        </div>
        <div class="w-full sm:w-auto md:w-3/5">
            <div class=" flex justify-between mb-4 mt-4 px-4 lg:px-7">
                    <h3 class="text-2xl font-bold font-sans">Iniciar Sesion</h3>
                    <a @click="open=false" class="cursor-pointer text-black  text-2xl">X</a>
            </div>
            <div class="flex justify-center items-center mt-10 ">
                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                    
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                    
                                <div>
                                    <x-jet-label  for="email" value="{{ __('Correo Electronico') }}" />
                                    <x-jet-input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                    
                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                </div>
                    
                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center"> 
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-black">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                    
                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-black hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                    
                                    <x-jet-button class="ml-4 btn btn-success">
                                        {{ __('Log in') }}
                                    </x-jet-button>
                                </div>
                            </form>
                            
                            
            </div>
            <div class="">
                <p class="text-center ">-o-</p>
                <div class="flex justify-center space-x-4 ">
                    <a href="{{ url('login/facebook') }}" class="btn btn-primary ">Iniciar sesion con facebok</a>
                    <a href="{{ url('login/google') }}" class="btn btn-danger">Iniciar sesion con google</a>
                </div>
                
            </div>
        </div>
       
    </div>

</div>