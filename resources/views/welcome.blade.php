<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            background: rgb(10, 25, 30);
            color: white;
            font-size: larger;
        }
        nav {
            width: 100vw;
            display: flex;
        }
        ul {
            display: flex;
            gap: 20px;
            padding-top: 20px;
            padding-right: 20px;
        }
        a {
            text-decoration: none;
            color: whitesmoke;
        }
        a:hover {
            color: lightgray;
        }
        .section {
            margin: 50px 0;
            display: flex;
            width: 100vw;
            flex-direction: column;
            align-items: center;
        }
        .section > h2 {
            margin: 20px;
        }
        .section > div {
            display: flex;
            gap: 50px;
            flex-wrap: wrap;
        }
        .section a {
            color: lightskyblue;
        }
    </style>
</head>
<body lang="ar" dir="rtl">

    <nav>
        <ul>
            @auth

                <a href="{{ route('logout') }}">Logout</a>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                
            @else

               <a href="{{ route('login') }}">Login</a> 
               <a href="{{ route('register') }}">Register</a>

            @endauth
        </ul>
    </nav>

    <div class="section">

        <h2>Categories</h2>

        <div>

            @foreach ($categories as $c)
            <p>{{ $c->title }} <a href="">View</a> </p>
            @endforeach

        </div>

    </div>

    <div class="section">

        <h2>Versions</h2>

        <div>

            @foreach ($versions as $v)
            <p>{{ $v->category->title }} {{ $v->title }} <a href="{{ $v->file }}" target="_blank" rel="noopener noreferrer">View</a> </p>
            @endforeach

        </div>

    </div>

</body>
</html>