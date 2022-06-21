{{--<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}

<x-guest-layout>
    <x-jet-validation-errors class="mb-4"/>
    <form action="{{route('password.update')}}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
          <div class="account-container">
            <h3 class="head-login">Đặt lại mật khẩu</h3>
              <h4 for="uname"><b>Email</b></h4>
              <input type="text" placeholder="Enter Email" name="email" value="{{$request->email}}" required autofocus>
                <br>
                <h4 for="psw"><b>Mật khẩu</b></h4>
                <input type="password" placeholder="Nhập mật khẩu" name="password" required autocomplete="new-password">
                  <h4 for="confirmpsw"><b>Xác nhận lại mật khẩu</b></h4>
                  <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation" required autocomplete="new-password">
              <button type="submit">Đặt lại mật khẩu</button>
              </div>
            </div>
</x-guest-layout>