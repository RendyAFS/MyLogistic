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
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 mb-5 pt-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <h5 class="card-header dosen"><i class="bi bi-bag me-2"></i>Total Hanbag</h5>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="nama_dosen" class="form-label">Total Handbag yang terdaftar
                                            QrCode</label>
                                        <h2 class="fw-bold">{{ $handbags->count() }}</h2>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('handbags.index') }}" class="btn shadow w-md-25 btn-accent"><i
                                                class="bi bi-info-circle"></i> Detail </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <h5 class="card-header dosen"><i class="bi bi-person-check me-2"></i>Total Dosen</h5>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="nama_dosen" class="form-label">Total Dosen yang terdaftar QrCode</label>
                                        <h2 class="fw-bold">{{ $lectures->count() }}</h2>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('lectures.index') }}" class="btn shadow w-md-25 btn-accent"><i
                                                class="bi bi-info-circle"></i> Detail </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <a href="/scans" class="icon-link icon-link-hover text-secondary link-underline-secondary">
                            Scan
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <hr class="d-md-none">
                <div class="col-lg-6 ">
                    <h4 class="fw-bold">Data Peminjaman Handbag</h4>
                    <table class="table datatable" id="tabelactivities" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>No.</th>
                                <th class="w-75">Nama Dosen</th>
                                <th class="w-25">Nama handbag</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#tabelactivities').DataTable({
                serverSide: true,
                processing: true,
                ajax: "/getData",
                pagingType: 'simple',
                responsive: true,
                columns: [{
                        data: "id",
                        name: "id",
                        visible: false
                    },
                    {

                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        visible: true,
                        className: 'text-center align-middle',
                        render: function(data, type, row, meta) {
                            return data + '.';
                        }
                    },
                    {
                        data: "nama_dosen",
                        name: "nama_dosen",
                        className: 'align-middle',

                    },
                    {
                        data: "nama_handbag",
                        name: "nama_handbag",
                        orderable: true,
                        searchable: true,
                        className: 'align-middle',
                    },
                ],
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [8, 25, -1],
                    [8, 25, 'All'],
                ],

            });
        });
    </script>
@endpush
