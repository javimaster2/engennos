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
            <div class="flex justify-between w-full  mb-2 mt-4 px-4 lg:px-7">
                    <h3 class="text-2xl font-bold font-sans">Welcome</h3>
                    <a @click="open=false" class="cursor-pointer text-black  text-2xl">X</a>
            </div>
            <div class="flex items-center justify-center">
                <div class="w-full max-w-sm">
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
                </div>
                
            </div>
        </div>
       
    </div>

</div>