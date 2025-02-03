<header class="h-15v bg-header
flex flex-row justify-between px-3 items-center
">
    <img width="150px" class="max-h-full p-5" src="{{asset ("images/logo.png")}}" alt="logo">
    <h1 class="text-gray-700 text-7xl">Gestión de instituto</h1>
    <div>
        @auth
            {{auth()->user()->name}}
            <form action="{{route("logout")}}" method=post>
                @csrf
                <button type="submit" class="btn btn-glass">Logout</button>
            </form>
        @endauth
        @guest

            <a href="{{route("login")}}" class="btn btn-glass">Login</a>
            <a href="{{route("register")}}" class="btn btn-glass">Register</a>
        @endguest
    </div>
</header>
