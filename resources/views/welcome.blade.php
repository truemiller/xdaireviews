<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="js/app.js" defer></script>
        <title>{{env("APP_NAME")}}</title>
    </head>
    <body>
    <main id="app"></main>
    </body>
</html>
