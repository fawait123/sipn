@extends('layouts.app')


@section('content')
    <!-- content @s
        -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        @foreach ($guru as $row)
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Matapelajaran {{ $row->nm_guru }}</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Kamu mempunyai {{ count($row->gurumapel) }} matapelajaran yang di ampuh</p>
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
                                                    @if (auth()->user()->akses == 'guru')
                                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                                            <a href="{{ route('keterampilan.create') }}"
                                                                class="btn btn-primary"><em
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
                                    @foreach ($row->gurumapel as $item)
                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="project">
                                                        <div class="project-head">
                                                            <a href="{{ route('keterampilan.index') }}?kd_mapel={{ $item->kd_mapel }}"
                                                                class="project-title">
                                                                <div class="user-avatar sq bg-purple">
                                                                    <span>{{ $item->tingkat }}</span>
                                                                </div>
                                                                <div class="project-info">
                                                                    <h6 class="title">{{ $item->mapel->nm_mapel }}</h6>
                                                                    <span class="sub-text">{{ $item->tingkat }}</span>
                                                                </div>
                                                            </a>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1"
                                                                    data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a
                                                                                href="{{ route('keterampilan.index') }}?kd_mapel={{ $item->kd_mapel }}&tingkat={{ $item->tingkat }}&kelas={{ $item->kelas }}"><em
                                                                                    class="icon ni ni-eye"></em><span>Lihat
                                                                                    Nilai</span></a></li>
                                                                        @if (auth()->user()->akses == 'guru')
                                                                            <li><a
                                                                                    href="{{ route('keterampilan.create') }}?mapel={{ $item->kd_mapel }}&tingkat={{ $item->tingkat }}&kelas={{ $item->kelas }}"><em
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
                                                            <p>{{ $item->nm_guru }} kamu mengampuh
                                                                {{ $item->mapel->nm_mapel }} di
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
