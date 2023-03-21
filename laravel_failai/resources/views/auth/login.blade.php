
<head>

    <link rel="stylesheet" href="../css/laravelAuth.css">
</head>

<body>
<div class="block">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="container">
        <!-- Email Address -->
        <div class="Email">
            <label for="email">{{__('login.email')}}</label>
            <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="password">
            <label for="password"> {{__('login.password')}} </label>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="remember">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember" class="rememberMe"> <a>{{ __('login.rememberMe') }}</a>
            </label>
        </div>
            <button class="loginButton">
                {{ __('login.logIn') }}
            </button>

        </div>

    </form>
</div>
</body>
