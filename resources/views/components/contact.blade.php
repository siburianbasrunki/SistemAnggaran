<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .home3 {
            background-image: url('image/bmbk1.png');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items:center;
            justify-content:center;
        }


        .kontak {
            background: rgba(102, 102, 102, 0.60);
            display: flex;
            flex-direction:column;
            padding: 20px;
            width:970px;
            height:auto;
        }

        .kontak img {
            width:389px;
            height:281px;
        }

        .kontak p {
            color:white;
            font-size: 20px;
            font-weight: 500;
        }

        .kontak h3{
            font-weight:bold;
            color:white;
            font-size: 25px;
        }

        .box{
            margin-top: 1rem;
        }


        .konten{
            display:flex;
            padding-top:5px;
        }

        .konten img{
            width:75px;
            height:45px;
        }

        .kiri{
            padding-left:1.5rem;
        }

        @media screen and (max-width:1200px){
            .kontak{
                width:90%;
                padding:20px;
                height:auto;
            }

        .kontak p {
            color:white;
            font-size: 20px;
            font-weight: 500;
        }

        .kontak h3{
            font-weight:bold;
            color:white;
            font-size: 20px;
        }

        .konten img{
            width:75px;
            height:45px;
        }
        .box{
            margin-top:1rem;
        }
     }

        @media screen and (max-width:700px){
            .kontak{
                width:97%;
                padding:20px;
                height:auto;
            }

        .kontak p {
            color:white;
            font-size: 15px;
            font-weight: 500;
        }

        .kiri{
            padding-left:1.3rem;
        }

        .kontak h3{
            font-weight:bold;
            color:white;
            font-size: 20px;
        }

        .konten img{
            width:50px;
            height:35px;
        }
        .box{
            margin-top:0.5rem;
        }
        
     }
       

    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="home3">
        <div class="kontak">

            <div class="box">
              <h3>Alamat</h3>
              <div class="konten"><img src="image/rumah1.png"><p class="kiri">Jl. Zainal Abidin Pagar Alam Km 11 Rajabasa, Bandar Lampung 35144</p></div>
            </div>
    
            <div class="box">
              <h3>Telepon</h3>
              <div class="konten"><img src="image/telepon1.png"><p class="kiri">(0721) 702684</p></div>
            </div>

            <div class="box">
              <h3>Email</h3>
              <div class="konten"><img src="image/pesan1.png"><p class="kiri">dinasbmbk@lampungprov.go.id</p></div>
            </div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>


</html>