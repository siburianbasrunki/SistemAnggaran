<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Budget Table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .home2 {
            background-image: url('image/bmbk1.png');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .cash {
            font-size: 20px;
            color: white;
        }

        .dana {
            width: 300px;
            height: 34px;
            border: 1px solid;
            border-color: white;
            border-radius: 10px;
            text-align: center;

        }

        table {
            border-collapse: collapse;
            width: 100%;
            overflow-x: auto;
        }


        th,
        td {
            color: white;
            padding: 8px;
            white-space: nowrap;
        }

        .table-wrapper {
            max-height: 300px;

        }

        th {
            background-color: black;
            position: sticky;
            top: 0px;
        }

        td {
            background-color: #80808052;
        }

        tr {
            text-align: center;
        }

        input {
            height: 34px;
            border: none;
            outline: none;
            background-color: transparent;
        }

        /* Mengatur tampilan input teks */
        .aesthetic-input {
            background-color: rgba(255, 255, 255, 0.5);
            /* Warna latar belakang transparan */
            border-radius: 10px;
            /* Mengatur sudut bulat */
            padding: 10px 15px;
            /* Mengatur jarak antara teks dan batas input */
            font-family: Arial, sans-serif;
            /* Mengatur jenis huruf */
            font-size: 13px;
            /* Mengatur ukuran huruf */
            color: #ffffff;
            /* Mengatur warna teks */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        /* Efek hover pada input */
        .aesthetic-input:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }

        /* Efek focus pada input */


        .btn-secondary {
            background-color: #FF9E49 !important;
            color: black !important;
            width: 100px;
            height: 34px;
            font-weight: bold !important;
            font-size: 13px !important;
            border: none !important;
        }

        .table-responsive th,
        .table-responsive td {
            text-align: center;
            padding: 10px;
        }

        @media screen and (max-width:700px) {
            .dana {
                width: 180px;
                height: 30px;
                border: 1px solid;
                border-color: white;
                border-radius: 10px;
                text-align: center;
            }

            .cash {
                font-size: 17px;
            }
        }

        @media screen and (max-width:991px) {
            .home2 {
                padding-top: 15%;
            }
        }
    </style>


</head>

<body class="antialiased">
    <div class=" bg-success home2">
            <div>
                <h2 class="fs-1 fw-bold text-light text-center pt-5">Tabel Anggaran Perbaikan Jalan</h2>
            </div>

        <div class="container-md mt-5">
            <div class="cash">
                <p>Total Anggaran</p>
                <p class="dana">
                    Rp. {{$anggaranInput->inputted_budget}}
                </p>
            </div>

            <div class="col d-flex justify-content-start my-3">
                <input type="text" id="searchInput" class="aesthetic-input me-3" placeholder="Masukkan nama ruas jalan">
                
            </div>

            <div class="table-responsive table-wrapper">
                <table id="variabelTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruas</th>
                            <th>Panjang Ruas</th>
                            <th>Anggaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variabels as $variabel)
                        <tr>
                            <td>{{ $variabel->no }}</td>
                            <td>{{ $variabel->nama_ruas }}</td>
                            <td>{{ $variabel->panjang_ruas }} Km</td>
                            <td>Rp. {{ $variabel->dana_anggaran }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var keyword = $(this).val().toLowerCase();
                filterVariabels(keyword);
            });
        });
    
        function filterVariabels(keyword) {
            $('#variabelTable tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
            });
            $('#variabelTable thead').toggle($('#variabelTable tbody tr:visible').length > 0); // Tampilkan header hanya jika ada baris data yang terlihat
        }
    </script>
</body>

</html>