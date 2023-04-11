@extends('layouts.blogs')
@section('content')


{{--  navbar --}}
<nav class="navbar-blogs">
    <div id="nav-blogs" >
        <div class="logos-navbar" style="padding-top: 0px">
            <h1 class="logo">blogs</h1>
        </div>
        <div class="pages-blogs">
            <a href="{{ route('home') }}" class="page-blog">Home</a>
            <a href="{{ route('add.blogs', $user -> id) }}" class="page-blog">add blogs</a>
        </div>
        <div>
            <div id="user_login">
                <h3 class="user-name">{{ $user -> first_name ?? null }} {{ $user -> last_name ?? null }} </h3>
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

{{-- section Background --}}
    <section class="Home-bg">
        <h1 class="home-text">my blogs</h1>
    </section>

    {{-- my Blogs --}}

    <section class="blog-note">
        @if (Session::has('success'))
            <div class="alert-success">{{ Session::get('success') }}hello world</div>
        @endif
        <div class="note-blog">
            @foreach ($blogs as $blog)
            <div class="note">
                <div class="img-note">
                    <div id="img-note" style="background-image: url('../blogs/{{ $blog['image'] }}')"></div>
                </div>
                <div class="category-note">
                    <h3 id="category-note">{{ $blog['category'] }}</h3>
                </div>
                <div class="title-note">
                    <a href='{{ route('detail.blogs', $blog -> slug) }}' id="title-note">{{ $blog['title'] }}</a>
                </div>
                <div class="create-at">
                    <p class="date-note">{{ $blog['created_at'] }}</p>
                </div>
                <div class="description-note">
                    <p id="description-note">{{ Str::limit($blog['description'], 450, '...') }}</p>
                </div>
                <div class="owner-post">
                    <div class="CRUD">
                        <a href="{{ route('my-blog.edit', $blog -> id) }}">
                            <div class="edit">
                                <i class="fa fa-pen"></i>
                            </div>
                        </a>
                        <form action="{{ route('my-blog.destroy', $blog -> id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" style="cursor: pointer">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection


