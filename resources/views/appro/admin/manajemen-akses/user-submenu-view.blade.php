<x-main title="{{ $title }}">
    <div class="container-fluid">
        <h4 class="card-title mb-3"><span class="text-primary fw-bold">{{ $user->name }}</span> | Submenu
        </h4>
        <hr>
        <div class="card">
            <div class="card-body">
                <form id="updateSubmenuForm" action="{{ route('akses.submenu.update', ['id' => $user->id]) }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        @foreach ($menus as $allSubmenus)
                            @if ($allSubmenus->submenus1->isNotEmpty())
                                <div class="col-md-4"> <!-- Sesuaikan ukuran kolom dengan kebutuhan Anda -->
                                    <h4 class="card-title mt-5 mb-2">{{ $allSubmenus->menu_label }}</h4>
                                    <div class="row">
                                        @foreach ($allSubmenus->submenus1 as $submenu)
                                            <div class="col-12">
                                                <div class="form-check form-switch fs-5">
                                                    <input class="form-check-input pr-2 submenu-checkbox"
                                                        type="checkbox" id="submenu-{{ $submenu->id }}"
                                                        name="submenus[]" value="{{ $submenu->id }}"
                                                        {{ $user->submenus1->contains('id', $submenu->id) ? 'checked' : '' }}>
                                                    <label class="form-check-label pl-2"
                                                        for="submenu-{{ $submenu->id }}">{{ $submenu->submenu_label }}
                                                        &nbsp;</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </form>
            </div>
        </div>

    </div>


</x-main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.submenu-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                document.getElementById('updateSubmenuForm').submit();
            });
        });
    });
</script>
