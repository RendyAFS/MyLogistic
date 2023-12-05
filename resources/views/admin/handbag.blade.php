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
            Halaman Handbag
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('handbags.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-header dosen"><i class="bi bi-person-plus-fill me-2"></i>Tambah Handbag</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_handbag" class="form-label">Nama Handbag:</label>
                                    <input type="text" class="form-control border border-dark-subtle" id="nama_handbag"
                                        name="nama_handbag" placeholder="Masukkan Handbag..." required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success shadow w-md-25 ">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true"
                        class="scrollspy-example" tabindex="0">
                        <table class="table datatable" id="tabelhandbag" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>No.</th>
                                    <th class="w-100">Nama Handbag</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#tabelhandbag').DataTable({
                serverSide: true,
                processing: true,
                ajax: "gettabelhandbag",
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
                        visible: false,
                        className: 'text-center align-middle',
                        render: function(data, type, row, meta) {
                            return data + '.';
                        }
                    },
                    {
                        data: "nama_handbag",
                        name: "nama_handbag",
                        className: 'align-middle',

                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false,
                        className: 'align-middle',
                    },
                ],
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [9],
                    [9],
                ],

            });
            $(".datatable").on("click", ".btn-delete", function(e) {
                e.preventDefault();

                var form = $(this).closest("form");

                Swal.fire({
                    title: "Apakah Anda Yakin Menghapus Data " + "?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Ya, hapus!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
