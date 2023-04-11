@extends('layouts.blogs')
@section('content')


{{--  navbar --}}
<nav class="navbar-blogs">
    <div id="nav-blogs" >
        <div class="logos-navbar" style="padding-top: 0px">
            <h1 class="logo">blogs</h1>
        </div>
        <div class="pages-blogs">
            <a href="{{ route('add.blogs') }}" class="page-blog">add blog</a>
            <a href="{{ route('my.blog', $user -> id) }}" class="page-blog">my blogs</a>
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
        <h1 class="home-text">blogs</h1>
    </section>



    {{-- section blogs --}}
    <section class="blog-note">
        <div class="note-blog">
            @foreach ($blogs as $blog)
            <div class="note">
                <div class="img-note">
                    <div id="img-note" style="background-image: url('../blogs/{{ $blog['image'] }}')"></div>
                </div>
                <div class="category-note">
                    <a href="{{ route('category', $blog['category']) }}" id="category-note">{{ $blog['category'] }}</a>
                </div>
                <div class="title-note">
                    <a href="{{ route('detail.blogs', $blog -> slug) }}" id="title-note">{{ $blog['title'] }}</a>
                </div>
                <div class="create-at">
                    <p class="date-note">{{ $blog['created_at'] }}</p>
                </div>
                <div class="description-note">
                    <p id="description-note">{{ Str::limit($blog['description'], 450, '...') }}</p>
                </div>
                <div class="owner-post">
                    <div id="owner-post">
                        <div class="owner-profile" style="background-image: url('../profile/{{ $blog ->user ->profile }}')"></div>
                        <p class="owner-name">{{ $blog ->user ->first_name }} {{ $blog ->user ->last_name }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
@endsection
