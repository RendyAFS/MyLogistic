<nav class="sidebar close shadow">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" style="width: 50%">
            </span>

            <div class="text logo-text">
                <span class="name">My Logistic</span>
                <span class="collage">Telkom University Surabaya</span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle' id="btn"></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="/home">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Beranda</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{ route('lectures.index') }}">
                        <i class="bi bi-person-check icon"></i>
                        <span class="text nav-text">Dosen</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="{{ route('handbags.index') }}">
                        <i class="bi bi-bag icon"></i>
                        <span class="text nav-text">Handbag</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
        </div>
    </div>
</nav>


