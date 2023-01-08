@extends('layouts.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{ route('ekskul.index') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Form</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ isset($id) ? 'Ubah' : 'Tambah' }} Data Mata
                                    Pelajaran
                                    {{ $guru->nm_guru }}</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form
                                        action="{{ isset($id) ? route('guru.mapel.update', $id) : route('guru.mapel.action', $guru->kd_guru) }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_mapel">Kode Mata Pelajaran</label>
                                                    <select name="kd_mapel" id="kd_mapel" class="form-control" required>
                                                        <option value="">pilih</option>
                                                        @foreach ($mapel as $item)
                                                            <option value="{{ $item->kd_mapel }}"
                                                                {{ isset($id) ? ($guru->kd_mapel == $item->kd_mapel ? 'selected' : '') : '' }}>
                                                                {{ $item->nm_mapel }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="tingkat">Tingkatan</label>
                                                    <select name="tingkat" id="tingkat" class="form-control" required>
                                                        <option value="">pilih</option>
                                                        <option value="SD"
                                                            {{ isset($id) ? ($guru->tingkat == 'SD' ? 'selected' : '') : '' }}>
                                                            SD
                                                        </option>
                                                        <option value="SMP"
                                                            {{ isset($id) ? ($guru->tingkat == 'SMP' ? 'selected' : '') : '' }}>
                                                            SMP</option>
                                                        <option value="SMA"
                                                            {{ isset($id) ? ($guru->tingkat == 'SMA' ? 'selected' : '') : '' }}>
                                                            SMA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kelas">Kelas</label>
                                                    <select name="kelas" id="kelas" class="form-control" required>
                                                        <option value="">pilih</option>
                                                        @for ($i = 1; $i < 7; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
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

@push('customjs')
    <script>
        function getKelas(kelas) {
            let id = '{{ isset($id) ? $guru->kelas : null }}'
            let option = '<option value="">pilih</option>'
            if (kelas === 'SD') {
                for (let i = 1; i < 7; i++) {
                    option += `
                        <option value="${i}" ${id == i ? 'selected':''}>${i}</option>
                    `
                }
            } else if (kelas === 'SMP' || kelas === 'SMA') {
                for (let i = 1; i < 4; i++) {
                    option += `
                        <option value="${i}" ${id == i ? 'selected':''}>${i}</option>
                    `
                }
            } else {
                for (let i = 1; i < 7; i++) {
                    option += `
                        <option value="${i}" ${id == i ? 'selected':''}>${i}</option>
                    `
                }
            }
            $("#kelas").html(option);
        }
        $(document).ready(function() {
            $("#tingkat").on('change', function() {
                let val = $(this).val()
                getKelas(val)
            })

            let kelas = $("#tingkat").find(':selected').val()
            getKelas(kelas)
        })
    </script>
@endpush
