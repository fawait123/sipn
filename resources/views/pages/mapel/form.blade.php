@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('mapel.index') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">Tambah Data Mapel</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{ route('mapel.store') }}" method="POST" class="form-validate">
                                        @csrf
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="nm_mapel">Nama Mapel</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="nm_mapel"
                                                            name="nm_mapel" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kompetensi">Kompetensi</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="kompetensi"
                                                            name="kompetensi" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="tingkat">Tingkat</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="tingkat"
                                                            name="tingkat" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kelompok">Kelompok</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="kelompok"
                                                            name="kelompok" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kb_keterampilan">Kb Keterampilan</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="kb_keterampilan"
                                                            name="kb_keterampilan" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kb_pengetahuan">Kb Pengetahuan</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="kb_pengetahuan"
                                                            name="kb_pengetahuan" required>
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
