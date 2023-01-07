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
                                                    <option value="ganjil">Ganjil</option>
                                                    <option value="genap">Genap</option>
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
                                                    <a href="{{ route('siswa.nilai.download') }}?semester={{$semester}}"
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
