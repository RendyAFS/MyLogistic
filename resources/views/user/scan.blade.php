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

    <div class="container mt-5">
        <a href="/home">Home</a>

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="text">Scan Peminjaman</div>
                <div id="reader" width="600px"></div>
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
            var submitButton = document.getElementById('submitButton');

            if (!isFirstTextareaFilled) {
                textarea1.value = decodedText;
                isFirstTextareaFilled = true;
                alert('Textarea 1 terisi! ' + decodedText);
            } else {
                textarea2.value = decodedText;
                alert('Textarea 2 terisi! ' + decodedText);
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
                    width: 450,
                    height: 450
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
