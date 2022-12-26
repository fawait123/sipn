@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('absen.wali') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ isset($id) ? 'Ubah' : 'Tambah' }} Data Nilai
                                    absen
                                </h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{ isset($id) ? route('absen.update', $id) : route('absen.store') }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_siswa">Kode Siswa</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ $siswa }}" id="kd_siswa" name="kd_siswa"
                                                            required readonly>
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
                                                                {{ isset($id) ? ($absen->semester == 'genap' ? 'selected' : '') : '' }}>
                                                                Genap</option>
                                                            <option value="ganjil"
                                                                {{ isset($id) ? ($absen->semester == 'ganjil' ? 'selected' : '') : '' }}>
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
                                                                    {{ isset($id) ? ($absen->kd_tahun == $item->kd_tahun ? 'selected' : '') : '' }}>
                                                                    {{ $item->th_ajaran }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- siswa --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="sakit">Sakit</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" value="{{ isset($id) ? $absen->sakit : '' }}"
                                                            class="form-control" id="sakit" name="sakit" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="izin">Izin</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $absen->izin : '' }}" id="izin"
                                                            name="izin" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="tanpa_ket">Tanpa Keterangan</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $absen->tanpa_ket : '' }}"
                                                            id="tanpa_ket" name="tanpa_ket" required>
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
