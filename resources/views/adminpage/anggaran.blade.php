<!DOCTYPE html>
<html >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pembobotan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        html{
            font-size:100%;
        }
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('image/bmbk1.png');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            width: 100%
        }

        /* .home2 {
            background-image: url('image/background.png');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        } */

        header{
            margin-top:10px;
            margin-left:10px;
            margin-right:10px;
            margin-bottom:5%;

        }

        .cash{
            font-size:20px;
            color:white;
        }

        .dana{
            width:300px;
            height:34px;
            border:1px solid;
            border-color:white;
            border-radius:10px;
            text-align:center;
    
        }

        table {
      border-collapse: collapse;
      width: 100%;
      overflow-x: auto;
    }

    
    th, td {
      color:white;
      padding: 8px;
      border-bottom: 1px solid white;
      white-space: nowrap;
    }

    .table-wrapper{
        max-height:300px;
        
    }

    th{
        background-color: black;
        position:sticky;
        top:0px;
    }

    td{
        background-color: #80808052;
    }

    tr{
        text-align:center;
    }
       
    input {
      height:34px;
      border: none;
      outline: none;
      background-color: transparent;
    }

    /* Mengatur tampilan input teks */
    .aesthetic-input {
      background-color: rgba(255, 255, 255, 0.5); /* Warna latar belakang transparan */
      border-radius: 10px; /* Mengatur sudut bulat */
      padding: 10px 15px; /* Mengatur jarak antara teks dan batas input */
      font-family: Arial, sans-serif; /* Mengatur jenis huruf */
      font-size: 13px; /* Mengatur ukuran huruf */
      color: #ffffff; /* Mengatur warna teks */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
      transition: background-color 0.3s; 
    }

    /* Efek hover pada input */
    .aesthetic-input:hover {
      background-color: rgba(255, 255, 255, 0.5); 
    }

    /* Efek focus pada input */
    
        
    .btn{
            width:138px;
            height:45px;
            text-align: center;
            /* padding: 20px 30px; */
            font-weight: bold !important;
            margin-left: 10px;
        }
    .btn-ok{
        background-color: #00FF00;
        font-size: 15px;
        font-weight: bold;
        padding: 5px 30px;
        margin-left: 15px;
        border-radius: 5px;
        border:none !important;
    }
        
        .btn-secondary{
            background-color: #FF9E49 !important;
            padding-top:10px !important;
            margin-top: 5% !important;
            color:black !important;
            font-weight: bold !important;
            font-size:15px !important;
            border:none !important;
        }
        .btn-danger{
            background-color: #00FF00 !important;
            color:black !important;
            width:100px;
            height:34px;
            font-weight: bold !important;
            font-size:13px !important;
            border:none !important;
        }

        /* .btn-outline-secondary{
            text-align: center;
            background-color: #00FF00 !important;
            color: black !important;
            width:60px !important;
            padding-left: 2px !important;
            height:auto !important;
            font-weight:800 !important;         
            font-size: 13px !important;
            border-radius:none !important ;
        } */


        .input-group{
            width:30% !important;
            
        }

        .form-control{
            background-color: transparent !important;
            color:white !important;
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




        @media screen and (max-width:991px){
            html{
                font-size: 90%;
            }

            header{
                margin-top:5%;
                margin-bottom:13%;
            }

            h1{
                margin-left:7%;
            }

            .input-group{
                width:45% !important;
            }

            .btn-secondary{
                margin-top:10% !important;
            }
        }

        @media screen and (max-width:575px){

            html{
                font-size:85%;
            }

           .btn {
            width:85px;
            height:40px;
           }

           header{
            margin-top:8px;
            margin-left:10px;
            margin-right:5px;
           }

           h1{
            margin-top:20%;
            margin-left:5%;
           }

           .fs-1{
            font-size:27px !important;
           }

           img{
            height: 45px;
            width:25px;
           }

           input{
            width:45%;
           }

           .input-group{
            width:47% !important;
           }

           .btn-ok{
            margin-left: 5px;
           }
           .btn-secondary{
            margin-top:20% !important;
            padding-top: 7px !important;
           }




    }
       
    </style>


</head>

<body>
    
    <header class="d-flex justify-content-between px-0 py-0">
        <img src="image/bmbklogo.png"  style="width:40px">
        <h1 class="fs-1 fw-bold text-light text-center">Tabel Variavel Ruas Jalan</h1>
        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn bg-danger" type="submit">Logout</button>
        </form>
        {{-- <a href="{{ route('login') }}" class="btn bg-danger">Logout</a> --}}
    </header>

    <div class="container-fluid mt-3">
        <div class="col d-flex justify-content-between my-3">

            <div class="col d-flex justify-content-between my-3">
                <input type="text" class="aesthetic-input me-3"id="searchInput" placeholder="Masukkan nama ruas jalan" name="search">

                <div class="input-group ">
                    <form class="d-flex" action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data" class="file-upload">
                    @csrf
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" accept=".xlsx, .xls" id="file">
                    <button class="btn-ok d-flex" type="submit" >OK</button>
                </form>
                </div>
            </div>
        </div>

        <div class="table-responsive table-wrapper">
            <table id="variabelTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruas</th>
                        <th>Panjang Ruas</th>
                        <th>PR Tidak Mantap</th> <!-- Tambahkan kolom ini -->
                        <th>Variabel 1</th>
                        <th>Variabel 2</th>
                        <th>Variabel 3</th>
                        <th>Variabel 4</th>
                        <th>Variabel 5</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($variabels->sortBy('no') as $variabel)
                    <tr>
                        <td >{{ $variabel['no'] }}</td>
                        <td>{{ $variabel['nama_ruas'] }}</td>
                        <td>{{ $variabel['panjang_ruas'] }}</td>
                        <td>{{ $variabel['pr_tidak_mantap'] }}</td>
                        <td>{{ $variabel['variabel1'] }}</td>
                        <td>{{ $variabel['variabel2'] }}</td>
                        <td>{{ $variabel['variabel3'] }}</td>
                        <td>{{ $variabel['variabel4'] }}</td>
                        <td>{{ $variabel['variabel5'] }}</td>
                        <td>{{ $variabel['total'] }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end tombol-next">
       
            <button class="btn btn-secondary fw-5" onclick="goToTahapDuaPage()">Next</button>
        </div>

    </div>

    

    {{-- <div class="table-responsive table-wrapper">
        <table id="variabelTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruas</th>
                    <th>Panjang Ruas</th>
                    <th>PR Tidak Mantap</th> <!-- Tambahkan kolom ini -->
                    <th>Variabel 1</th>
                    <th>Variabel 2</th>
                    <th>Variabel 3</th>
                    <th>Variabel 4</th>
                    <th>Variabel 5</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($variabels->sortBy('no') as $variabel)
                <tr>
                    <td>{{ $variabel->no }}</td>
                    <td>{{ $variabel->nama_ruas }}</td>
                    <td>{{ $variabel->panjang_ruas }}</td>
                    <td>{{ $variabel->pr_tidak_mantap }}</td> <!-- Tambahkan kolom ini -->
                    <td>{{ $variabel->variabel1 }}</td>
                    <td>{{ $variabel->variabel2 }}</td>
                    <td>{{ $variabel->variabel3 }}</td>
                    <td>{{ $variabel->variabel4 }}</td>
                    <td>{{ $variabel->variabel5 }}</td>
                    <td>{{ $variabel->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    {{-- <div class="d-flex justify-content-end tombol-next">
       
        <button class="btn btn-secondary fw-5" onclick="goToTahapDuaPage()">Tahap Dua</button>
    </div> --}}

      
                {{-- <div class="col d-flex justify-content-between my-3">
                    <input type="text" class="aesthetic-input me-3" placeholder="Masukkan nama ruas jalan">

                    <div class="input-group">
                        <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data" class="file-upload">
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file" accept=".xlsx, .xls" id="file">
                        <button class="btn btn-outline-secondary" type="submit" >OK</button>
                       </form>
                    </div>
                </div> --}}
                
            @if (Session::get('success') || Session::get('successExcel'))
                <div class="modal show" id="LoginSuccessModal" tabindex="-1" aria-labelledby="SuccessModalLabel" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button id="closeButton" class="btn-close" onclick="closeModal()"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                                <img src="image/checklist.png" style="width:70; margin-bottom:10%">
                                
                                <h1 class="modal-title fs-1 text-center fw-bold">@if (Session::get('success'))Login Berhasil @else File Tersimpan @endif</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        
            <script>
                function closeModal(){
                    document.getElementById('LoginSuccessModal').style = 'display : none;';
                }
            </script>
               
        {{-- <script>

            function goToEditVariabelPage() {
                var firstVariabelId = $('#variabelTable tbody tr:first-child td:first-child').text();
                if (firstVariabelId) {
                    var url = "{{ route('edit.variabel', ['id' => ':id']) }}";
                    window.location.href = url.replace(':id', firstVariabelId);
                } else {
                    alert('Tidak ada data variabel yang tersedia.');
                }
            }
            </script> --}}
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

       

    function goToTahapDuaPage() {
        window.location.href = "{{ route('tahap.dua') }}";
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    
</body>


</html>
