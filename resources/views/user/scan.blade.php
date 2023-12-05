@extends('layouts.appuser')

@section('content')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex flex-row" href="{{ url('/') }}">
                <img id="img-logo" src="{{ Vite::asset('resources/images/logo.png') }}" alt="image">
                <span class="ms-2 fs-6 fw-bold my-auto" id="title-logo">MyLogistic</span>
            </a>

        </div>
    </nav>

    <div class="container mt-3">
        @auth
            <a href="/home" class="icon-link icon-link-hover text-secondary link-underline-secondary">
                Home
                <i class="bi bi-arrow-right"></i>
            </a>
        @endauth

        <div class="row d-flex justify-content-center">
            <div class="d-flex justify-content-center mb-4">
                <h4 class="fw-bold title-scan px-4 py-2">
                    <i class="bi bi-qr-code-scan me-2"></i>
                    Peminjaman
                </h4>
            </div>
            <div class="col-lg-6 d-flex justify-content-center mb-4">
                <div id="reader" style="max-width: 550px;"></div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <h5 class="card-header dosen">Data Peminjaman</h5>
                    <div class="card-body">
                        <h5 class="card-title 1 fw-bold">Scan Id Peminjam:</h5>

                        <div class="card d-peminjaman mb-2">
                            <div class="card-body 1">
                                <div id="isi-textarea1">-</div>
                            </div>
                        </div>
                        <h5 class="card-title 2 fw-bold">Scan Handbag:</h5>
                        <div class="card d-peminjaman">
                            <div class="card-body 2">
                                <div id="isi-textarea2">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="/scans" class="btn btn-primary fw-bold px-5">Reset</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Form D-None --}}
        <div class="d-none">
            <form id="scanForm" action="{{ route('scans.store') }}" method="POST" enctype="multipart/form-data"
                onsubmit="return validateForm()">
                @csrf
                <textarea name="nama_dosen" id="nama_dosen" cols="60" rows="8"></textarea>

                <textarea name="nama_handbag" id="nama_handbag" cols="60" rows="8"></textarea>
                <button type="submit" id="submitButton" disabled>Submit</button>
            </form>
        </div>
    </div>



    <script>
        let isFirstTextareaFilled = false;

        function onScanSuccess(decodedText, decodedResult) {
            var textarea1 = document.getElementById('nama_dosen');
            var textarea2 = document.getElementById('nama_handbag');
            var isiTextarea1 = document.getElementById('isi-textarea1');
            var isiTextarea2 = document.getElementById('isi-textarea2');
            var submitButton = document.getElementById('submitButton');

            if (!isFirstTextareaFilled) {
                textarea1.value = decodedText;
                isiTextarea1.innerText = decodedText; // Set content for isi-textarea1
                isFirstTextareaFilled = true;
                alert('Nama Peminjam terisi! ' + decodedText);

            } else {
                textarea2.value = decodedText;
                isiTextarea2.innerText = decodedText; // Set content for isi-textarea2
                alert('Hanbag terisi! ' + decodedText);
                submitButton.disabled = false; // Enable submit button
                document.getElementById('scanForm').submit(); // Submit the form automatically
            }
        }


        function validateForm() {
            var textarea1 = document.getElementById('nama_dosen').value;
            var textarea2 = document.getElementById('nama_handbag').value;

            if (textarea1.trim() === '' || textarea2.trim() === '') {
                alert('Mohon isi kedua textarea terlebih dahulu.');
                return false; // Prevent form submission if either textarea is empty
            }
            return true; // Allow form submission if both textareas are filled
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 240
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
