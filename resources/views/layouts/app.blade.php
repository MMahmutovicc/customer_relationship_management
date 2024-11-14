<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <title>Glovo Customer Relationship Management</title>
</head>
<body>

    <div class="header">
    </div>
    <div id="col-1">

        <ul class="nav flex-column">
            @guest
                
                <li class="nav-item">
                    <a class="menu" href="{{ route('login') }}">Sign in</a>
                </li>

                <li class="nav-item">
                    <a class="menu" href="{{ route('signup') }}">Sign up</a>
                </li>

            @endguest

            @auth
                <li class="nav-item">
                    <form class="m-0" action="{{ route('signout') }}" method="post">
                        @csrf
                        <button class="menu" type="submit" id="signoutbutton">Sign out</button>
                    </form>
                </li>
                @if (auth()->user()->utype == 'Customer')
                    @if (!auth()->user()->review)
                        <li class="nav-item">
                            <a class="menu" href="{{ route('review.add') }}">Leave A Review!</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="menu" href="{{ route('user.review', auth()->user()->review) }}">Your review</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="menu" href="">Ask A Question!</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="menu" href="{{ route('review.list') }}">See Reviews</a>
                    </li>
                @endif

            @endauth
        
            <li class="nav-item">
                <a class="menu" href="">FAQ</a>
            </li>
            
        </ul>

    </div>

    <div class="body" id="col-2">

        @yield('content')

    </div>

</body>
</html>