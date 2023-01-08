<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Mata Pelajaran</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input wire:model="search" type="text" class="form-control"
                                                    id="default-04" placeholder="Quick search by id">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#"
                                                    class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                    data-bs-toggle="dropdown">Status</a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>New Items</span></a></li>
                                                        <li><a href="#"><span>Featured</span></a></li>
                                                        <li><a href="#"><span>Out of Stock</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em
                                                    class="icon ni ni-plus"></em></a>
                                            <a href="{{ route('guru.create') }}"
                                                class="btn btn-primary d-none d-md-inline-flex"><em
                                                    class="icon ni ni-plus"></em><span>Tambah</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <div class="nk-tb-list">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span>Kode guru</span></div>
                                        <div class="nk-tb-col"><span>NIP</span></div>
                                        <div class="nk-tb-col"><span>Nama guru</span></div>
                                        <div class="nk-tb-col"><span>Tanggal Lahir</span></div>
                                        <div class="nk-tb-col"><span>Jenis Kelamin</span></div>
                                        <div class="nk-tb-col"><span>Agama</span></div>
                                        <div class="nk-tb-col"><span>Alamat</span></div>
                                        <div class="nk-tb-col"><span>MataPelajaran</span></div>
                                        {{-- <div class="nk-tb-col"><span>Tingkat</span></div> --}}
                                        <div class="nk-tb-col"><span>Aksi</span></div>
                                    </div><!-- .nk-tb-item -->
                                    @if (count($query) > 0)
                                        @foreach ($query as $item)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->kd_guru }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->nip }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead">{{ $item->nm_guru }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->tgl_lahir }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->jk }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->agama }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->alamat }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub"><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalZoom{{ $loop->iteration }}">Detail</a></span>
                                                </div>
                                                {{-- <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->tingkat }}</span>
                                                </div> --}}
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="me-n1">
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a
                                                                                href="{{ route('guru.edit', $item->kd_guru) }}"><em
                                                                                    class="icon ni ni-edit"></em><span>Ubah</span></a>
                                                                        </li>
                                                                        {{-- <li><a href="#"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Product</span></a></li> --}}
                                                                        <li><a
                                                                                href="{{ route('guru.mapel.form', $item->kd_guru) }}"><em
                                                                                    class="icon ni ni-activity-round"></em><span>Tambah
                                                                                    Mapel</span></a></li>
                                                                        <li><a href="{{ route('guru.destroy', $item->kd_guru) }}"
                                                                                onclick="event.preventDefault(); document.getElementById('form-delete{{ $loop->iteration }}').submit()"><em
                                                                                    class="icon ni ni-trash"></em><span>Hapus</span></a>
                                                                        </li>

                                                                        <form
                                                                            action="{{ route('guru.destroy', $item->kd_guru) }}"
                                                                            id="form-delete{{ $loop->iteration }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->

                                            <!-- Modal Zoom -->
                                            <div class="modal fade zoom" tabindex="-1"
                                                id="modalZoom{{ $loop->iteration }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Mata Pelajaran
                                                                {{ $item->nm_guru }}</h5>
                                                            <a href="#" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Matapelajaran</th>
                                                                        <th scope="col">Tingkat</th>
                                                                        <th scope="col">Kelas</th>
                                                                        <th scope="col">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (count($item->gurumapel) > 0)
                                                                        @foreach ($item->gurumapel as $row)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ $loop->iteration }}
                                                                                </th>
                                                                                <td>{{ $row->mapel->nm_mapel }}</td>
                                                                                <td>{{ $row->tingkat }}</td>
                                                                                <td>{{ $row->kelas }}</td>
                                                                                <td>
                                                                                    <a
                                                                                        href="{{ route('guru.mapel.edit', $row->kd_gumap) }}">edit</a>
                                                                                    <a href="{{ route('guru.mapel.delete', $row->kd_gumap) }}"
                                                                                        class="text-danger"
                                                                                        onclick="event.preventDefault(); document.getElementById('form-delete-mapel{{ $loop->iteration }}').submit(); ">hapus</a>
                                                                                    <form
                                                                                        action="{{ route('guru.mapel.delete', $row->kd_gumap) }}"
                                                                                        id="form-delete-mapel{{ $loop->iteration }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        @method('delete')
                                                                                    </form>
                                                                                </td>
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
                                                        <div class="modal-footer bg-light">
                                                            <span class="sub-text">Modal Footer Text</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="nk-tb-col">
                                            <span class="tb-sub">Data tidak ditemukan</span>
                                        </div>
                                    @endif
                                </div><!-- .nk-tb-list -->
                            </div>
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        <ul class="pagination justify-content-center justify-content-md-start">
                                            {!! $query->links() !!}
                                        </ul><!-- .pagination -->
                                    </div>
                                    <div class="g">
                                        <div
                                            class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                            <div>Page</div>
                                            <div>
                                                <select wire:model="perPage" class="form-select js-select2"
                                                    data-search="on" data-dropdown="xs center">
                                                    <option value="10" selected>10</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            <div>DARI {{ $count }}</div>
                                        </div>
                                    </div><!-- .pagination-goto -->
                                </div><!-- .nk-block-between -->
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
