<x-main title="{{ $title }}">
    <style>
        .button-column {
            width: 100px;
        }
    </style>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">File Manager</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Document</li>
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

                            <a href="javascript:void(0)" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#modalAddDocument">
                                <i class="bx bx-plus fs-4"></i>
                            </a>
                        </div>
                    </div>
                    {{-- BTN --}}
                    <x-table id="myTable" class="table table-striped table-bordered display text-nowrap">
                        <x-thead>
                            <!-- start row -->
                            <tr>
                                <th>Nama File</th>
                                <th>Extensi File</th>
                                <th>Ukuran File(kb)</th>
                                <th>Opsi</th>
                            </tr>
                            <!-- end row -->
                        </x-thead>
                        <x-tbody>
                            @foreach ($data as $doc)
                                <tr>

                                    <td class="wrap-text"><a href="{{ asset('/uploads/documents/' . $doc->file_name) }}"
                                            download>{{ $doc->file_name }}</a>
                                    </td>

                                    <td>
                                        @if ($doc->extension_file == 'xlsx')
                                            <img src="{{ asset('assets/images/logos/docs/excel.png') }}"
                                                class="rounded-circle" width="80" height=60"
                                                alt="{{ $doc->file_name }}" />
                                        @elseif ($doc->extension_file == 'docx')
                                            <img src="{{ asset('assets/images/logos/docs/docx.png') }}"
                                                class="rounded-circle" width="70" height="50"
                                                alt="{{ $doc->file_name }}" />
                                        @elseif ($doc->extension_file == 'pptx')
                                            <img src="{{ asset('assets/images/logos/docs/pptx.png') }}" width="60"
                                                height="40" alt="{{ $doc->file_name }}" />
                                        @elseif ($doc->extension_file == 'txt')
                                            <img src="{{ asset('assets/images/logos/docs/txt.png') }}" width="70"
                                                height="50" alt="{{ $doc->file_name }}" />
                                        @elseif ($doc->extension_file == 'rar')
                                            <img src="{{ asset('assets/images/logos/docs/rar.png') }}" width="70"
                                                height="50" alt="{{ $doc->file_name }}" />
                                        @elseif ($doc->extension_file == 'pdf')
                                            <img src="{{ asset('assets/images/logos/docs/pdf.png') }}" width="70"
                                                height="50" alt="{{ $doc->file_name }}" />
                                        @elseif ($doc->extension_file == 'psd')
                                            <img src="{{ asset('assets/images/logos/docs/psd.png') }}" width="40"
                                                height="50" alt="{{ $doc->file_name }}" />
                                        @elseif ($doc->extension_file == 'ai')
                                            <img src="{{ asset('assets/images/logos/docs/ai.png') }}" width="40"
                                                height="50" alt="{{ $doc->file_name }}" />
                                        @else
                                            <img src="{{ asset('assets/images/logos/docs/zip.png') }}" width="60"
                                                height="60" alt="{{ $doc->file_name }}" />
                                        @endif
                                    </td>

                                    <td class="wrap-text">{{ $doc->file_size !== 0 ? $doc->file_size : '' }}</td>

                                    <td class="button-column">

                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn bg-info-subtle text-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                            </button>
                                            <ul class="dropdown-menu animated flipInX" style="">

                                                <li>
                                                    <a href="{{ asset('/uploads/documents/' . $doc->file_name) }}"
                                                        class="dropdown-item text-success" download><i
                                                            class="bx bxs-download"></i>
                                                        Unduh</a>
                                                </li>

                                                <li>
                                                    <a id="btnDeleteDoc"
                                                        href="{{ route('document.destroy', ['id' => $doc->id]) }}"
                                                        class="dropdown-item text-danger"><i class="bx bx-trash"></i>
                                                        Hapus</a>
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
                                <th>Nama File</th>
                                <th>Extensi File</th>
                                <th>Ukuran File(kb)</th>
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
    @include('components.document.add-modal-document')
</x-main>
