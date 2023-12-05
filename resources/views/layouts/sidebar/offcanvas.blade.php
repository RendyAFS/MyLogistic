<div class="offcanvas ku offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand d-flex flex-row" href="{{ url('/') }}">
            <img id="img-logo" src="{{ Vite::asset('resources/images/logo.png') }}" alt="image" style="width:20%">
            <span class="ms-2 fs-3 fw-bold my-auto" id="title-logo">MyLogistic</span>
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="card btn-offcanvas">
                        <a class="text-decoration-none fs-4" href="/home">
                            <div class="card-body">
                                <i class='bx bx-home-alt fs-5'></i>
                                <span class="">Beranda</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="card btn-offcanvas">
                        <a class="text-decoration-none fs-4" href="{{route('lectures.index')}}">
                            <div class="card-body">
                                <i class='bx bi-person-check fs-5'></i>
                                <span class="">Dosen</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="card btn-offcanvas">
                        <a class="text-decoration-none fs-4" href="{{route('handbags.index')}}">
                            <div class="card-body">
                                <i class='bx bi-bag fs-5'></i>
                                <span class="">Hanbag</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="list-group-item mt-3">
                    <a class="text-decoration-none fs-4 text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out fs-5'></i>
                        <span>Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
