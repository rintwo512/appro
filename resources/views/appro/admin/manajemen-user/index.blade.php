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

                            @can('super-admin')
                                <a href="javascript:void(0)" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modalAddUsers">
                                    <i class="bx bx-plus fs-4"></i>
                                </a>
                            @endcan
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
                                <th>Role</th>
                                <th>Status</th>
                                <th>Login</th>
                                <th>Opsi</th>
                            </tr>
                            <!-- end row -->
                        </x-thead>
                        <x-tbody>
                            @foreach ($users as $user)
                                <!-- start row -->
                                @if ($user->role != 1)
                                    @if (auth()->user()->name != $user->name)
                                        <tr>
                                            <td>
                                                @if ($user->image != 'default.jpg')
                                                    <img src="{{ asset('/uploads/profile_images/' . $user->image) }}"
                                                        class="rounded-circle" width="40" height="40"
                                                        alt="{{ auth()->user()->name }}" />
                                                @else
                                                    <img src="{{ asset('assets/images/profile/' . $user->image) }}"
                                                        class="rounded-circle" width="40" height="40"
                                                        alt="{{ auth()->user()->name }}" />
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->nik }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->jabatan->nama_jabatan }}</td>
                                            <td>{!! $user->is_active == 1
                                                ? "<span class='text-success'>Active</span>"
                                                : "<span class='text-danger'>pending</span>" !!}</td>
                                            @if ($user->status_login == 'online')
                                                <td>{{ $user->user_time_online? Illuminate\Support\Carbon::parse($user->user_time_online)->locale('id')->diffForHumans(): 'Off' }}
                                                </td>
                                            @else
                                                <td>OFFLINE</td>
                                            @endif
                                            <td>

                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-info-subtle text-danger dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                                    </button>
                                                    <ul class="dropdown-menu animated flipInX" style="">
                                                        @if ($user->status_login != 'online')
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalEditUsers" id="btnEditUser"
                                                                    data-idedit="{{ $user->id }}"
                                                                    data-nameedit="{{ $user->name }}"
                                                                    data-jabatanedit="{{ $user->id_jabatan }}"
                                                                    data-nikedit="{{ $user->nik }}"
                                                                    data-emailedit="{{ $user->email }}"
                                                                    data-isactiveedit="{{ $user->is_active }}"><i
                                                                        class="bx bx-edit"></i> Update</a>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalDetailUsers" id="btnDetailUser"><i
                                                                    class="bx bx-low-vision"></i>
                                                                Detail</button>
                                                        </li>
                                                        @can('super-admin')
                                                            @if ($user->status_login != 'online')
                                                                <li>
                                                                    <a id="btnDeleteUser"
                                                                        href="{{ route('user.delete', ['id' => $user->id]) }}"
                                                                        class="dropdown-item"><i class="bx bx-trash"></i>
                                                                        Delete</a>
                                                                </li>
                                                            @endif
                                                        @endcan

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
