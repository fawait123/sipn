<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        thead>tr>th,
        thead>tr>td {
            padding: 10px
        }
    </style>
</head>

<body>
    @php
        $total = 0;
        $jumlah = 0;
        function grade($nilai)
        {
            switch ($nilai) {
                case $nilai > 70 && $nilai <= 100:
                    return 'Baik';
                    break;
                case $nilai > 50 && $nilai <= 70:
                    return 'Cukup Baik';
                    break;
                case $nilai > 40 && $nilai <= 50:
                    return 'Cukup';
                    break;
                default:
                    return 'Kurang Baik';
                    break;
            }
        }
    @endphp
    <div class="container">
        <div class="row mb-5" style="position: relative;">
            <div class="col-6" style="position: absolute; top:0; left:0">
                <div class="row" style="display: relative;">
                    <div class="col-6" style="position: absolute; top:0; left:0">
                        <p>Nama</p>
                        <p>Keahlian</p>
                        <p>Tahun Ajaran</p>
                    </div>
                    <div class="col-6" style="position: absolute; top:0; right:0">
                        <p>: {{ $siswa->nm_siswa }}</p>
                        <p>: {{ $siswa->prodi->kompetensi }}</p>
                        <p>: {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6" style="position: absolute; top:0; right:0">
                <div class="row" style="position: relative">
                    <div class="col-6" style="position: absolute; top:0; left:0">
                        <p>NIS/NISN</p>
                        <p>Semester</p>
                        <p>Tingkat / Kelas</p>
                    </div>
                    <div class="col-6" style="position: absolute; top:0; right:0">
                        <p>: {{ $siswa->nis }}</p>
                        <p>: {{ $semester }}</p>
                        <p>: {{ $tingkat }} / {{ $kelas }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- pengetahuan --}}
        <br>
        <br>
        <br>
        <h6>I. Pengetahuan</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Matapelajaran</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($pengetahuan) > 0)
                    @foreach ($pengetahuan as $item)
                        @php
                            $total += ($item->harian + $item->uts + $item->uas) / 3;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mapel->nm_mapel ?? '' }}</td>
                            <td>{{ ($item->harian + $item->uts + $item->uas) / 3 }}</td>
                            <td>{{ grade(($item->harian + $item->uts + $item->uas) / 3) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- keterampilan --}}
        <h6>II. Keterampilan</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Matapelajaran</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($keterampilan) > 0)
                    @foreach ($keterampilan as $item)
                        @php
                            $total += ($item->produk + $item->proses + $item->proyek) / 3;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mapel->nm_mapel ?? '' }}</td>
                            <td>{{ ($item->produk + $item->proses + $item->proyek) / 3 }}
                            </td>
                            <td>{{ grade(($item->produk + $item->proses + $item->proyek) / 3) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- prakerin --}}
        <h6>III. Prakerin</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Lokasi</th>
                    <th>Lama</th>
                    <th>NM DU DI</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($prakerin) > 0)
                    @foreach ($prakerin as $item)
                        @php
                            $total += $item->nm_du_di;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->lokasi ?? '' }}</td>
                            <td>{{ $item->lama }} Hari
                            </td>
                            <td>{{ $item->nm_du_di }}
                            </td>
                            <td>{{ grade($item->nm_du_di) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- sikap --}}
        <h6>IV. Sikap</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Wali</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($sikap) > 0)
                    @foreach ($sikap as $item)
                        @php
                            $total += $item->sikap;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->wali->guru->nm_guru ?? '' }}</td>

                            <td>{{ $item->sikap }}
                            </td>
                            <td>{{ grade($item->sikap) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- catatan --}}
        <h6>V. Catatan</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Wali</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($catatan) > 0)
                    @foreach ($catatan as $item)
                        @php
                            $total += $item->catatan;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->wali->guru->nm_guru ?? '' }}</td>

                            <td>{{ $item->catatan }}
                            </td>
                            <td>{{ grade($item->catatan) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- nilai ekstra kurikuler --}}
        <h6>VI. Ekstrakurikuler</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Ekskul</th>
                    <th>Predikat</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($ekskul) > 0)
                    @foreach ($ekskul as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->ekskul->nm_ekskul ?? '' }}</td>

                            <td>{{ $item->predikat }}
                            </td>
                            <td>{{ '-' }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{-- absen --}}
        <h6>VII. Absen</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Wali</th>
                    <th>Sakit</th>
                    <th>Ijin</th>
                    <th>Tanpa Keterangan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if (count($absen) > 0)
                    @foreach ($absen as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->wali->guru->nm_guru ?? '' }}</td>

                            <td>{{ $item->sakit }}
                            </td>
                            <td>{{ $item->izin }}
                            </td>
                            <td>{{ $item->tanpa_ket }}
                            </td>
                            <td>{{ '-' }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <br>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td align="right"><b>Jumlah</b></td>
                    <td align="left"><b>{{ $total }}</b></td>
                </tr>
                <tr>
                    <td align="right"><b>Rata Rata</b></td>
                    <td align="left"><b>{{ $total / $jumlah }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
