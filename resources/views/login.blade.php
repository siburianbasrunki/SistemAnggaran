<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login</title>

    <style>
        .login-page {
            background-image: url('image/bmbk1.png');
            background-size: cover;
            background-repeat: no-repeat;
            width: auto;
            height: 100vh;
        }

        .login-form {
            
            width: 100%;
            height:325px;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .card{
            background: rgba(217, 217, 217, 0.60) !important;
            border: none !important;
        }
/* 
        .login-form input[type="email"],
        .login-form input[type="password"] {
            background-color: #000099;
            color: #fff;
        } */

        .login-form button {
            width: 100px;
        }

        .register-link {
            color: #fff;
            text-decoration: none;
        }
        
        .form-card {
            height:100vh;
            align-items:center
        }

        .modal{
            background-color: #16161696 !important;
        }

        .modal-content{ 
            height:400px !important;
        }
        .modal-header{
            border-bottom:none !important;
        }

        .form-control{
            border-color:rgba(0, 0, 153, 0.40) !important;
            background-color: rgba(0, 0, 153, 0.40) !important;
            transition:none !important;
        }



        @media screen and (max-width:991px){
            .login-form{
            width: 65%;
            height:275px;
            max-width: 500px;
            margin: 10px auto;
            padding: 20px;

            }

            .card{

                width:75%;
                left:13%;
            }
            

        }
        @media screen and (max-width:700px){

        }
        @media screen and (max-width:565px){
            .login-form{
            width: 100%;
            height:250px;
            max-width: 300px;
            margin: 0 auto;
            padding: 10px;
            }
            .card{
                width:85%;
                left:7%;
            }


        }
    

        
    </style>
</head>

<body class="login-page">
    @include("components.navbar")

    <div class="container">
        <div class="row justify-content-center form-card ">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body login-form rounded ">
                       <!-- @if(Session::has('error')) 
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                        @endif -->
                        <form id="loginform" action="{{ route('login') }}" method="POST">
                         @csrf
                            <div class="mt-3">
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Nama Pengguna" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Kata Sandi"required>
                                </div>
                            </div>

                            <div class="mt-5">

                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary"data-bs-toggle="modal" >Login</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            @if (Session::get('error'))
            <div class="modal show" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button onclick="closeModal()" class="btn-close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                        <img src="image/wrong.png" style="width:56; margin-bottom:10%">

                        <h1 class="modal-title fs-1 text-center">Login Gagal</h1>
                    </div>
                    </div>
                </div>
                </div>
            @endif

            <script>
                function closeModal(){
                    document.getElementById('errorModal').style = 'display : none;';
                }
            </script>

            <!-- Modal -->

            <!-- Successfuly Login Pop Up -->
                {{-- <div class="modal" id="SuccessModal" tabindex="-1" aria-labelledby="SuccessModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                        <img src="image/checklist.png" style="width:56; margin-bottom:10%">

                        <h1 class="modal-title fs-1 text-center" >Login Berhasil</h1>
                    </div>
                    </div>
                </div>
                </div> --}}

                
                
                <!-- Error Login Pop Up -->

                {{-- <div class="modal" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                        <img src="image/wrong.png" style="width:56; margin-bottom:10%">

                        <h1 class="modal-title fs-1 text-center" >Login Gagal</h1>
                    </div>
                    </div>
                </div>
                </div> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    
</body>

</html>