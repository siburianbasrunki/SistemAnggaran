<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <style>
        .register-page {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('image/bmbk.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            width: auto;
            height: 100vh;
        }

        .register-form {
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .register-form button {
            width: 200px;
        }

        .countdown {
            font-size: 32px;
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="register-page">
    @include("components.navbar")

    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body register-form">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    <div class="countdown">
                        Redirecting to login page in <span id="countdown">3</span> seconds...
                    </div>
                    <script>
                        var countdownElement = document.getElementById("countdown");
                        var countdown = 3;

                        function startCountdown() {
                            countdownElement.textContent = countdown;
                            countdown--;

                            if (countdown < 0) {
                                window.location.href = "{{ route('login') }}";
                            } else {
                                setTimeout(startCountdown, 1000);
                            }
                        }

                        startCountdown();
                    </script>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
