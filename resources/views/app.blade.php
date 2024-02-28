<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Qraphiql</title>
  <script src="https://cdn.tailwindcss.com"></script>

        {{-- @vite('resources/css/app.css') --}}
         @vite('resources/js/app.js')

    </head>
    <body >
        <div id="app">
            <App />
        </div>
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
<ul>
    @foreach ($posts as $post)
    <li> {{ $post['title'] }}</li>
    @endforeach
</ul>
</div>

<h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
    </body>
</html>
