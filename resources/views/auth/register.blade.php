{{--
<x-guest-layout>
    <x-jet-authentication-card>
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
    </x-jet-authentication-card>
</x-guest-layout>
--}}
<x-guest-layout>
    <div>
        <x-jet-validation-errors class="mb-4" />
        <form action="{{route('register')}}" method="POST">
            @csrf
                <div class="account-container">
                    <h3 class="head-login">Đăng ký tài khoản</h3>
                    <h4 for="fname"><b>Tên bạn</b></h4>
                    <input type="text" placeholder="Nhập tên của bạn" :value="name" name="name" required autofocus autocomplete="name">
                    
                  <h4 for="email"><b>Email</b></h4>
                  <input type="text" placeholder="Nhập Email" name="email" :value="email" required>
        
                  <h4 for="psw"><b>Mật khẩu</b></h4>
                  <input type="password" placeholder="Nhập mật khẩu" name="password" required autocomplete="new-password">
        
                    <h4 for="confirmpsw"><b>Xác nhận lại mật khẩu</b></h4>
                    <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation" required autocomplete="new-password">
        
                      
                  <button type="submit">Đăng ký</button>
                  <div class="">
                    <a href="{{route('login')}}"><button type="button" class="cancelbtn">Đăng nhập</button></a>
                    <span class="psw"><a href="#"> Forgot password?</a></span>
                  </div>
                </div>
          </form>
    </div>    
</x-guest-layout>

