<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>About</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        

        .home1 {
            background-image: url('image/bmbk1.png');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items:center;
            justify-content:center;
        }




        .about {
            background: rgba(102, 102, 102, 0.60);
            display:flex;
            padding: 15px;
            width:981px;
            height:auto;
        }

        .about img {
            width:389px;
            height:281px;
        }

        .about p {
            color:white;
            font-size: 20px;
            font-weight: 500;
            line-height: 33px;
        }


        .oranye{
            color:#FF9E49;
        }
        .biru{
            color:#000099;
        }

        @media screen and (max-width:1200px){
        .about {
                width:90%;
                height:100%;
                display:flex;
                flex-direction:column-reverse;
                align-items:center;
                justify-content:center;
                text-align:center;
        }

        .about p {
            margin-top:10px;
            color:white;
            font-size: 1.4rem;
            font-weight: 500;
            line-height: 25px;
        }
        .about img {
            width:389px;
            height:281px;
        }
    }

        @media screen and (max-width:700px){
            .about {
                width:90%;
                display:flex;
                justify-content:center;
                align-items:center;
                flex-direction:column-reverse;
            }

            .about p {
            margin-top:10px;
            color:white;
            text-align:center;
            font-size: 15px;
            font-weight: 500;
            line-height: 20px;
        }
        .about img {
            width:289px;
            height:181px;
        }

    }

    @media screen and (max-width:575px){
        .about p {
            text-align:center;
        }
    }


    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="antialiased ">
    <div class=" home1 ">

            <div class="about my-5">
                <p style="margin-right:2rem">Sistem Informasi berbasi web ini bertujuan untuk memberikan informasi dana anggaran pembagian ruas jalan yang ada di daerah Lampung. Dinas Bina Marga dan Bina Konstruksi juga membuat sistem informasi ini untuk pengguna user dan admin. Dengan hal ini, informasi yang pengguna user dapatkan bernilai real atau fakta dengan data - data yang dilampirkan dalam sistem informasi berbasis web ini dengan pembagian dana anggaran yang tepat pada ruas jalan tertentu sesuai pertimbangan nilai kerusakan dan prioritas jalan.</p>
                <img src="image/kontenAbout.png">
            </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>



</html>