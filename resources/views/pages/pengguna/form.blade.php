@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('pengguna.index') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ isset($id) ? 'Ubah' : 'Tambah' }} Data pengguna</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form
                                        action="{{ isset($id) ? route('pengguna.update', $id) : route('pengguna.store') }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="nm_pengguna">Nama pengguna</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $pengguna->nm_pengguna : '' }}"
                                                            id="nm_pengguna" name="nm_pengguna" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="username">Username</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $pengguna->username : '' }}"
                                                            id="username" name="username" required>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($id))
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="password">Update Password *(boleh
                                                            dikosongkan jika tidak ingin merubah password)</label>
                                                        <div class="form-control-wrap">
                                                            <input type="password" class="form-control" id="password"
                                                                name="new_password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control" id="password" name="password"
                                                    value="{{ $pengguna->password }}">
                                            @else
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="password">Password</label>
                                                        <div class="form-control-wrap">
                                                            <input type="password" class="form-control" id="password"
                                                                name="password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="akses">Akses</label>
                                                    <div class="form-control-wrap">
                                                        <select name="akses" id="akses" class="form-control" required>
                                                            <option value="">pilih</option>
                                                            <option value="admin"
                                                                {{ isset($id) ? ($pengguna->akses == 'admin' ? 'selected' : '') : '' }}>
                                                                Admin</option>
                                                            <option value="siswa"
                                                                {{ isset($id) ? ($pengguna->akses == 'siswa' ? 'selected' : '') : '' }}>
                                                                Siswa</option>
                                                            <option value="wali"
                                                                {{ isset($id) ? ($pengguna->akses == 'wali' ? 'selected' : '') : '' }}>
                                                                Wali</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="aktif">Aktif</label>
                                                    <div class="form-control-wrap">
                                                        <select name="aktif" id="aktif" class="form-control" required>
                                                            <option value="">pilih</option>
                                                            <option value="1"
                                                                {{ isset($id) ? ($pengguna->aktif == '1' ? 'selected' : '') : '' }}>
                                                                Aktif</option>
                                                            <option value="0"
                                                                {{ isset($id) ? ($pengguna->aktif == '0' ? 'selected' : '') : '' }}>
                                                                Tidak Aktif</option>
                                                        </select>
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
