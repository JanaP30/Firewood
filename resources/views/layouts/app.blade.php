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
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
        </script>
        <script defer src="dist/js/app.js"></script>
        <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    </head>
    <body
        class="d-flex flex-column"
        
    >
        <header class="d-flex flex-row header">
            <a href="/"><img
                src="https://studio.code.org/media?u=https%3A%2F%2Fanimalcrossingworld.com%2Fwp-content%2Fuploads%2F2019%2F08%2Fanimal-crossing-pocket-camp-how-to-get-wood.png"
                alt="Logo picture"
                class="logo"
            /></a>
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
        <footer class="d-flex flex-column footer">
            <div class="d-flex flex-column">
                <p>Copyrights 2021 &copy; All rights reserved.</p>
            </div>
        </footer>
    </body>
</html>
