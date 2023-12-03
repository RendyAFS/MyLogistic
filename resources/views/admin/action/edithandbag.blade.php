@extends('layouts.appadmin')

@section('content')
    @include('layouts.sidebar.sidebar')

    <section class="home">
        <div class="text">Detail Handbag</div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="d-flex justify-content-center mb-4">
                        <img src="" alt="">
                        {!! QrCode::encoding('ISO-8859-1')->size(220)->generate($handbags->qr_handbag) !!}

                    </div>

                    <div class="card">
                        <form action="{{ route('handbags.update', $handbags->id) }}" method="POST"
                            enctype="multipart/form-handbags">
                            @csrf
                            @method('PUT')
                            <h5 class="card-header handbag">Edit Handbag</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_handbag" class="form-label">Nama handbag:</label>
                                    <input type="text" class="form-control border border-dark-subtle" id="nama_handbag"
                                        name="nama_handbag" placeholder="Masukkan Nama..."
                                        value="{{ $handbags->nama_handbag }}" required>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-3 col-3 d-grid">
                                        <a href="{{ route('handbags.index') }}" id="batal" class="btn btn-danger shadow"
                                            handbags-bs-dismiss="card">Batal</a>
                                    </div>
                                    <div class="col-md-3 col-3 d-grid">
                                        <button class="btn btn-success shadow">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
