@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('wali.index') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ isset($id) ? 'Ubah' : 'Tambah' }} Data wali</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{ isset($id) ? route('wali.update', $id) : route('wali.store') }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_guru">Kode Guru</label>
                                                    <div class="form-control-wrap">
                                                        <select name="kd_guru" id="kd_guru" class="form-control" required>
                                                            <option value="">pilih</option>
                                                            @foreach ($guru as $item)
                                                                <option value="{{ $item->kd_guru }}"
                                                                    {{ isset($id) ? ($wali->kd_guru == $item->kd_guru ? 'selected' : '') : '' }}>
                                                                    {{ $item->nip . ' ' . $item->nm_guru }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_prodi">Kode Prodi</label>
                                                    <div class="form-control-wrap">
                                                        <select name="kd_prodi" id="kd_prodi" class="form-control"
                                                            required>
                                                            <option value="">pilih</option>
                                                            @foreach ($prodi as $item)
                                                                <option value="{{ $item->kd_prodi }}"
                                                                    {{ isset($id) ? ($wali->kd_prodi == $item->kd_prodi ? 'selected' : '') : '' }}>
                                                                    {{ $item->kd_prodi . ' ' . $item->kompetensi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tingkat">Tingkat</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ isset($id) ? $wali->tingkat : '' }}" id="tingkat"
                                                            name="tingkat" required>
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
