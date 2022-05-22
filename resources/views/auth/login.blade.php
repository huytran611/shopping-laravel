{{--<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}
<x-guest-layout>
        <x-jet-validation-errors class="mb-4"/>
        <form action="{{route('login')}}" method="POST">
            @csrf
                
                <div class="account-container">
                <h3 class="head-login">Đăng nhập</h3>
                  <label for="uname"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="email" :value="old('email')" required autofocus>
                    <br>
                  <label for="psw"><b>Mật khẩu</b></label>
                  <input type="password" placeholder="*******************" name="password" required autocomplete="current-password">
                      
                  <button type="submit">Login</button>
                  <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                  </label>
                  <div class="">
                    <a href="{{route('register')}}"><button type="button" class="cancelbtn">Đăng ký tài khoản</button></a>
                    <span class="psw">Forgot <a href="{{route('password.request')}}">password?</a></span>
                  </div>
                </div>
</x-guest-layout>
