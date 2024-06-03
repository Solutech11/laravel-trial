<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
    <style>
        .wrapper{
            width: 800px;
            margin: auto
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <main class="wrapper bg-white">

        <header class="flex flex-row justify-between items-center px-8 py-4">
            <h4 class="font-bold text-green-500 text-3xl">PasswordR</h4>

            <nav class="flex flex-row gap-5">
                <a href="{{ route('About.Page')}}" class="">About</a>


                @isset($login)
                    {{$login}}
                @endisset
            </nav>
            
        </header>

        {{$slot}}
    </main>
    
</body>
</html>