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

    {{-- section detail blog --}}
    <section class="Home-bg">
        <h1 class="home-text">details</h1>
    </section>



    {{-- detail --}}
    <section class="detail-blogs">
        <div id="detail-blogs">
            <div class="detail-title">
                <h1 id="detail-title">{{ $detail -> title }}</h1>
            </div>
            <div class="img-detail">
                <div id="img-detail" style="background-image: url('../blogs/{{ $detail -> image }}')"></div>
            </div>
            <div class="time-detail">
                <p id="time-detail">{{ $detail -> created_at }}</p>
            </div>
            <div class="description-detail">
                <p id="description-detail">{{ $detail -> description }}</p>
            </div>
            <div name="profile">
                <div class="profile-detail">
                    <p class="created-by">Created by :</p>
                    <div id="profile-detail" style="background-image: url('../profile/{{ $detail -> user -> profile }}')"></div>
                    <p class="name-detail">{{ $detail ->user -> first_name }} {{ $detail ->user -> last_name }}</p>
                </div>
                <a href="{{ route('home') }}" class="back-to-home" style="margin-top: 20px">back to home</a>
            </div>
        </div>
    </section>


@endsection
