<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Rekap Nilai Siswa</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <form wire:submit.prevent="show(Object.fromEntries(new FormData($event.target)))">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <select name="semester" id="semester" class="form-control">
                                                    <option value="ganjil" selected>Ganjil</option>
                                                    <option value="genap">Genap</option>
                                                </select>
                                            </li>
                                            <li>
                                                <select name="tingkat" id="tingkat" class="form-control">
                                                    <option value="SD" selected>SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA</option>
                                                </select>
                                            </li>
                                            <li>
                                                <select name="kelas" id="kelas" class="form-control">
                                                    @for ($i = 1; $i < 7; $i++)
                                                        <option value="{{ $i }}">Kelas {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="#" class="btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <button class="btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-eye"></em><span>Lihat</span></button>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="#" class="btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                @if ($isShow)
                                                    {{-- <button wire:click="download"
                                                        class="btn btn-primary d-none d-md-inline-flex"><em
                                                            class="icon ni ni-download"></em><span>Download</span></button> --}}
                                                    <a href="{{ route('siswa.nilai.download') }}?semester={{ $semester }}&tingkat={{ $tingkat }}&kelas={{ $kelas }}"
                                                        class="btn btn-primary d-none d-md-inline-flex"><em
                                                            class="icon ni ni-download"></em><span>Download</span></a>
                                                @endif
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                @if ($isShow)
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-2">
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
                                                    <p>Tingkat / Kelas</p>
                                                </div>
                                                <div class="col-6">
                                                    <p>: {{ $siswa->nis }}</p>
                                                    <p>: {{ $semester }}</p>
                                                    <p>: {{ $tingkat }} / Kelas {{ $kelas }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $total = 0;
                                        $jumlah = 0;
                                    @endphp
                                    {{-- pengetahuan --}}
                                    <ol type="I">
                                        <li><b>I. Pengetahuan</b></li>
                                    </ol>
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
                                    <ol type="I">
                                        <li><b>II. Keterampilan</b></li>
                                    </ol>
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
                                    <ol type="I">
                                        <li><b>III. Prakerin</b></li>
                                    </ol>
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
                                    <ol type="I">
                                        <li><b>IV. Sikap</b></li>
                                    </ol>
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
                                    <ol type="I">
                                        <li><b>V. Catatan</b></li>
                                    </ol>
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
                                    <ol type="I">
                                        <li><b>VI. Ekstrakurikuler</b></li>
                                    </ol>
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
                                    <ol type="I">
                                        <li><b>VII. Absen</b></li>
                                    </ol>
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
                                    <br>
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
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                @endif
            </div>
        </div>
    </div>
</div>

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
