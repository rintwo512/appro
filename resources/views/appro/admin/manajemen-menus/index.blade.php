<x-main title="{{ $title }}">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Manajemen Menus</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Menus</li>
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
        {{-- CONTENT --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3">
                        <button class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalAddMenu"><i class="ti ti-plus"></i></button>
                        <h4 class="card-title mb-0">Main Menu</h4>
                    </div>
                    <div class="table-responsive border rounded-4">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Nama Menu</h6>
                                    </th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <h6 class="fw-semibold mb-1"><i
                                                            class="{{ $menu->menu_icon }} text-primary"></i>&nbsp;
                                                        {{ $menu->menu_label }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <div class="d-flex flex-wrap gap-6">

                                                <a id="btnDeleteMenu"
                                                    href="{{ route('menus.delete', ['id' => $menu->id]) }}"
                                                    class="text-danger delete ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                                <div class="form-check form-switch">
                                                    <!-- Checkbox untuk status menu -->
                                                    <input class="form-check-input secondary checkbox-menus"
                                                        type="checkbox" {{ $menu->is_active ? 'checked' : '' }}
                                                        id="is_active_{{ $menu->id }}" name="is_active"
                                                        data-id="{{ $menu->id }}">
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3">
                        <button class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalAddSubmenu"><i class="ti ti-plus"></i></button>
                        <h4 class="card-title mb-0">Submenu</h4>
                    </div>
                    <div class="table-responsive border rounded-4">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Nama Submenu</h6>
                                    </th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submenus as $submenu)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <h6 class="fw-semibold mb-1"><i
                                                            class="{{ $submenu->submenu_icon }} text-primary"></i>&nbsp;
                                                        {{ $submenu->submenu_label }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <div class="d-flex flex-wrap gap-6">

                                                <a id="btnDeleteSubmenu"
                                                    href="{{ route('submenus.delete', ['id' => $submenu->id]) }}"
                                                    class="text-danger delete ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                                <div class="form-check form-switch">
                                                    <!-- Checkbox untuk status menu -->
                                                    <input class="form-check-input secondary checkbox-submenus"
                                                        type="checkbox" {{ $submenu->is_active ? 'checked' : '' }}
                                                        id="is_active_{{ $submenu->id }}" name="is_active"
                                                        data-idsub="{{ $submenu->id }}">
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="px-4 py-3">
                                    <button class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalAddFiturAc"><i class="ti ti-plus"></i></button>
                                    <h4 class="card-title mb-0">Fitur AC</h4>
                                </div>
                                <div class="table-responsive border rounded-4">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Fitur</h6>
                                                </th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($featuresAC as $featureac)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-3">
                                                                <h6 class="fw-semibold mb-1"><i
                                                                        class="{{ $featureac->icon }} text-primary"></i>&nbsp;
                                                                    {{ $featureac->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>

                                                        <div class="d-flex flex-wrap gap-6">

                                                            <a id="btnDeleteFeatureAc"
                                                                href="{{ route('fitur.ac.delete', ['id' => $featureac->id]) }}"
                                                                class="text-danger delete ms-2">
                                                                <i class="ti ti-trash fs-5"></i>
                                                            </a>
                                                            <div class="form-check form-switch">
                                                                <!-- Checkbox untuk status menu -->
                                                                <input
                                                                    class="form-check-input secondary checkbox-feature-ac"
                                                                    type="checkbox"
                                                                    {{ $featureac->is_active ? 'checked' : '' }}
                                                                    id="is_active_{{ $featureac->id }}"
                                                                    name="is_active"
                                                                    data-idfitac="{{ $featureac->id }}">
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="px-4 py-3">
                                    <button class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalAddFiturLogbook"><i class="ti ti-plus"></i></button>
                                    <h4 class="card-title mb-0">Fitur Logbook</h4>
                                </div>
                                <div class="table-responsive border rounded-4">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Fitur</h6>
                                                </th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($featuresLogbook as $logFeature)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-3">
                                                                <h6 class="fw-semibold mb-1"><i
                                                                        class="{{ $logFeature->submenu_icon }} text-primary"></i>&nbsp;
                                                                    {{ $logFeature->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>

                                                        <div class="d-flex flex-wrap gap-6">

                                                            <a id="btnDeleteFiturLogbook"
                                                                href="{{ route('fiturlog.delete', ['id' => $logFeature->id]) }}"
                                                                class="text-danger delete ms-2">
                                                                <i class="ti ti-trash fs-5"></i>
                                                            </a>
                                                            <div class="form-check form-switch">
                                                                <!-- Checkbox untuk status menu -->
                                                                <input
                                                                    class="form-check-input secondary checkbox-fitur-logbook"
                                                                    type="checkbox"
                                                                    {{ $logFeature->is_active ? 'checked' : '' }}
                                                                    id="is_active_{{ $logFeature->id }}"
                                                                    name="is_active"
                                                                    data-idfilog="{{ $logFeature->id }}">
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="px-4 py-3">
                                    <button class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalAddFitur"><i class="ti ti-plus"></i></button>
                                    <h4 class="card-title mb-0">Fitur AC</h4>
                                </div>
                                <div class="table-responsive border rounded-4">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th>
                                                    <h6 class="fs-4 fw-semibold mb-0">Nama Submenu</h6>
                                                </th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($submenus as $submenu)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-3">
                                                                <h6 class="fw-semibold mb-1"><i
                                                                        class="{{ $submenu->submenu_icon }} text-primary"></i>&nbsp;
                                                                    {{ $submenu->submenu_label }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>

                                                        <div class="d-flex flex-wrap gap-6">

                                                            <a id="btnDeleteSubmenu"
                                                                href="{{ route('submenus.delete', ['id' => $submenu->id]) }}"
                                                                class="text-danger delete ms-2">
                                                                <i class="ti ti-trash fs-5"></i>
                                                            </a>
                                                            <div class="form-check form-switch">
                                                                <!-- Checkbox untuk status menu -->
                                                                <input
                                                                    class="form-check-input secondary checkbox-submenus"
                                                                    type="checkbox"
                                                                    {{ $submenu->is_active ? 'checked' : '' }}
                                                                    id="is_active_{{ $submenu->id }}"
                                                                    name="is_active"
                                                                    data-idsub="{{ $submenu->id }}">
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- END CONTENT --}}
    </div>
    @include('components.admin.manajemen-menus.modal-add-menu')
    @include('components.admin.manajemen-menus.modal-add-submenu')
    @include('components.admin.manajemen-menus.modal-add-fitur')
    @include('components.admin.manajemen-menus.modal-add-fitur-logbook')
</x-main>
