<nav class="navbar navbar-expand-lg navbar-dark navbar-sm bg-dark mb-4 text-uppercase">
    <a href="{{ route('root') }}" class="navbar-brand"><i class="fas fa-cogs fa-fw"></i> Dashboard</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        @if (!Auth()->guest())
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="posts-dropdown" data-toggle="dropdown">Posts</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('post.index') }}">List Posts</a>
                    <a href="{{ route('post.create') }}" class="dropdown-item">Create New</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categories-dropdown" data-toggle="dropdown">Category</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('category.index') }}">List Categories</a>
                    <a class="dropdown-item" href="{{ route('category.create') }}">Create New</a>
                </div>
            </li>
        </ul>
        @endif
        <ul class="navbar-nav ml-auto">
            @if (Auth()->guest())
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
            @else
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="user-dropdown" data-toggle="dropdown">
                    @auth
                    {{ Auth::user()->name }}
                    @endauth
                </a>
                <div class="dropdown-menu" style="left:-100%;right:0">
                    <a href="#" class="dropdown-item"><i class="fas fa-cogs"></i> Settings</a>
                    <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>