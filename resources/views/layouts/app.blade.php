<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous"
        />
        <script defer src="/js/app.js"></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    </head>
    <body
        class="d-flex flex-column bg-dark"
        style="
            background-image: url('https://images.squarespace-cdn.com/content/v1/5bf305b49772aece186011cc/1562344040843-W1Z9Z9NO1CL8ICKBY3S9/firewood.jpg?format=1000w');
            background-repeat: no-repeat;
            background-size: cover;
        "
    >
        <header class="d-flex flex-row bg-danger">
            <img
                src="https://studio.code.org/media?u=https%3A%2F%2Fanimalcrossingworld.com%2Fwp-content%2Fuploads%2F2019%2F08%2Fanimal-crossing-pocket-camp-how-to-get-wood.png"
                alt="Logo picture"
                class="logo"
            />
            <div class="navbar d-flex">
                <a class="register" id="registerButton" href="#register"
                    >Register</a
                >
                <a
                    class="login"
                    id="loginButton"
                    href="#login"
                    id="change_login"
                    >Login</a
                >
            </div>
        </header>
        @yield('content')
        <footer class="d-flex flex-column bg-danger">
            <div class="d-flex flex-column">
                <a class="faq">FAQ</a>
                <a class="terms">Terms</a>
                <a class="about">About</a>
            </div>
        </footer>
    </body>
</html>
