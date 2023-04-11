<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add blog</title>
    @vite(['resources/scss/blogs.scss','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <nav class="navbar-blogs">
        <div id="nav-blogs" style="padding-top: 8px">
            <div class="logos-navbar" style="padding-top: 0px">
                <h1 class="logo">blogs</h1>
            </div>
            <div class="pages-blogs">
                <a href="{{ route('home') }}" class="page-blog">Home</a>
                <a href="{{ route('add.blogs') }}" class="page-blog">add blogs</a>
            </div>
            <div>
                <div id="user_login" style="align-items: normal; padding-top: 8px">
                    <h3 class="user-name">{{ $user -> first_name ?? null }} {{ $user -> last_name ?? null }}</h3>
                    <i class="fa-solid fa-caret-down"></i>
                    <i class="fa-solid fa-caret-up"></i>
                </div>
                <div>
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <div id="btn-logout">
                            <button class="btn-logout">logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <section class="Home-bg">
        <h1 class="home-text">edit blog</h1>
    </section>

    <div class="add-blog" style="width: 97%">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <form action="{{ route('my-blog.update', $user -> id) }}" method="POST" class="form-edit" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input placeholder="title" name="title"  value="{{ $edit -> title }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="description" placeholder="Leave a comment here"  style="height: 500px">{{ $edit -> description }}</textarea>
            </div>
            <div class="select">
                <select  style="cursor: pointer;" class="form-select" name="category" value="{{ $edit -> category }}" aria-label="Default select example">
                    <option selected>{{ $edit -> category }}</option>
                    @foreach ($category as $cat)
                        <option value="{{ $cat -> category }}" style="text-transform: capitalize;">{{$cat-> category  }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"></div>
            <div class="mb-3">
                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" id="edit-btn">edit</button>
        </form>
    </div>
</body>
</html>
