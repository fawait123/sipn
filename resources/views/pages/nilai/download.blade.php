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
</head>

<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <p>Nama Peserta Didik</p>
                        <p>Bidang Studi Keahlian</p>
                        <p>Tahun Ajaran</p>
                    </div>
                    <div class="col-6">
                        <p>: {{ $siswa->nm_siswa }}</p>
                        <p>: {{ $siswa->prodi->kompetensi }}</p>
                        <p>: {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <p>NIS/NISN</p>
                        <p>Semester</p>
                    </div>
                    <div class="col-6">
                        <p>: {{ $siswa->nis }}</p>
                        <p>: {{ $semester }}</p>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th>Matapelajaran</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            @php
                $total = 0;
                $jumlah = 0;
            @endphp
            <tbody>
                <tr>
                    <td><b>I</b></td>
                    <td colspan="3" class="text-bold"><b>Pengetahuan</b></td>
                </tr>
                @foreach ($pengetahuan as $item)
                    @php
                        $total += ($item->harian + $item->uts + $item->uas) / 3;
                        $jumlah += 1;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>&nbsp;&nbsp;&nbsp;{{ $item->mapel->nm_mapel ?? '' }}</td>
                        <td>{{ ($item->harian + $item->uts + $item->uas) / 3 }}</td>
                        <td>{{ grade(($item->harian + $item->uts + $item->uas) / 3) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td><b>II</b></td>
                    <td colspan="3" class="text-bold"><b>Keterampilan</b></td>
                </tr>
                @foreach ($keterampilan as $item)
                    @php
                        $total += ($item->proyek + $item->proses + $item->produk) / 3;
                        $jumlah += 1;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>&nbsp;&nbsp;&nbsp;{{ $item->mapel->nm_mapel ?? '' }}</td>
                        <td>{{ ($item->proyek + $item->proses + $item->produk) / 3 }}</td>
                        <td>{{ grade(($item->proyek + $item->proses + $item->produk) / 3) }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td><b>II</b></td>
                    <td colspan="3" class="text-bold"><b>Prakerin</b></td>
                </tr>
                @if (count($prakerin) > 0)
                    @foreach ($prakerin as $item)
                        @php
                            $total += $item->nm_du_di;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>&nbsp;&nbsp;&nbsp;{{ $item->lokasi ?? '' }}</td>
                            <td>{{ $item->nm_du_di }}</td>
                            <td>{{ grade($item->nm_du_di) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada nilai</td>
                    </tr>

                @endif
                <tr>
                    <td><b>III</b></td>
                    <td colspan="3" class="text-bold"><b>Sikap</b></td>
                </tr>
                @if (count($prakerin) > 0)
                    @foreach ($prakerin as $item)
                        @php
                            $total += $item->sikap;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>&nbsp;&nbsp;&nbsp;{{ $item->lokasi ?? 'Sikap' }}</td>
                            <td>{{ $item->sikap }}</td>
                            <td>{{ grade($item->sikap) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada nilai</td>
                    </tr>

                @endif
                <tr>
                    <td><b>IV</b></td>
                    <td colspan="3" class="text-bold"><b>Catatan</b></td>
                </tr>
                @if (count($catatan) > 0)
                    @foreach ($catatan as $item)
                        @php
                            $total += $item->catatan;
                            $jumlah += 1;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>&nbsp;&nbsp;&nbsp;{{ $item->lokasi ?? 'Catatan' }}</td>
                            <td>{{ $item->catatan }}</td>
                            <td>{{ grade($item->catatan) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">Tidak ada nilai</td>
                    </tr>

                @endif
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2">Jumlah</td>
                    <td>{{ $total }}</td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">Rata Rata</td>
                    <td>{{ $total / $jumlah }}</td>
                    <td colspan="1"></td>
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
@php
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
