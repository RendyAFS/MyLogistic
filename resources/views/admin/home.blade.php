@extends('layouts.appadmin')

@section('content')
    @include('layouts.sidebar.sidebar')

    <section class="home">
        <div class="text">Beranda</div>
        <div id="reader" width="600px"></div>
        <input type="text" value="">
    </section>


    
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
            document.querySelector('input[type="text"]').value = decodedText;
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
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection