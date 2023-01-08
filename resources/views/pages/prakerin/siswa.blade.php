@extends('layouts.app')


@section('content')
    <!-- content @s
        -->
        @php
            use App\Models\Siswa;
            use App\Models\Prakerin;
            $no = 1;
        @endphp
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        @foreach ($wali as $row)
                            @php
                                $siswa = Siswa::where('tingkat', $row->tingkat)
                                    ->where('kd_prodi', $row->kd_prodi)
                                    ->where('kelas', $row->kelas)
                                    ->get();
                            @endphp
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Siswa Didik {{ $row->guru->nm_guru }}</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Kamu mempunyai {{ count($siswa) }} siswa didik</p>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    {{-- <li>
                                                        <div class="drodown">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                                data-bs-toggle="dropdown"><em
                                                                    class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered
                                                                    By</span><em
                                                                    class="dd-indc icon ni ni-chevron-right"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><span>Open</span></a></li>
                                                                    <li><a href="#"><span>Closed</span></a></li>
                                                                    <li><a href="#"><span>Onhold</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li> --}}
                                                    @if (auth()->user()->akses == 'wali')
                                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                                            <a href="{{ route('prakerin.create') }}" class="btn btn-primary"><em
                                                                    class="icon ni ni-plus"></em><span>Tambah Nilai</span></a>
                                                        </li>
                                                    @endif
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a href="#" class="btn btn-icon btn-primary"><em
                                                                class="icon ni ni-plus"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row g-gs">
                                    @foreach ($siswa as $item)
                                        @php
                                            $prakerin = Prakerin::where('kd_siswa', $item->kd_siswa)
                                                ->where('tingkat', $item->tingkat)
                                                ->where('kelas', $item->kelas)
                                                ->get();
                                        @endphp
                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="project">
                                                        <div class="project-head">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#modalZoom{{ $no }}"
                                                                class="project-title">
                                                                <div class="user-avatar sq bg-purple">
                                                                    <span>{{ $item->tingkat }}</span>
                                                                </div>
                                                                <div class="project-info">
                                                                    <h6 class="title">{{ $item->nm_siswa }}</h6>
                                                                    <span class="sub-text">Kelas {{ $item->kelas }}</span>
                                                                </div>
                                                            </a>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1"
                                                                    data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#" data-bs-toggle="modal"
                                                                                data-bs-target="#modalZoom{{ $no }}"><em
                                                                                    class="icon ni ni-eye"></em><span>Lihat
                                                                                    Nilai</span></a></li>
                                                                        @if (auth()->user()->akses == 'wali')
                                                                            <li><a
                                                                                    href="{{ route('prakerin.create') }}?siswa={{ $item->kd_siswa }}"><em
                                                                                        class="icon ni ni-edit"></em><span>Tambah
                                                                                        Nilai</span></a></li>
                                                                        @endif
                                                                        {{-- <li><a href="#"><em
                                                                                class="icon ni ni-check-round-cut"></em><span>Mark
                                                                                As Done</span></a></li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="project-details">
                                                            <p>{{ $row->guru->nm_guru }} kamu mempunyai siswa didik
                                                                {{ $item->nm_siswa }} di
                                                                tingkat
                                                                {{ $item->tingkat }} kelas {{ $item->kelas }}</p>
                                                        </div>
                                                        <div class="project-meta">
                                                            <span class="badge badge-dim bg-warning"><em
                                                                    class="icon ni ni-clock"></em><span>{{ $item->created_at->diffForHumans() }}</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Zoom -->
                                        <div class="modal fade zoom" tabindex="-1" id="modalZoom{{ $no }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Nilai
                                                            {{ $item->nm_siswa }}</h5>
                                                        <a href="#" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <em class="icon ni ni-cross"></em>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Tahun</th>
                                                                        <th scope="col">Semester</th>
                                                                        <th scope="col">NM DU DI</th>
                                                                        <th scope="col">Lokasi</th>
                                                                        <th scope="col">Lama</th>
                                                                        <th scope="col">Keterangan</th>
                                                                        @if (auth()->user()->akses == 'wali')
                                                                            <th scope="col">Aksi</th>
                                                                        @endif
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (count($prakerin) > 0)
                                                                        @foreach ($prakerin as $el)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ $loop->iteration }}
                                                                                </th>
                                                                                <td>{{ $el->kd_tahun }}</td>
                                                                                <td>{{ $el->semester }}</td>
                                                                                <td>{{ $el->nm_du_di }}</td>
                                                                                <td>{{ $el->lokasi }}</td>
                                                                                <td>{{ $el->lama }}</td>
                                                                                <td>{{ $el->keterangan }}</td>
                                                                                @if (auth()->user()->akses == 'wali')
                                                                                    <td>
                                                                                        <a
                                                                                            href="{{ route('prakerin.edit', $el->kd_npkl) }}">edit</a>
                                                                                        <a href="{{ route('prakerin.destroy', $el->kd_npkl) }}"
                                                                                            onclick="event.preventDefault(); document.getElementById('form-delete{{ $loop->iteration }}').submit()">hapus</a>
                                                                                        <form
                                                                                            action="{{ route('prakerin.destroy', $el->kd_npkl) }}"
                                                                                            id="form-delete{{ $loop->iteration }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            @method('delete')
                                                                                        </form>
                                                                                    </td>
                                                                                @endif
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td colspan="3" align="center">Tidak
                                                                                ada data</td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <span class="sub-text">Modal Footer Text</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                </div>
                            </div><!-- .nk-block -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
    @endsection
