    <!DOCTYPE html>
    <html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Add these scripts inside the <head> tag -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
        <title>Tahap Dua</title>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url('image/bmbk1.png');
                background-size: cover;
                background-repeat: no-repeat;
                width: auto;
                min-height: 100vh;
            }


            header {

                margin-top: 10px;
                margin-left: 10px;
                margin-right: 10px;
                margin-bottom: 5%;

            }

            .btn {
                width: 138px;
                height: 45px;
                text-align: center;
                /* padding: 20px 30px; */
                font-weight: bold !important;
                margin-left: 10px;
            }



            h1 {
                color: #333333;
                text-align: center;
                margin-bottom: 20px;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                overflow-x: auto;
            }


            th,
            td {
                color: white;
                border-bottom: 1px solid white;
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

            button {
                background-color: #13DF40;
                color: black;
                height: 40px;
                padding: 8px 27px;
                font-weight: bold;
                cursor: pointer;
                border-radius: 5px;
                border: none;
                font-size: 14px;
            }

            a {
                text-decoration: none;
                background-color: #FF9E49;
                color: black;
                padding: 8px 35px;
                font-weight: bold;
                cursor: pointer;
                border-radius: 5px;
                border: none;
                font-size: 14px;
            }

            .edit-simpan {
                background-color: #FF9E49;
                color: black;
                padding: 8px 35px;
                font-weight: bold;
                cursor: pointer;
                border-radius: 5px;
                border: none;
                font-size: 14px;
            }

            .anggaran {
                background: transparent;
                border: 1px solid white;
                border-radius: 5px;
                padding: 3px 3px;
                height: 40px;
                color: white;
                text-align: center;
            }

            input[type="number"]:focus {
                border-color: none;
            }

            /* Gaya untuk modal */
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: -10%;
                width: 100%;
                height: 100%;
                overflow: auto;
                /* background-color: yellow; */

            }

            .modal-konten {
                background-color: #fefefe;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 100%;
                max-width: 500px;
                display: flex;
                flex-direction: column;
                border-radius: 5px;
                box-sizing: border-box;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
                cursor: pointer;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .kop-surat {
                display: none;
            }

            .bobot {
                text-align: center;
                padding-top: 5px;
                width: 110px;
                height: 30px;
                font-size: 13px;
                color: white;
                border: 1px solid;
                border-color: white;
                border-radius: 10px;
            }

            .persen {
                text-align: center;
                padding-top: 5px;
                width: 55px;
                font-size: 13px;
                height: 30px;
                color: white;
                border: 1px solid;
                border-color: white;
                border-radius: 10px;
            }

            .ubah-bobot {
                margin-bottom: 10px;
                padding-top: 5px;
                text-align: center;
                width: 120px;
                border: 2px solid;
                border-color: black;
                border-radius: 10px;
                height: 37px;
            }

            .ubah-persen {
                margin-bottom: 10px;
                margin-right: 20px;
                padding-top: 5px;
                width: 80px;
                text-align: center;
                border: 2px solid;
                border-color: black;
                border-radius: 10px;
                height: 37px;
            }



            /* Tampilkan elemen "kop-surat" saat mencetak */
            @media print {
                .kop-surat {
                    height: 200px;
                    display: block;
                    /* Tambahkan gaya CSS untuk tampilan kop surat saat mencetak */
                    /* Contoh: */
                    padding: 20px;
                    /* Ganti "path/ke/gambar/kop_surat.png" dengan lokasi gambar sesuai dengan struktur website Anda */
                    background-image: url('path/ke/gambar/kop_surat.png');
                    /* Ganti dengan path gambar yang sesuai */
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: contain;
                    /* Sesuaikan dengan ukuran gambar Anda */
                    border-bottom: 2px solid #333333;
                }
            }
        </style>
    </head>

    <body>
        <div>
            <header class="d-flex justify-content-between">
                <img src="image/bmbklogo.png" style="width:40px">
                <h1 class="fs-1 fw-bold text-light text-center">Tabel Penghitungan Dana Anggaran</h1>
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-danger" type="submit">Logout</button>
                </form>
                {{-- <a href="{{ route('login') }}" class="btn bg-danger">Logout</a> --}}
            </header>

            <div class="container-fluid">
                <div class="kop-surat"></div>


                <!-- Tampilkan tombol untuk membuka modal -->



                <!-- Modal -->
                <div id="modal" class="modal">
                    <div class="modal-konten">
                        <span class="close d-flex justify-content-end" onclick="closeModal()">&times;</span>
                        <div class="d-flex justify-content-between mx-5">
                            <h6 style="margin-left:30px">Minimal</h6>
                            <h6 style="margin-right:30px">Maksimal</h6>
                            <h6 style="margin-right:65px">%</h6>
                        </div>
                        <div class="d-flex justify-content-center ">

                            <div>
                                <form action="{{ route('tahap.dua.updateFunction') }}" method="POST">
                                    @csrf
                                    @foreach ($functions as $key => $function)
                                    <div>
                                        <label for="threshold{{ $key }}">{{ $key + 1 }}</label>
                                        <input class="ubah-persen" type="number" name="functions[{{ $key }}][threshold]" id="threshold{{ $key }}" min="0" value="{{ $function['threshold'] }}" required>
                                        <input class="ubah-persen" type="number" name="functions[{{ $key }}][weight]" id="weight{{ $key }}" min="0" max="100" value="{{ $function['weight'] }}" required>
                                        <input class="ubah-bobot" type="number" name="functions[{{ $key }}][prs]" id="prs{{ $key }}" min="0" max="100" value="{{ $function['prs'] }}" required>
                                    </div>
                                    @endforeach
                                    <div class="d-flex justify-content-center mt-3">
                                        <button class="edit-simpan" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    {{-- <button onclick="printTable()">unduh pdf</button> --}}
                    <div>
                        <form class="d-flex" action="{{ route('tahap.dua.calculateBudget') }}" method="POST">
                            @csrf
                            <p class="text-light me-3" style="margin-top:5px;">Masukkan Dana Anggaran</p>
                            <input type="number" class="me-3 anggaran" id="budget" name="budget" placeholder="masukkan anggaran ">

                            @foreach ($functions as $key => $function)
                                {{-- <label for="threshold{{ $key }}">{{ $key + 1 }}</label> --}}
                                <input class="ubah-persen" type="hidden" name="functions[{{ $key }}][threshold]" id="threshold{{ $key }}" min="0" value="{{ $function['threshold'] }}" required>
                                <input class="ubah-persen" type="hidden" name="functions[{{ $key }}][weight]" id="weight{{ $key }}" min="0" max="100" value="{{ $function['weight'] }}" required>
                                <input class="ubah-bobot" type="hidden" name="functions[{{ $key }}][prs]" id="prs{{ $key }}" min="0" max="100" value="{{ $function['prs'] }}" required>
                            @endforeach

                            {{-- <button onclick="calculateBudget()">Hitung Dana Anggaran</button> --}}
                            <button type="submit">Hitung Dana Anggaran</button>
                        </form>
                    </div>

                    <button class="edit-simpan" onclick="openModal()">Edit </button>
                </div>

                <!-- Tempat Pengelompokan Bobot--->
                <div>

                    <div class="d-flex justify-content-between">

                        <div class="d-flex">
                            <div class="bobot me-3">
                                <p>{{$functions[0]['threshold']}}-{{$functions[0]['weight']}}</p>
                            </div>
                            <div>
                                <p class="persen">{{$functions[0]['prs']}}%</p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="table-responsive table-wrapper mb-3">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruas</th>
                                    <th>Panjang (Km) </th>
                                    <th>Kondisi Tidak Mantap (Km) </th>
                                    <th>Kondisi Tidak Mantap (%) </th>
                                    <th>Dana Anggaran </th>

                                    <!-- Add more header columns if needed -->
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($variabels as $variabel)
                                @if ($variabel['total'] >= $functions[0]['threshold'] && $variabel['total'] <= $functions[0]['weight']) <tr>
                                    <td>{{ $variabel->no }}</td>
                                    <td>{{ $variabel->nama_ruas }}</td>
                                    <td>{{ $variabel->panjang_ruas }}</td>
                                    <td>{{ $variabel->pr_tidak_mantap }}</td>
                                    <td>{{ $variabel->persen_tidak_mantap }}</td>
                                    <td>{{ $variabel->dana_anggaran }}</td>

                                    <!-- Add more data columns if needed -->
                                    </tr>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div> --}}

                    <div class="table-responsive table-wrapper mb-3">
                        <table id="data-table">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Nama Ruas</th>
                               <th>Panjang Ruas</th>
                               <th>Total</th>
                               <th>Dana Anggaran</th>
                               <th>Bobot (%)</th>
                               <th>Kondisi Tidak Mantap (Km)</th>
                               <th>Persen Tidak Mantap</th>
                               {{-- <th>Inputan Anggaran</th> --}}
                           </tr>
                       </thead>
                       <tbody>
                       @foreach($variabels as $variabel)
                       @if ($variabel['total'] >= $functions[0]['threshold'] && $variabel['total'] <= $functions[0]['weight'])
                       <tr>
                       <td>{{ $variabel['no'] }}</td>
                       <td>{{ $variabel['nama_ruas'] }}</td>
                       <td>{{ $variabel['panjang_ruas'] }}</td>
                       <td>{{ $variabel['total'] }}</td>
                       <td>{{$variabel['dana_anggaran']}}</td>
                       <td>{{ $variabel['bobot'] }}%</td>
                       <td>{{ $variabel['pr_tidak_mantap'] }}</td>
                       <td id="pr-tidak-mantap-{{ $variabel['no'] }}">{{ $variabel['pr_tidak_mantap'] }}</td>
                       <!-- Kolom "Dana Anggaran" yang akan diisi hasil perhitungan -->
                       {{-- <td>{{ $variabel['inputted_budget'] }}</td> --}}
                       </tr>
                       @endif
                       @endforeach
                       </tbody>
                       </table>
                   </div>

                    <div>

                        <div class="d-flex">
                            <div class="bobot me-3">
                                <p>{{$functions[1]['threshold']}}-{{$functions[1]['weight']}}</p>
                            </div>
                            <div>
                                <p class="persen">{{$functions[1]['prs']}}%</p>
                            </div>
                        </div>

                        {{-- <div class="table-responsive table-wrapper mb-3">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruas</th>
                                        <th>Panjang (Km) </th>
                                        <th>Kondisi Tidak Mantap (Km) </th>
                                        <th>Kondisi Tidak Mantap (%) </th>
                                        <th>Dana Anggaran </th>

                                        <!-- Add more header columns if needed -->
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($variabels as $variabel)
                                    @if ($variabel['total'] >= $functions[1]['threshold'] && $variabel['total'] <= $functions[1]['weight']) <tr>
                                        <td>{{ $variabel->no }}</td>
                                        <td>{{ $variabel->nama_ruas }}</td>
                                        <td>{{ $variabel->panjang_ruas }}</td>
                                        <td>{{ $variabel->pr_tidak_mantap }}</td>
                                        <td>{{ $variabel->persen_tidak_mantap }}</td>
                                        <td>{{ $variabel->dana_anggaran }}</td>

                                        <!-- Add more data columns if needed -->
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div> --}}

                        <div class="table-responsive table-wrapper mb-3">
                            <table id="data-table">
                           <thead>
                               <tr>
                                <th>No</th>
                                <th>Nama Ruas</th>
                                <th>Panjang Ruas</th>
                                <th>Total</th>
                                <th>Dana Anggaran</th>
                                <th>Bobot (%)</th>
                                <th>Kondisi Tidak Mantap (Km)</th>
                                <th>Persen Tidak Mantap</th>
                                {{-- <th>Inputan Anggaran</th> --}}
                               </tr>
                           </thead>
                           <tbody>
                           @foreach($variabels as $variabel)
                           @if ($variabel['total'] >= $functions[1]['threshold'] && $variabel['total'] <= $functions[1]['weight'])
                           <tr>
                            <td>{{ $variabel['no'] }}</td>
                            <td>{{ $variabel['nama_ruas'] }}</td>
                            <td>{{ $variabel['panjang_ruas'] }}</td>
                            <td>{{ $variabel['total'] }}</td>
                            <td>{{$variabel['dana_anggaran']}}</td>
                            <td>{{ $variabel['bobot'] }}%</td>
                            <td>{{ $variabel['pr_tidak_mantap'] }}</td>
                            <td id="pr-tidak-mantap-{{ $variabel['no'] }}">{{ $variabel['pr_tidak_mantap'] }}</td>
                            <!-- Kolom "Dana Anggaran" yang akan diisi hasil perhitungan -->
                            {{-- <td>{{ $variabel['inputted_budget'] }}</td> --}}
                           </tr>
                           @endif
                           @endforeach
                           </tbody>
                           </table>
                       </div>

                    </div>
                    <div>

                        <div class="d-flex">
                            <div class="bobot me-3">
                                <p>{{$functions[2]['threshold']}}-{{$functions[2]['weight']}}</p>
                            </div>
                            <div>
                                <p class="persen">{{$functions[2]['prs']}}%</p>
                            </div>
                        </div>

                        {{-- <div class="table-responsive table-wrapper mb-3">
                             <table id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruas</th>
                                    <th>P.R Tidak Mantap</th>
                                    <th>Total</th>
                                    <th>Bobot (%)</th>
                                    <th>Persen Tidak Mantap</th>
                                    <th>Dana Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($variabels as $variabel)
                            <tr>
                                <td>{{ $variabel['no'] }}</td>
                            <td>{{ $variabel['nama_ruas'] }}</td>
                            <td>{{ $variabel['pr_tidak_mantap'] }}</td>
                            <td>{{ $variabel['total'] }}</td>
                            <td>{{ $variabel['bobot'] }}%</td>
                            <td id="pr-tidak-mantap-{{ $variabel['no'] }}">{{ $variabel['pr_tidak_mantap'] }}</td>
                            <!-- Kolom "Dana Anggaran" yang akan diisi hasil perhitungan -->
                            <td>{{$variabel['dana_anggaran']}}</td>
                            <td>{{ $variabel['inputted_budget'] }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div> --}}
                        <div class="table-responsive table-wrapper mb-3">
                            <table id="data-table">
                           <thead>
                               <tr>
                                <th>No</th>
                                <th>Nama Ruas</th>
                                <th>Panjang Ruas</th>
                                <th>Total</th>
                                <th>Dana Anggaran</th>
                                <th>Bobot (%)</th>
                                <th>Kondisi Tidak Mantap (Km)</th>
                                <th>Persen Tidak Mantap</th>
                                {{-- <th>Inputan Anggaran</th> --}}
                               </tr>
                           </thead>
                           <tbody>
                           @foreach($variabels as $variabel)
                           @if ($variabel['total'] >= $functions[2]['threshold'] && $variabel['total'] <= $functions[2]['weight'])
                           <tr>
                            <td>{{ $variabel['no'] }}</td>
                            <td>{{ $variabel['nama_ruas'] }}</td>
                            <td>{{ $variabel['panjang_ruas'] }}</td>
                            <td>{{ $variabel['total'] }}</td>
                            <td>{{$variabel['dana_anggaran']}}</td>
                            <td>{{ $variabel['bobot'] }}%</td>
                            <td>{{ $variabel['pr_tidak_mantap'] }}</td>
                            <td id="pr-tidak-mantap-{{ $variabel['no'] }}">{{ $variabel['pr_tidak_mantap'] }}</td>
                            <!-- Kolom "Dana Anggaran" yang akan diisi hasil perhitungan -->
                            {{-- <td>{{ $variabel['inputted_budget'] }}</td> --}}
                           </tr>
                           @endif
                           @endforeach
                           </tbody>
                           </table>
                       </div>

                    </div>
                    <div>

                        <div class="d-flex">
                            <div class="bobot me-3">
                                <p>{{$functions[3]['threshold']}}-{{$functions[3]['weight']}}</p>
                            </div>
                            <div>
                                <p class="persen">{{$functions[3]['prs']}}%</p>
                            </div>
                        </div>

                        {{-- <div class="table-responsive table-wrapper mb-3">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruas</th>
                                        <th>Panjang (Km) </th>
                                        <th>Kondisi Tidak Mantap (Km) </th>
                                        <th>Kondisi Tidak Mantap (%) </th>
                                        <th>Dana Anggaran </th>

                                        <!-- Add more header columns if needed -->
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($variabels as $variabel)
                                    @if ($variabel['total'] >= $functions[3]['threshold'] && $variabel['total'] <= $functions[3]['weight']) <tr>
                                        <td>{{ $variabel->no }}</td>
                                        <td>{{ $variabel->nama_ruas }}</td>
                                        <td>{{ $variabel->panjang_ruas }}</td>
                                        <td>{{ $variabel->pr_tidak_mantap }}</td>
                                        <td>{{ $variabel->persen_tidak_mantap }}</td>
                                        <td>{{ $variabel->dana_anggaran }}</td>

                                        <!-- Add more data columns if needed -->
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div> --}}

                        <div class="table-responsive table-wrapper mb-3">
                            <table id="data-table">
                           <thead>
                               <tr>
                                <th>No</th>
                                <th>Nama Ruas</th>
                                <th>Panjang Ruas</th>
                                <th>Total</th>
                                <th>Dana Anggaran</th>
                                <th>Bobot (%)</th>
                                <th>Kondisi Tidak Mantap (Km)</th>
                                <th>Persen Tidak Mantap</th>
                                {{-- <th>Inputan Anggaran</th> --}}
                               </tr>
                           </thead>
                           <tbody>
                           @foreach($variabels as $variabel)
                           @if ($variabel['total'] >= $functions[3]['threshold'] && $variabel['total'] <= $functions[3]['weight'])
                           <tr>
                            <td>{{ $variabel['no'] }}</td>
                            <td>{{ $variabel['nama_ruas'] }}</td>
                            <td>{{ $variabel['panjang_ruas'] }}</td>
                            <td>{{ $variabel['total'] }}</td>
                            <td>{{$variabel['dana_anggaran']}}</td>
                            <td>{{ $variabel['bobot'] }}%</td>
                            <td>{{ $variabel['pr_tidak_mantap'] }}</td>
                            <td id="pr-tidak-mantap-{{ $variabel['no'] }}">{{ $variabel['pr_tidak_mantap'] }}</td>
                            <!-- Kolom "Dana Anggaran" yang akan diisi hasil perhitungan -->
                            {{-- <td>{{ $variabel['inputted_budget'] }}</td> --}}
                           </tr>
                           @endif
                           @endforeach
                           </tbody>
                           </table>
                       </div>

                    </div>
                    <!-- Tampilkan tombol untuk mengurutkan data -->

                    <!-- Tampilkan data variabel dengan bobot yang telah dihitung -->
                    {{--
                    <table id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruas</th>
                                    <th>P.R Tidak Mantap</th>
                                    <th>Total</th>
                                    <th>Bobot (%)</th>
                                    <th>Persen Tidak Mantap</th>
                                    <th>Dana Anggaran</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($variabels as $variabel)
                    <tr>
                        <td>{{ $variabel['no'] }}</td>
                    <td>{{ $variabel['nama_ruas'] }}</td>
                    <td>{{ $variabel['pr_tidak_mantap'] }}</td>
                    <td>{{ $variabel['total'] }}</td>
                    <td>{{ $variabel['bobot'] }}%</td>
                    <td id="pr-tidak-mantap-{{ $variabel['no'] }}">{{ $variabel['pr_tidak_mantap'] }}</td>
                    <!-- Kolom "Dana Anggaran" yang akan diisi hasil perhitungan -->
                    <td>{{$variabel['dana_anggaran']}}</td>
                    <td>{{ $variabel['inputted_budget'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    --}}
                </div>


            </div>

            <div class="d-flex mx-3 my-5">
                <a href="/variabels">Kembali</a>
            </div>

            <!-- Script JavaScript untuk modal, pengurutan data, dan unduhan PDF -->
            <script>
                function printTable() {
                    window.print();
                }

                function openModal() {
                    var modal = document.getElementById('modal');
                    modal.style.display = 'block';
                }

                function closeModal() {
                    var modal = document.getElementById('modal');
                    modal.style.display = 'none';
                }

                function sortDataByBobot() {
                    var table = document.querySelector('#data-table');
                    var tbody = table.querySelector('tbody');

                    var rows = Array.from(tbody.getElementsByTagName('tr'));

                    rows.sort(function(a, b) {
                        var bobotA = parseFloat(a.cells[4].textContent.replace('%', ''));
                        var bobotB = parseFloat(b.cells[4].textContent.replace('%', ''));
                        return bobotB - bobotA;
                    });

                    for (var i = 0; i < rows.length; i++) {
                        tbody.appendChild(rows[i]);
                    }
                }

                function calculatePrTidakMantap() {
                    var rows = Array.from(document.querySelectorAll('#data-table tbody tr'));

                    rows.forEach(function(row) {
                        var prTidakMantap = parseFloat(row.querySelector('td:nth-child(7)').textContent);
                        var bobot = parseFloat(row.querySelector('td:nth-child(6)').textContent.replace('%', '')) / 100;

                        var totalPrTidakMantap = rows.reduce(function(acc, r) {
                            var bobotR = parseFloat(r.querySelector('td:nth-child(6)').textContent.replace('%',
                                '')) / 100;
                            if (bobot === bobotR) {
                                var prTidakMantapR = parseFloat(r.querySelector('td:nth-child(7)').textContent);
                                return acc + prTidakMantapR;
                            } else {
                                return acc;
                            }
                        }, 0);

                        var persenTidakMantap = (prTidakMantap / totalPrTidakMantap) * 100;
                        var persenTidakMantapCell = row.querySelector('td:nth-child(8)');
                        persenTidakMantapCell.textContent = persenTidakMantap.toFixed(2) + '%';
                    });
                }

                // function calculatePrTidakMantap() {
                //     var rows = Array.from(document.querySelectorAll('#data-table tbody tr'));

                //     rows.forEach(function(row) {
                //         var prTidakMantap = parseFloat(row.querySelector('td:nth-child(3)').textContent);
                //         var bobot = parseFloat(row.querySelector('td:nth-child(5)').textContent.replace('%', '')) / 100;

                //         var totalPrTidakMantap = rows
                //             .filter(function(r) {
                //                 var bobotR = parseFloat(r.querySelector('td:nth-child(5)').textContent.replace('%', '')) / 100;
                //                 return bobot === bobotR;
                //             })
                //             .reduce(function(acc, r) {
                //                 var prTidakMantapR = parseFloat(r.querySelector('td:nth-child(3)').textContent);
                //                 return acc + prTidakMantapR;
                //             }, 0);

                //         var persenTidakMantap = (prTidakMantap / totalPrTidakMantap) * 100;
                //         var persenTidakMantapCell = row.querySelector('td:nth-child(6)');
                //         persenTidakMantapCell.textContent = persenTidakMantap.toFixed(2) + '%';
                //     });
                // }







                window.addEventListener('DOMContentLoaded', function() {
                    calculatePrTidakMantap();
                });

                function formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(number);
                }

                function calculateBudget() {
                    var budgetInput = document.getElementById('budget');
                    var budget = parseFloat(budgetInput.value.replace(/,/g, ''));

                    // Send a POST request to the server to calculate the budget and save it to the database
                    fetch('/calculate-budget', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                budget: budget
                            })
                        })
                        .then(response => {
                            // Check if the response has a successful status
                            if (!response.ok) {
                                throw new Error('Network response was not ok.');
                            }
                            return response.json(); // Parse the response as JSON
                        })
                        .then(data => {
                            // If the budget calculation and database update were successful, alert the message
                            if (data.status === 'success') {
                                alert('Dana Anggaran successfully calculated and updated.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }

                function updateDanaAnggaranInDatabase(variabelId, danaAnggaran, danaAnggaranCell) {
                    // Send a POST request to the server to update the value in the database
                    fetch('/update-dana-anggaran', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Assuming you're using Blade templating engine with Laravel, otherwise adjust accordingly
                            },
                            body: JSON.stringify({
                                variabelId: variabelId,
                                danaAnggaran: danaAnggaran
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            // If the update was successful, update the cell in the table
                            if (data.status === 'success') {
                                danaAnggaranCell.textContent = formatRupiah(data.danaAnggaran.toFixed(2));
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            </script>

@if(isset($danaBerhasil))
<script>alert('Dana Anggaran successfully calculated and updated.');</script>
@endif

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
            </script>
    </body>

    </html>