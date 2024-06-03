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
                                <li class="breadcrumb-item" aria-current="page">Data Ruangan</li>
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


                            <a href="{{ route('data-logbook.create') }}" class="btn btn-secondary" id="btnCreateLog"
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

                            
                        </div>
                    </div>
                    {{-- BTN --}}
                    <x-table id="myTable" class="table table-striped table-bordered display text-nowrap">
                        <x-thead>
                            <!-- start row -->
                            <tr>
                                <th>Nama Ruangan</th>
                                <th>Wing</th>
                                <th>Lantai</th>
                                <th>Pemilik</th>
                                <th>Opsi</th>
                            </tr>
                            <!-- end row -->
                        </x-thead>
                        <x-tbody>
                            <tr>
                                <td class="wrap-text">Rg OSM RWS</td>
                                <td class="wrap-text">WA</td>
                                <td class="wrap-text">1</td>
                                <td class="wrap-text">Pak Ichwan</td>
                                <td class="wrap-text">

                                    <div class="btn-group">
                                        <button type="button" class="btn bg-info-subtle text-danger dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                        </button>
                                        <ul class="dropdown-menu animated flipInX">
                                            <li>
                                                <a class="dropdown-item" href="" id="btnEditLogbook"><i
                                                        class="bx bx-edit"></i> Update</a>
                                            </li>



                                            <li>
                                                <button class="dropdown-item" id="btnDetailLogbook"
                                                    data-bs-toggle="modal" data-bs-target="#modalDetailLogbook"><i
                                                        class="ti ti-eye"></i> Detail</button>
                                            </li>



                                            <li>
                                                <a href="" class="dropdown-item" id="btnDeleteLogbook"><i
                                                        class="bx bx-trash"></i> Delete</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href=""><i
                                                        class='bx bxs-file-export'></i> Export PDF</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </x-tbody>
                        <x-tfoot>
                            <!-- start row -->
                            <tr>
                                <th>Nama Ruangan</th>
                                <th>Wing</th>
                                <th>Lantai</th>
                                <th>Pemilik</th>
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

</x-main>
