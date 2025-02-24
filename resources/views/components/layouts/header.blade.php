<header class="md:h-15v bg-header
flex flex-row justify-center justify-between px-3 items-center
">
    <img width="150px" class="max-h-full p-5" src="{{asset ("images/logo.png")}}" alt="logo">
    <h1 class="hidden  font-cocobubble md:block text-gray-700 text-7xl">{{__("Gestion de instituto")}}</h1>


    {{--    Para móviles menú hamburguesa--}}
    <div class="md:hidden ">
        <input type="checkbox" name="" id="menu-toogle" class="peer hidden">

        <label class="text-3xl" for="menu-toogle">
            &#9776
        </label>

        <div class="absolute hidden right-0 m-2 w-32 p-2 space-y-2 bg-gray-200 rounded-md peer-checked:block">
            @auth
                <li class="px-4 py-2 text-gray-700">{{ auth()->user()->name }}</li>
                <li>
                    <button class="btn btn-glass w-full">Logout</button>
                </li>

            @endauth
            @guest
                <button class="btn btn-glass w-full">Login</button></li>
                <button class="btn btn-glass w-full">Register</button>
            @endguest

        </div>
        <x-layouts.lang />
    </div>
    <div class="hidden md:block">
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
    <x-layouts.lang />

</header>
