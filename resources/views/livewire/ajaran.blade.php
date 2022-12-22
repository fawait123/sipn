<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">ajaran</h3>
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
                                            <a href="{{ route('ajaran.create') }}"
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
                                        <div class="nk-tb-col"><span>Kode ajaran</span></div>
                                        <div class="nk-tb-col"><span>Tahun ajaran</span></div>
                                        <div class="nk-tb-col"><span>Bobot NH</span></div>
                                        <div class="nk-tb-col"><span>Bobot UTS</span></div>
                                        <div class="nk-tb-col"><span>Bobot UAS</span></div>
                                        <div class="nk-tb-col"><span>Bobot Proses</span></div>
                                        <div class="nk-tb-col"><span>Bobot Produk</span></div>
                                        <div class="nk-tb-col"><span>Bobot Proyek</span></div>
                                        <div class="nk-tb-col"><span>Aksi</span></div>
                                    </div><!-- .nk-tb-item -->
                                    @if (count($query) > 0)
                                        @foreach ($query as $item)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->kd_tahun }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->th_ajaran }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->bobot_nh }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->bobot_uts }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->bobot_uas }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->bobot_proses }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->bobot_produk }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $item->bobot_proyek }}</span>
                                                </div>
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
                                                                                href="{{ route('ajaran.edit', $item->kd_tahun) }}"><em
                                                                                    class="icon ni ni-edit"></em><span>Ubah</span></a>
                                                                        </li>
                                                                        {{-- <li><a href="#"><em
                                                                                    class="icon ni ni-eye"></em><span>View
                                                                                    Product</span></a></li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-activity-round"></em><span>Product
                                                                                    Orders</span></a></li> --}}
                                                                        <li><a href="{{ route('ajaran.destroy', $item->kd_tahun) }}"
                                                                                onclick="event.preventDefault(); document.getElementById('form-delete{{ $loop->iteration }}').submit()"><em
                                                                                    class="icon ni ni-trash"></em><span>Hapus</span></a>
                                                                        </li>

                                                                        <form
                                                                            action="{{ route('ajaran.destroy', $item->kd_tahun) }}"
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
