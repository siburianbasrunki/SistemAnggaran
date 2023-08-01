<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BMBK</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
                  
        }
        *{
            padding: 0;
            margin: 0;
        }


        .home {
            background-image: url('image/bgHome1.png');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
        }


        .jumbotron {
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            padding: 10px;
            padding-top:8%;
        }
        
    

        .jumbotron img {
            border: 2px solid;
            height: auto;
        }

        .jumbotron p {
            width: 750px;
            color:white;
            font-size: 25px;
            font-weight: 700;
            line-height: 37px;
        }

        .desc{
            margin-top:5%;
            text-align:center;
        }

        .oranye{
            color:#FF9E49;
        }
        .biru{
            color:#000099;
        }


        @media screen and (max-width:991px){
           
                .jumbotron {
                padding-top:30%;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
            }

            .jumbotron p {
                width: 600px;
                font-size:1.8rem;
                font-weight:700;
                line-height:30px;
            }
        }


            @media screen and (max-width:767px){
                .jumbotron {
                padding-top:auto;
                display:flex;
                flex-direction:column;
                justify-content:center;
            }

           .jumbotron p{
            width:300px;
            font-size:15px;
            font-weight:700;
            line-height:25px;
           }
       }

       @media screen and (max-width:575px){
        .jumbotron {
            padding-top:30%;
        }
       }
        
    </style>


</head>

<body class="antialiased">
    <div class=" bg-success home ">
        <section>@include("components.navbar")</section>
            <div class="jumbotron" id="home">
                <img src="{{asset('image/titlebmbk.svg')}}" width="250" class="mt-3">
                <h3 class="text-center fs-3 fw-bold mt-3"><span class="oranye">Dinas</span> <span class="biru">Bina</span> <span class="oranye">Marga</span> <span class="biru">dan</span> <span class="oranye">Bina</span> <span class="biru">Konstruksi</span></h3>
                <p class="desc">
                    Sebuah instansi pemerintah di Lampung yang bertanggung jawab dalam bidang pembangunan infrastruktur jalan, jembatan, dan konstruksi serta meliputi perencanaan, pengembangan, pemeliharaan, dan pengawasan terhadap proyek-proyek konstruksi dan infrastruktur di wilayah Lampung.
                </p>
            </div>
    </div>
    <section id="about">@include("components.about")</section>
    <section id="tabel">@include("components.table")</section>
    <section id="contact">@include("components.contact")</section>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>


</html>