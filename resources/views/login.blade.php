<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->

<link rel="stylesheet" href="./styles/logInStyle.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    {{-- <h1>This is Log In page</h1> --}}

    {{-- <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="id" placeholder="Enter user ID">
        <br>
        <input type="password" name="password" placeholder="Enter password">
        <br>
        <input type="submit">
    </form> --}}

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h2><em>Sign in to your account</em></h2>


            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="id" placeholder="Login ID" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
                <input type="submit"  class="fadeIn fourth mt-3" value="Log In"> <br>
            </form>

        </div>
    </div>
</body>

</html>
