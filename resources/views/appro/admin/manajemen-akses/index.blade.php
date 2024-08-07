<x-main title="{{ $title }}">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Manajemen Akses</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Menu Akses</li>
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
                    <x-table id="myTable" class="table table-striped table-bordered display text-nowrap">
                        <x-thead>
                            <!-- start row -->
                            <tr>
                                <th class="text-center">Users</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Menu</th>
                                <th class="text-center">Submenu</th>
                                <th class="text-center">Fitur</th>
                            </tr>
                            <!-- end row -->
                        </x-thead>
                        <x-tbody>
                            @foreach ($users as $user)
                                @if ($user->role != 1)
                                    @if (auth()->user()->name != $user->name || $user->status_login != 'online')
                                        <tr class="text-center">
                                            <td class="fs-4 ">{{ $user->name }}</td>
                                            <td class="fs-4 ">{{ $user->jabatan->nama_jabatan }}</td>
                                            <td><a href="{{ auth()->user()->role == 1 ? route('akses.menu.edit', ['id' => $user->id]) : 'javascript:void(0)' }}"
                                                    class="justify-content-center mb-1 btn-primary"
                                                    {{ auth()->user()->role != 1 ? 'data-bs-toggle=tooltip data-bs-placement=top data-bs-original-title=Disable' : '' }}>
                                                    <i class="bx bx-edit fs-6 text-primary"></i>
                                                </a></td>
                                            <td><a href="{{ auth()->user()->role == 1 ? route('akses.submenu.edit', ['id' => $user->id]) : 'javascript:void(0)' }}"
                                                    class="justify-content-center mb-1 btn-warning"
                                                    {{ auth()->user()->role != 1 ? 'data-bs-toggle=tooltip data-bs-placement=top data-bs-original-title=Disable' : '' }}>
                                                    <i class="bx bx-edit fs-6 text-warning"></i>
                                                </a></td>
                                            <td><a href="{{ auth()->user()->role == 1 ? route('akses.fitur.edit', ['id' => $user->id]) : 'javascript:void(0)' }}"
                                                    class="justify-content-center mb-1 btn-danger"
                                                    {{ auth()->user()->role != 1 ? 'data-bs-toggle=tooltip data-bs-placement=top data-bs-original-title=Disable' : '' }}>
                                                    <i class="bx bx-edit fs-6 text-danger"></i>
                                                </a></td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </x-tbody>

                    </x-table>
                </div>
            </div>
            <!-- end Row selection and deletion (single row) -->
        </div>
    </div>


</x-main>
