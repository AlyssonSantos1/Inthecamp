<!-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    @if($errors->any)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{  $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    @session('message')
    <div style="
        padding: 15px; 
        margin: 10px 0; 
        border: 1px solid #f5c2c7; 
        border-radius: 5px; 
        background-color: #f8d7da; 
        color: #842029;
        font-family: Arial, sans-serif;
        display: flex;
        align-items: center;
    ">
        <strong>{{ $value }}</strong>
    </div>

    @endsession

    <form action="{{ route('sucess') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <br><br>

        <label for="email">E-mail</label>
        <input type="text" name="email" required>

        <button type="submit">Login</button>
        
    </form>
</body>
</html>
