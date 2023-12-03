@extends('layouts.appadmin')

@section('content')
    @include('layouts.sidebar.sidebar')

    <section class="home">
        <div class="text">Halaman Dosen</div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <form action="{{ route('lectures.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-header dosen"><i class="bi bi-person-plus-fill me-2"></i>Tambah Dosen</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_dosen" class="form-label">Nama Dosen:</label>
                                    <input type="text" class="form-control border border-dark-subtle" id="nama_dosen"
                                        name="nama_dosen" placeholder="Masukkan Nama..." required>
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
                <div class="col-lg-8 col-md-6 mb-4">
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true"
                        class="scrollspy-example" tabindex="0">
                        <table class="table datatable" id="tabeldosen" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>No.</th>
                                    <th class="w-100">Nama Dosen</th>
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
            $('#tabeldosen').DataTable({
                serverSide: true,
                processing: true,
                ajax: "gettabeldosen",
                pagingType: 'simple_numbers',
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
                        data: "nama_dosen",
                        name: "nama_dosen",
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
