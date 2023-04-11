<nav class="navbar-blogs">
    <div id="nav-blogs">
        <div class="logos-navbar">
            <h1 class="logo">blogs</h1>
        </div>
        <div class="pages-blogs">
            <?php $pages = [
                    ['href' => 'add.blogs', 'title' => 'add blog'],
                    ['href' => 'my.blogs', 'title' => 'my blogs'],
                ]
            ?>
            @foreach ($pages as $page)
                <a href="{{ route($page['href']) }}" class="page-blog">{{$page['title']}}</a>
            @endforeach
        </div>
        <div>
            <div id="user_login">
                <h3 class="user-name"> youssef haddar</h3>
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
