@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('pengetahuan.mapel') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ isset($id) ? 'Ubah' : 'Tambah' }} Data Nilai
                                    pengetahuan
                                </h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{ route('pengetahuan.update', $pengetahuan->kd_np) }}" method="POST"
                                        class="form-validate">
                                        @csrf
                                        @method('put')
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_mapel">Kode Mapel</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ $pengetahuan->kd_mapel }}" id="kd_mapel"
                                                            name="kd_mapel" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tingkat">Tingkat</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ $pengetahuan->tingkat }}" id="tingkat"
                                                            name="tingkat" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="semester">Semester</label>
                                                    <div class="form-control-wrap">
                                                        <select name="semester" id="semester" class="form-control"
                                                            required>
                                                            <option value="">pilih</option>
                                                            <option value="genap"
                                                                {{ $pengetahuan->semester == 'genap' ? 'selected' : '' }}>
                                                                Genap</option>
                                                            <option value="ganjil"
                                                                {{ $pengetahuan->semester == 'ganjil' ? 'selected' : '' }}>
                                                                Ganjil</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_tahun">Tahun Ajaran</label>
                                                    <div class="form-control-wrap">
                                                        <select name="kd_tahun" id="kd_tahun" class="form-control"
                                                            required>
                                                            <option value="">pilih</option>
                                                            @foreach ($ajaran as $item)
                                                                <option value="{{ $item->kd_tahun }}"
                                                                    {{ $pengetahuan->kd_tahun == $item->kd_tahun ? 'selected' : '' }}>
                                                                    {{ $item->th_ajaran }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- siswa --}}
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_siswa">Kd Siswa</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ $pengetahuan->kd_siswa }}" id="kd_siswa"
                                                            name="kd_siswa" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="nm_siswa">Nama Siswa</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ $pengetahuan->siswa->nm_siswa }}" id="nm_siswa"
                                                            name="nm_siswa" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="harian">Harian</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" value="{{ $pengetahuan->harian }}"
                                                            class="form-control" id="harian" name="harian" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="uts">UTS</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" value="{{ $pengetahuan->uts }}"
                                                            class="form-control" id="uts" name="uts" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="uas">UAS</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" value="{{ $pengetahuan->uas }}"
                                                            class="form-control" id="uas" name="uas" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-label" value="{{ $pengetahuan->deskripsi_k }}"
                                                        for="deskripsi">Keterangan</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" value=""
                                                            id="deskripsi" name="deskripsi_k">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end siswa --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
