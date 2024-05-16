<x-main title="{{ $title }}">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Manajemen Users</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">List Users</li>
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

                            <a href="" class="btn btn-secondary" id="btnCreateAC" data-bs-toggle="modal"
                                data-bs-target="#modalAddUsers">
                                <i class="bx bx-plus fs-4"></i>
                            </a>
                        </div>
                    </div>
                    {{-- BTN --}}
                    <x-table id="myTable" class="table table-striped table-bordered display text-nowrap">
                        <x-thead>
                            <!-- start row -->
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Login</th>
                                <th>Opsi</th>
                            </tr>
                            <!-- end row -->
                        </x-thead>
                        <x-tbody>
                            @foreach ($users as $user)
                                <!-- start row -->
                                @if ($user->id != 1)
                                    <tr>
                                        <td><img src="{{ asset('assets/images/profile/' . $user->image) }}"
                                                class="rounded-circle" width="40" height="40"
                                                alt="{{ auth()->user()->name }}" /></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->jabatan->nama_jabatan }}</td>
                                        <td>{!! $user->is_active == 1
                                            ? "<span class='text-success'>Active</span>"
                                            : "<span class='text-danger'>pending</span>" !!}</td>
                                        <td>{!! $user->status_login == 'online'
                                            ? "<span class='text-success'>Online</span>"
                                            : "<span class='text-danger'>Offline</span>" !!}</td>
                                        <td>

                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn bg-info-subtle text-danger dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                                </button>
                                                <ul class="dropdown-menu animated flipInX" style="">
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditUsers"
                                                            id="btnEditUser" data-idedit="{{ $user->id }}"
                                                            data-nameedit="{{ $user->name }}"
                                                            data-jabatanedit="{{ $user->id_jabatan }}"
                                                            data-nikedit="{{ $user->nik }}"
                                                            data-emailedit="{{ $user->email }}"
                                                            data-isactiveedit="{{ $user->is_active }}"><i
                                                                class="bx bx-edit"></i> Update</a>
                                                    </li>

                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#modalDetailUsers" id="btnDetailUser"><i
                                                                class="bx bx-low-vision"></i>
                                                            Detail</button>
                                                    </li>

                                                    <li>
                                                        <a id="btnDeleteUser"
                                                            href="{{ route('user.delete', ['id' => $user->id]) }}"
                                                            class="dropdown-item"><i class="bx bx-trash"></i> Delete</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </x-tbody>
                        <x-tfoot>
                            <!-- start row -->
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Login</th>
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

    @include('components.admin.manajemen-users.modal-add-users')
    @include('components.admin.manajemen-users.modal-edit-users')
    @include('components.admin.manajemen-users.modal-detail-users')

</x-main>
