<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <h1>Home Page</h1>

        <x-nav-bar1 />

        <x-dash-board />

        <x-auth.login />
        
        <?php
         $name="carrat";

         foreach($names as $item){
             echo $item."<hr>";
         }

        ?>

        @foreach ($names as $item)
            <h1>{{$item}}</h1>
        @endforeach
{{$boy}}

{{$names[0]}}
        <x-auth.register.register />

        <x-onboard.on-board data="{{$name}}" name="sfff" />

        <?php
            print_r($names)
        ?>
    </body>
</html>
