<x-main title="{{ $title }}">
    <div class="container-fluid">
        <div class="col-md-4">
            <h4 class="card-title mb-3"><span class="text-primary fw-bold">{{ $user->name }}</span> Submenu
            </h4>
            <div class="card">
                <div class="card-body">
                    <form id="updateSubmenuForm" action="{{ route('akses.submenu.update', ['id' => $user->id]) }}"
                        method="POST">
                        @csrf
                        @foreach ($allSubmenus as $submenu)
                            <div class="form-check form-switch fs-5 d-flex justify-content-between">
                                <input class="form-check-input pr-5 submenu-checkbox" type="checkbox"
                                    id="submenu-{{ $submenu->id }}" name="submenus[]" value="{{ $submenu->id }}"
                                    {{ $user->submenus1->contains('id', $submenu->id) ? 'checked' : '' }}>
                                <label class="form-check-label pl-5"
                                    for="submenu-{{ $submenu->id }}">{{ $submenu->submenu_label }} &nbsp;<i
                                        class="{{ $submenu->submenu_icon }} text-primary"></i></label>
                            </div>
                        @endforeach
                    </form>
                </div>
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
