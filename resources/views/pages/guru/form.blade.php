@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('guru.index') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ isset($id) ? 'Ubah' : 'Tambah' }} Data Guru</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{ isset($id) ? route('guru.update', $id) : route('guru.store') }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="nip">NIP</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" value="{{ isset($id) ? $guru->nip : '' }}"
                                                            class="form-control" id="nip" name="nip" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="nm_guru">Nama Guru</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $guru->nm_guru : '' }}" id="nm_guru"
                                                            name="nm_guru" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" name="tgl_lahir" class="form-control"
                                                            value="{{ isset($id) ? $guru->tgl_lahir : '' }}" required>
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
                                                                        {{ isset($id) ? ($guru->jk == 'laki-laki' ? 'checked' : '') : '' }}>
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
                                                                        {{ isset($id) ? ($guru->jk == 'perempuan' ? 'checked' : '') : '' }}>
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
                                                                {{ isset($id) ? ($guru->agama == 'islam' ? 'selected' : '') : '' }}>
                                                                Islam</option>
                                                            <option value="kristen"
                                                                {{ isset($id) ? ($guru->agama == 'kristen' ? 'selected' : '') : '' }}>
                                                                Kristen</option>
                                                            <option value="katholik"
                                                                {{ isset($id) ? ($guru->agama == 'katholik' ? 'selected' : '') : '' }}>
                                                                Katholik</option>
                                                            <option value="buddha"
                                                                {{ isset($id) ? ($guru->agama == 'buddha' ? 'selected' : '') : '' }}>
                                                                Buddha</option>
                                                            <option value="konghucu"
                                                                {{ isset($id) ? ($guru->agama == 'konghucu' ? 'selected' : '') : '' }}>
                                                                Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-subject">Tingkat</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $guru->tingkat : '' }}" id="fv-subject"
                                                            name="tingkat" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-topics">Kode Mata Pelajaran</label>
                                                    <div class="form-control-wrap ">
                                                        <select class="form-select js-select2" id="fv-topics"
                                                            name="kd_mapel" data-placeholder="Select a option" required>
                                                            <option label="empty" value=""></option>\
                                                            @foreach ($mapel as $item)
                                                                <option value="{{ $item->kd_mapel }}"
                                                                    {{ isset($id) ? ($guru->kd_mapel == $item->kd_mapel ? 'selected' : '') : '' }}>
                                                                    {{ $item->nm_mapel }}
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
                                                            required>{{ isset($id) ? $guru->alamat : '' }}</textarea>
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
