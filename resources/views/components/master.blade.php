<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="container mx-auto ">

        <nav class="flex justify-between p-6 items-center bg-white shadow-md mt-3">
            <div class="text-xl font-bold">
                <a href="{{ route('home') }}">Logo</a>
            </div>
            <div>
                @auth
                    <ul class="flex space-x-6 text-lg">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-500">Home</a></li>
                        <li><a href="{{ route('user.index') }}" class="hover:text-blue-500">Users</a></li>
                        <li><a href="{{ route('categories.index') }}" class="hover:text-blue-500">Categories</a></li>
                    </ul>
                    @endauth
                </div>
                <div class="flex space-x-6">
                @auth
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="text-lg hover:text-blue-500">Logout</button>
                </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="text-lg hover:text-blue-500">Login</a>
                    <a href="{{ route('register') }}" class="text-lg hover:text-blue-500">Register</a>
                @endguest
            </div>
        </nav>

        <main class="container mx-auto  bg-gray-200 py-4 ">
            {{ $slot }}
        </main>

        <footer class="bg-white shadow-md mt-6 p-4 text-center">
            <p class="text-gray-600">&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
