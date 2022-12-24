@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('siswa.index') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ isset($id) ? 'Ubah' : 'Tambah' }} Data Siswa</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{ isset($id) ? route('siswa.update', $id) : route('siswa.store') }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="nis">NIS</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" value="{{ isset($id) ? $siswa->nis : '' }}"
                                                            class="form-control" id="nis" name="nis" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="nm_siswa">Nama Siswa</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $siswa->nm_siswa : '' }}" id="nm_siswa"
                                                            name="nm_siswa" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" name="tgl_lahir" class="form-control"
                                                            value="{{ isset($id) ? $siswa->tgl_lahir : '' }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="jk">Jenis Kelamin</label>
                                                    <div class="form-control-wrap">
                                                        <ul class="custom-control-group">
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="jk" id="sex-male" value="laki-laki"
                                                                        required
                                                                        {{ isset($id) ? ($siswa->jk == 'laki-laki' ? 'checked' : '') : '' }}>
                                                                    <label class="custom-control-label" for="sex-male">Laki
                                                                        Laki</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-pro no-control">
                                                                    <input type="radio" class="custom-control-input"
                                                                        name="jk" id="sex-female" value="perempuan"
                                                                        required
                                                                        {{ isset($id) ? ($siswa->jk == 'perempuan' ? 'checked' : '') : '' }}>
                                                                    <label class="custom-control-label"
                                                                        for="sex-female">Perempuan</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-topics">Agama</label>
                                                    <div class="form-control-wrap ">
                                                        <select class="form-select js-select2" id="fv-topics" name="agama"
                                                            data-placeholder="Select a option" required>
                                                            <option label="empty" value=""></option>
                                                            <option value="islam"
                                                                {{ isset($id) ? ($siswa->agama == 'islam' ? 'selected' : '') : '' }}>
                                                                Islam</option>
                                                            <option value="kristen"
                                                                {{ isset($id) ? ($siswa->agama == 'kristen' ? 'selected' : '') : '' }}>
                                                                Kristen</option>
                                                            <option value="katholik"
                                                                {{ isset($id) ? ($siswa->agama == 'katholik' ? 'selected' : '') : '' }}>
                                                                Katholik</option>
                                                            <option value="buddha"
                                                                {{ isset($id) ? ($siswa->agama == 'buddha' ? 'selected' : '') : '' }}>
                                                                Buddha</option>
                                                            <option value="konghucu"
                                                                {{ isset($id) ? ($siswa->agama == 'konghucu' ? 'selected' : '') : '' }}>
                                                                Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="tingkat">Tingkat</label>
                                                    <div class="form-control-wrap">
                                                        <select name="tingkat" id="tingkat" class="form-control" required>
                                                            <option value="">pilih</option>
                                                            <option value="SD"
                                                                {{ isset($id) ? ($siswa->tingkat == 'SD' ? 'selected' : '') : '' }}>
                                                                SD</option>
                                                            <option value="SMP"
                                                                {{ isset($id) ? ($siswa->tingkat == 'SMP' ? 'selected' : '') : '' }}>
                                                                SMP</option>
                                                            <option value="SMA"
                                                                {{ isset($id) ? ($siswa->tingkat == 'SMA' ? 'selected' : '') : '' }}>
                                                                SMA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-subject">Nama Orang Tua</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $siswa->nm_ortu : '' }}"
                                                            id="fv-subject" name="nm_ortu" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-topics">Kode Prodi</label>
                                                    <div class="form-control-wrap ">
                                                        <select class="form-select js-select2" id="fv-topics"
                                                            name="kd_prodi" data-placeholder="Select a option" required>
                                                            <option label="empty" value=""></option>\
                                                            @foreach ($prodi as $item)
                                                                <option value="{{ $item->kd_prodi }}"
                                                                    {{ isset($id) ? ($siswa->kd_prodi == $item->kd_prodi ? 'selected' : '') : '' }}>
                                                                    {{ $item->kompetensi . ' ' . $item->kd_prodi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-message">Alamat</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control-sm" id="fv-message" name="alamat" placeholder="Write your message"
                                                            required>{{ isset($id) ? $siswa->alamat : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
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
