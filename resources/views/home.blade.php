<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <style>
        .dashboard {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('image/bmbk.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            width: auto;
            height: 100vh;
        }
    </style>
</head>

<body class="dashboard">
    @include("components.navbaradmin")

    <div class="container">
        <h1 class="text-light"> Welcome To Dashboard Admin, {{ Auth::user()->name }}</h1>
    </div>

    @if (Session::get('success'))
        <div class="modal show" id="SuccessModal" tabindex="-1" aria-labelledby="SuccessModalLabel" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button id="closeButton" class="btn-close" onclick="closeModal()"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                        <img src="image/checklist.png" style="width:56; margin-bottom:10%">
                        
                        <h1 class="modal-title fs-1 text-center">Login Berhasil</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        function closeModal(){
            document.getElementById('SuccessModal').style = 'display : none;';
        }
    </script>

    
</body>

</html>