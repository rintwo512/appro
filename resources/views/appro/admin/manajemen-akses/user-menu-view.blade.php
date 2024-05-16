<x-main title="{{ $title }}">
    <div class="container-fluid">
        <div class="col-md-4">
            <h4 class="card-title mb-3">{{ $user->name }} Menu</h4>
            <div class="card">
                <div class="card-body">
                    <form id="updateMenuForm" action="{{ route('akses.menu.update', ['id' => $user->id]) }}"
                        method="POST">
                        @csrf
                        @foreach ($allMenus as $menu)
                            <div class="form-check form-switch fs-5 d-flex justify-content-between">
                                <input class="form-check-input pr-5 menu-checkbox" type="checkbox"
                                    id="menu-{{ $menu->id }}" name="menus[]" value="{{ $menu->id }}"
                                    {{ $user->menus1->contains('id', $menu->id) ? 'checked' : '' }}>
                                <label class="form-check-label pl-5"
                                    for="menu-{{ $menu->id }}">{{ $menu->menu_label }} &nbsp;<i
                                        class="{{ $menu->menu_icon }} text-primary"></i></label>
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
        const checkboxes = document.querySelectorAll('.menu-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                document.getElementById('updateMenuForm').submit();
            });
        });
    });
</script>
