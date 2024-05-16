<x-main title="{{ $title }}">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Databases</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Data Logbook</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('/assets/images/breadcrumb/ChatBc.png') }}" alt="modernize-img"
                                class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="datatables">
            <!-- start Row selection and deletion (single row) -->
            <div class="card">
                <div class="card-body">
                    {{-- BTN --}}
                    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2 mb-2" role="group" aria-label="First group">

                            <a href="{{ route('data-logbook.create') }}" class="btn btn-secondary" id="btnCreateAC"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Tambah Data">
                                <i class="bx bx-plus fs-4"></i>
                            </a>
                            <a href="{{ route('data-logbook.export.excel') }}" class="btn btn-secondary"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export Excel">
                                <i class="bx bx-printer fs-4"></i>
                            </a>
                            <a href="{{ route('data-logbook.trash') }}" class="btn btn-secondary"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Recycle Bin">
                                <i class="bx bx-trash fs-4"></i>
                            </a>

                            <div class="btn-group" role="group">
                                <button id="btnFilterLogbook" type="button"
                                    class="btn btn-secondary  dropdown-toggle rounded-end" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-search-alt-2'></i>
                                    <div class="dropdown-menu" aria-labelledby="btnFilterLogbook">
                                        <a class="dropdown-item filter-data-logbook" href="javascript:void(0)"
                                            data-attribute="jenis_pekerjaan" data-value="Tata Udara">Pekerjaan AC</a>
                                        <a class="dropdown-item filter-data-logbook" href="javascript:void(0)"
                                            data-attribute="jenis_pekerjaan" data-value="Elektrikal">Pekerjaan
                                            Listrik</a>
                                        <a class="dropdown-item filter-data-logbook" href="javascript:void(0)"
                                            data-attribute="jenis_pekerjaan" data-value="Mekanikal">Pekerjaan Mesin</a>
                                        <a class="dropdown-item filter-data-logbook" href="javascript:void(0)"
                                            data-attribute="kategori" data-value="ME">Ketegori ME</a>
                                        <a class="dropdown-item filter-data-logbook" href="javascript:void(0)"
                                            data-attribute="kategori" data-value="CIVIL">Ketegori Civil</a>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control input-filter-logbook showdropdowns"
                                    placeholder="Cari data berdasarkan tanggal" />
                                <button class="btn btn-primary" type="button" id="btnfilterLogbook"
                                    data-urlog="{{ url('logbook/filter') }}">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- BTN --}}
                    <x-table id="myTable" class="table table-striped table-bordered display text-nowrap">
                        <x-thead>
                            <!-- start row -->
                            <tr>
                                <th>Nama Tugas</th>
                                <th>Lokasi</th>
                                <th>Team</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                            <!-- end row -->
                        </x-thead>
                        <x-tbody>
                            @foreach ($logbooks as $logbook)
                                <!-- start row -->
                                <tr>
                                    <td>{{ $logbook->nama_tugas }}</td>
                                    <td>{{ $logbook->lokasi }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @foreach ($logbook->users as $user)
                                                <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-original-title="{{ $user->name }}">
                                                    <img src="{{ asset('assets/images/profile/' . $user->image) }}"
                                                        class="rounded-circle me-n2 card-hover border border-2 border-white"
                                                        width="39" height="39">
                                                </a>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{ Illuminate\Support\Carbon::parse($logbook->tanggal)->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        @if ($logbook->status == 'Done')
                                            <span class="mb-1 badge rounded-pill text-bg-primary">
                                                {{ $logbook->status }}
                                            </span>
                                        @elseif ($logbook->status == 'Progress')
                                            <span class="mb-1 badge rounded-pill text-bg-warning">
                                                {{ $logbook->status }}
                                            </span>
                                        @else
                                            <span class="mb-1 badge rounded-pill text-bg-danger">
                                                {{ $logbook->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn bg-info-subtle text-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                            </button>
                                            <ul class="dropdown-menu animated flipInX" style="">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('data-logbook.edit', ['id' => $logbook->id]) }}"
                                                        id="btnEditLogbook"><i class="bx bx-edit"></i> Update</a>
                                                </li>

                                                <li>
                                                    <button class="dropdown-item" id="btnDetailLogbook"
                                                        data-bs-toggle="modal" data-bs-target="#modalDetailLogbook"
                                                        data-userupdated="{{ $logbook->user_updated ? $logbook->user_updated . '/' . Illuminate\Support\Carbon::parse($logbook->updated_at)->diffForHumans() : '' }}"
                                                        data-namatugas="{{ $logbook->nama_tugas }}"
                                                        data-wing="{{ $logbook->wing }}"
                                                        data-lantai="{{ $logbook->lantai }}"
                                                        data-lokasi="{{ $logbook->lokasi }}"
                                                        data-status="{{ $logbook->status }}"
                                                        data-tanggal="{{ Illuminate\Support\Carbon::parse($logbook->tanggal)->format('Y-m-d') }}"
                                                        data-prioritas="{{ $logbook->prioritas }}"
                                                        data-type="{{ $logbook->type }}"
                                                        data-keterangan="{{ $logbook->keterangan }}"
                                                        data-petugas="{{ $logbook->users->implode('name', ', ') }}"
                                                        data-evidens="{{ $logbook->evidens }}"
                                                        data-kategori="{{ $logbook->kategori }}"
                                                        data-jenispekerjaan="{{ $logbook->jenis_pekerjaan }}"><i
                                                            class="ti ti-eye"></i> Detail</button>
                                                </li>

                                                <li>
                                                    <a href="{{ url('logbook', ['id' => $logbook->id]) }}"
                                                        class="dropdown-item" id="btnDeleteLogbook"><i
                                                            class="bx bx-trash"></i> Delete</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('logbook.export.pdf', ['id' => $logbook->id]) }}"><i
                                                            class='bx bxs-file-export'></i> Export PDF</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </x-tbody>
                        <x-tfoot>
                            <!-- start row -->
                            <tr>
                                <th>Nama Tugas</th>
                                <th>Lokasi</th>
                                <th>Team</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                            <!-- end row -->
                        </x-tfoot>
                    </x-table>
                </div>
            </div>
            <!-- end Row selection and deletion (single row) -->
        </div>
    </div>

    @include('components.LOGBOOK.log_book_modal_details')
    @include('components.LOGBOOK.log_book_modal_filter')
    @include('components.LOGBOOK.log_book_modal_evidens_filter')
    @include('components.LOGBOOK.log_book_modal_kategori_filter')


</x-main>
