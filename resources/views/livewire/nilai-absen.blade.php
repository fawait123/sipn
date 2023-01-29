<div>
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
                                    <form action="{{ isset($id) ? route('absen.update', $id) : route('absen.bulk') }}"
                                        method="POST" class="form-validate">
                                        @csrf
                                        @if (isset($id))
                                            @method('put')
                                        @endif
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_wali">Kode Wali</label>
                                                    <input type="text" name="kd_wali" value="{{ $kd_wali }}"
                                                        class="form-control" readonly required>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="semester">Tingkat</label>
                                                    <input type="text" name="tingkat" value="{{ $tingkat }}"
                                                        class="form-control" readonly required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="semester">Kelas</label>
                                                    <input type="text" name="kelas" value="{{ $kelas }}"
                                                        class="form-control" readonly required>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="semester">Semester</label>
                                                    <div class="form-control-wrap">
                                                        <select name="semester" id="semester" class="form-control"
                                                            required>
                                                            <option value="">pilih</option>
                                                            <option value="genap"
                                                                {{ isset($id) ? ($prakerin->semester == 'genap' ? 'selected' : '') : '' }}>
                                                                Genap</option>
                                                            <option value="ganjil"
                                                                {{ isset($id) ? ($prakerin->semester == 'ganjil' ? 'selected' : '') : '' }}>
                                                                Ganjil</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="kd_tahun">Tahun Ajaran</label>
                                                    <div class="form-control-wrap">
                                                        <select name="kd_tahun" id="kd_tahun" class="form-control"
                                                            required>
                                                            <option value="">pilih</option>
                                                            @foreach ($ajaran as $item)
                                                                <option value="{{ $item->kd_tahun }}"
                                                                    {{ isset($id) ? ($prakerin->kd_tahun == $item->kd_tahun ? 'selected' : '') : '' }}>
                                                                    {{ $item->th_ajaran }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- siswa --}}
                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($siswa as $item)
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kd_siswa">Kd Siswa</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" value="{{ $item->kd_siswa }}"
                                                                class="form-control" id="kd_siswa"
                                                                name="kd_siswa[{{ $no }}]" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nm_siswa">Nama Siswa</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" value="{{ $item->nm_siswa }}"
                                                                class="form-control" id="nm_siswa"
                                                                name="nm_siswa[{{ $no }}]" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sakit">Sakit</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text"
                                                                value="{{ isset($id) ? $absen->sakit : '' }}"
                                                                class="form-control" id="sakit"
                                                                name="sakit[{{ $no }}]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="izin">Izin</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                value="{{ isset($id) ? $absen->izin : '' }}"
                                                                id="izin" name="izin[{{ $no }}]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tanpa_ket">Tanpa
                                                            Keterangan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                value="{{ isset($id) ? $absen->tanpa_ket : '' }}"
                                                                id="tanpa_ket" name="tanpa_ket[{{ $no }}]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach
                                            {{-- end siswa --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-lg btn-primary">Simpan</button>
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
</div>
