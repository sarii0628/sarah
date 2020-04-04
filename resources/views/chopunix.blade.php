<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>   
    </head>
    <body>
        こんにちは
        <?php    
        foreach($sample as $s) {
          echo  $s."<br>";
        }
        ?>
        @foreach($sample as $value)
           {{$value}}
        @endforeach
    </body>
</html>
