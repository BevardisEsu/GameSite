<link rel="stylesheet" href="../css/laravelAuth.css">

<div class="registerBlock">
<form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container">
        <!-- Name -->
        <div>
            <label for="name"> {{__('login.username')}}> </label>
            <input id="name" class="register" type="text" name="name" {{old('name')}} required autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="email">
            <label for="email">{{__('login.email')}} </label>
            <input id="email" type="email" name="email" value="{{old('email')}}" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="password">
            <label for="password">{{__('login.password')}} </label>

            <input id="password" class="password" type="password" name="password"
                            required autocomplete="new-password" />

        </div>

        <!-- Confirm Password -->
        <div class="confirmPassword">
            <label for="password_confirmation">{{__('confirmPassword')}} </label>

            <input id="password_confirmation" class="confirmPassword" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
        </div>
            <a class="alreadyRegister" href="{{ route('login') }}">
                {{ __('alreadyRegistered?') }}
            </a>

            <button class="registerButton">
                {{ __('login.register') }}
            </button>
        </div>
    </form>
</div>
