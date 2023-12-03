@extends('layouts.appadmin')

@section('content')
    @include('layouts.sidebar.sidebar')

    <section class="home">
        <div class="text">Detail Dosen</div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="d-flex justify-content-center mb-4">
                        {!! QrCode::encoding('ISO-8859-1')->size(220)->generate($lectures->qr_dosen) !!}

                    </div>

                    <div class="card">
                        <form action="{{ route('lectures.update', $lectures->id) }}" method="POST"
                            enctype="multipart/form-lectures">
                            @csrf
                            @method('PUT')
                            <h5 class="card-header dosen">Edit Dosen</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_dosen" class="form-label">Nama Dosen:</label>
                                    <input type="text" class="form-control border border-dark-subtle" id="nama_dosen"
                                        name="nama_dosen" placeholder="Masukkan Nama..."
                                        value="{{ $lectures->nama_dosen }}" required>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-3 col-3 d-grid">
                                        <a href="{{ route('lectures.index') }}" id="batal" class="btn btn-danger shadow"
                                            lectures-bs-dismiss="card">Batal</a>
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
