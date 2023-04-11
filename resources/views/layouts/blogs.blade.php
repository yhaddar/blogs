<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>blogs</title>
        {{-- font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- ion icon --}}
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>



        @vite(['resources/scss/blogs.scss','resources/js/app.js'])
    </head>
    <body>
        {{-- @include('layouts.navbar') --}}
        @yield('content')

    </body>
</html>
