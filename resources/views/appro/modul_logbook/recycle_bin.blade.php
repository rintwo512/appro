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
                                        href="{{ route('data-logbook.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Recycle Bin</li>
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
                            <a href="{{ route('data-logbook.index') }}" class="btn btn-secondary"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Kembali">
                                <i class='bx bx-left-arrow-alt fs-4'></i>
                            </a>
                            <a href="{{ route('data-logbook.delete.all') }}" class="btn btn-secondary"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Hapus Semua Data" id="btnDeletePermanentLogbook">
                                <i class="bx bx-trash fs-4"></i>
                            </a>
                        </div>
                    </div>
                    {{-- BTN --}}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-bordered display text-nowrap">
                            <thead>
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
                            </thead>
                            <tbody>
                                @foreach ($logbooks as $logbook)
                                    <!-- start row -->
                                    <tr>
                                        <td class="wrap-text">{{ $logbook->nama_tugas }}</td>
                                        <td class="wrap-text">{{ $logbook->lokasi }}</td>
                                        <td class="wrap-text">
                                            <div class="d-flex align-items-center">
                                                @foreach ($logbook->users as $user)
                                                    <a href="javascript:void(0)"
                                                        class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-original-title="{{ $user->name }}">
                                                        @if ($user->image != 'default.jpg')
                                                            <img src="{{ asset('/uploads/profile_images/' . $user->image) }}"
                                                                class="rounded-circle" width="40" height="40"
                                                                alt="modernize-img">
                                                        @else
                                                            <img src="{{ asset('assets/images/profile/' . $user->image) }}"
                                                                class="rounded-circle" width="40" height="40"
                                                                alt="modernize-img">
                                                        @endif

                                                    </a>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="wrap-text">
                                            {{ Illuminate\Support\Carbon::parse($logbook->tanggal)->format('Y-m-d') }}
                                        </td>
                                        <td class="wrap-text">
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
                                        <td class="wrap-text">
                                            <button class="btn btn-info btn-sm" id="recycleBinLogbook"
                                                data-bs-toggle="modal" data-bs-target="#modalRecycleLogbook"
                                                data-userdeleted="{{ $logbook->is_delete ? $logbook->is_delete . '/' . Illuminate\Support\Carbon::parse($logbook->deleted_at)->diffForHumans() : '' }}"
                                                data-namatugas="{{ $logbook->nama_tugas }}"
                                                data-wing="{{ $logbook->wing }}" data-lantai="{{ $logbook->lantai }}"
                                                data-lokasi="{{ $logbook->lokasi }}"
                                                data-status="{{ $logbook->status }}"
                                                data-tanggal="{{ Illuminate\Support\Carbon::parse($logbook->tanggal)->format('Y-m-d') }}"
                                                data-prioritas="{{ $logbook->prioritas }}"
                                                data-type="{{ $logbook->type }}"
                                                data-keterangan="{{ $logbook->keterangan }}"
                                                data-petugas="{{ $logbook->users->implode('name', ', ') }}"
                                                data-evidenstrash="{{ $logbook->evidens }}"
                                                data-kategori="{{ $logbook->kategori }}"
                                                data-jenispekerjaan="{{ $logbook->jenis_pekerjaan }}"
                                                data-baseurlbin="{{ asset('/') }}"><i class='bx bx-low-vision'></i>
                                                Detail</button>
                                            </li>

                                            <a class="btn btn-secondary btn-sm" id="btnRestoreLogbook"
                                                href="{{ route('data-logbook.restore', ['id' => $logbook->id]) }}"><i
                                                    class='bx bx-download'></i> Restore</a>

                                        </td>
                                    </tr>
                                    <!-- end row -->
                                @endforeach

                            </tbody>
                            <tfoot>
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
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end Row selection and deletion (single row) -->
        </div>
    </div>
    @include('components.LOGBOOK.log_book_modal_details_recycle_bin')

</x-main>
