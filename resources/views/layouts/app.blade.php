<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
            rel="stylesheet"
        />
        <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">        <link
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
        class="d-flex flex-column">
 <header class="header">
        <nav class="navbar" id="navbar">
            <a href="/"><img
                src="https://studio.code.org/media?u=https%3A%2F%2Fanimalcrossingworld.com%2Fwp-content%2Fuploads%2F2019%2F08%2Fanimal-crossing-pocket-camp-how-to-get-wood.png"
                alt="Logo picture"
                class="logo"/></a>
            <ul class="nav-menu" id="nav-menu">
                <li class="nav-item">
                    <a class="order nav-link" id="orderButton" href="/order">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="register nav-link" id="registerButton" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="login nav-link" id="loginButton" href="/login" id="change_login">Log in</a>
                </li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer class="d-flex flex-column footer">
        <div class="d-flex flex-column">
            <p>Copyrights 2021 &copy; All rights reserved.</p>   
        </div>
    </footer>

    </body>
</html>
