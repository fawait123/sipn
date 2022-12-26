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
                                    <form
                                        action="{{ isset($id) ? route('pengetahuan.update', $id) : route('pengetahuan.store') }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_mapel">Kode Mapel</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ $mapel }}" id="kd_mapel" name="kd_mapel"
                                                            required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tingkat">Tingkat</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            value="{{ $tingkat }}" id="tingkat" name="tingkat"
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
                                                            <option value="genap">Genap</option>
                                                            <option value="ganjil">Ganjil</option>
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
                                                                <option value="{{ $item->kd_tahun }}">{{ $item->th_ajaran }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- siswa --}}
                                            @php
                                                $no = 0;
                                                $no1 = 0;
                                                $no2 = 0;
                                                $no3 = 0;
                                            @endphp
                                            @foreach ($siswa as $item)
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kd_siswa">Kd Siswa</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->kd_siswa }}" id="kd_siswa"
                                                                name="kd_siswa[]" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nm_siswa">Nama Siswa</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->nm_siswa }}" id="nm_siswa"
                                                                name="nm_siswa[]" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="harian">Harian</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="harian"
                                                                name="harian[{{ $no++ }}]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="uts">UTS</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="uts"
                                                                name="uts[{{ $no1++ }}]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="uas">UAS</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="uas"
                                                                name="uas[{{ $no2++ }}]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="deskripsi">Keterangan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" value=""
                                                                id="deskripsi" name="deskripsi_k[{{ $no3++ }}]">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

@push('customjs')
    <script>
        $(document).ready(function() {
            // jQuery.validator.addMethod("allRequired", function(value, elem) {
            //     // Use the name to get all the inputs and verify them
            //     var name = elem.name;
            //     return $('input[name="' + name + '"]').map(function(i, obj) {
            //         return $(obj).val();
            //     }).get().every(function(v) {
            //         return v;
            //     });
            // });
            // jQuery('.form-validate-arr').validate({
            //     rules: {
            //         'proses[]': 'allRequired'
            //     }
            // })
        })
    </script>
@endpush
