<x-app-layout>
   {{--  <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card> --}}
    <div class="container mx-auto">
        
        <div class="flex justify-center px-1 my-24">
            <!-- Row -->
            <div class="w-full xl:w-5/6  lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-5/6 bg-gray-100 border-r rounded hidden lg:block lg:w-7/12 rounded-l-lg" >
                <img src="{{ asset('LOGO ACC INGENIERIA.png') }}" alt="" class="w-4/6 h-6/5 mx-auto my-20">
            </div>
                <!-- Col -->
                <div class="w-full lg:w-9/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <div class="">
                
                        
                        <div class="flex justify-center space-x-8 ">
                            <a href="{{ url('login/facebook') }}" ><i class="fab fa-facebook text-5xl text-blue-600"></i></a>
                            <a href="{{ url('login/google') }}" class="" ><i class="fab fa-google text-5xl text-red-500"></i></a>
                        </div>
                        
                        <div class="my-2 flex flex-row justify-center mb-6">
                            <span class="absolute bg-white px-4">or</span>
                            <div
                              class="w-full bg-gray-200 mt-3" style="height: 1px"
                            ></div>
                          </div>
                    </div>
                    
                    <h3 class="pt-4 text-2xl text-center">Crear Cuenta</h3>
                    <x-jet-validation-errors class="mb-4" />
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 {{-- md:flex md:justify-between --}}">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="name" value="{{ __('Name') }}" >
                                    Nombre completo
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="name"
                                    type="text"
                                    placeholder="Ingrese el nombre"
                                    name="name" :value="old('name')" required autofocus autocomplete="name"
                                />
                                
                            </div>
                            {{-- <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                                    Last Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="lastName"
                                    type="text"
                                    placeholder="Last Name"
                                />
                            </div> --}}
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email" value="{{ __('Email') }}">
                                Correo Electronico
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                placeholder="Ingrese el Correo "
                                name="email" :value="old('email')" required
                            />
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password" value="{{ __('Password') }}">
                                    Contraseña
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password"
                                    type="password"
                                    placeholder="******************"
                                    name="password" required autocomplete="new-password"
                                />
                                <p class="text-xs italic text-red-500">Por favor, ingrese su contraseña</p>
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation" value="{{ __('Confirm Password') }}">
                                    Confirmar Contraseña
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="c_password"
                                    type="password"
                                    placeholder="******************"
                                    name="password_confirmation" required autocomplete="new-password"
                                />
                            </div>
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Registrar cuenta
                            </button>
                            
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="#"
                            >
                                ¿Olvidó su contraseña?
                            </a>
                        </div>
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('login') }}"
                            >
                                {{-- Already have an account? Login! --}}
                                ¿Ya tienes una cuenta? ¡Iniciar sesión!
                            </a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
