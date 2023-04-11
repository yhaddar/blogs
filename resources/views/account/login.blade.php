<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @vite(['resources/scss/blogs.scss','resources/js/app.js'])

</head>
<body>
    <nav class="navbar-blogs">
        <div id="nav-blogs">
            <div class="logos-navbar">
                <h1 class="logo">blogs</h1>
            </div>
            <div class="pages-blogs">
                <?php $pages = [
                        ['href' => 'blog.register', 'title' => 'Register'],
                    ]
                ?>
                @foreach ($pages as $page)
                    <a href="{{ route($page['href']) }}" class="page-blog">{{$page['title']}}</a>
                @endforeach
            </div>
        </div>
    </nav>
    <section class="Home-bg">
        <h1 class="home-text">login</h1>
    </section>
    <div class="add-blog">
        @if (session() -> has('error'))
            <div class="alert alert-danger">{{session() -> get('error')}}</div>
        @endif
        <h1 class="login-text">login</h1>
        <form method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="mb-3">
                <input placeholder="enter your email" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <input  placeholder="enter your password" name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary">login</button>
        </form>
    </div>

</body>
</html>