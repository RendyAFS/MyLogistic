@extends('layouts.appadmin')

@section('content')
    @include('layouts.sidebar.sidebar')

    <section class="home">
        @include('layouts.sidebar.offcanvas')
        <div class="text">
            {{-- Menu Hp --}}
            <a class="menu-hp text-decoration-none text-white" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
                aria-controls="staticBackdrop">
                <i class="bi bi-list"></i>
            </a>
            Beranda
        </div>
        <div class="container mt-5">
            <a href="/scans">Scan</a>
            <div class="row justify-content-center">
                <div class="col-md-5 col-10">

                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="module"></script>
@endpush
