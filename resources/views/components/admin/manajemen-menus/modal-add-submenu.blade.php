<x-modal id="modalAddSubmenu" class="modal-dialog modal-dialog-centered modal-dialog-scrollable" dataFooter="d-none">
    <form class="ps-3 pr-3" action="{{ route('submenus.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="submenu_label">Nama Submenu <span class="text-danger">*</span></label>
                <select class="form-control @error('submenu_label') is-invalid @enderror" id="submenu_label"
                    name="submenu_label" value="{{ old('submenu_label') }}">
                    <option disabled selected value="">-Select-</option>
                    <optgroup label="Databases">
                        <option value="Data AC">Data AC</option>
                        <option value="Data Logbook">Data Logbook</option>
                        <option value="Data Apar">Data Apar</option>
                    </optgroup>
                    <optgroup label="Settings">
                        <option value="Edit Profile">Edit Profile</option>
                        <option value="Ubah Password">Ubah Password</option>
                    </optgroup>
                </select>
                @error('submenu_label')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div id="submenuUrl">
                {{--  --}}
            </div>
            <div id="submenuLocation">
                {{--  --}}
            </div>
            <div id="menuSubId">
                {{--  --}}
            </div>
            <div class="col-md-2">
                <div class="form-check form-switch">
                    <input class="form-check-input secondary" type="checkbox" id="is_active" name="is_active">
                    <label class="form-check-label" for="color-secondary">Status</label>
                </div>
            </div>
        </div>
        <div class="mb-3 text-center">
            <button class="btn bg-info-subtle text-info " type="submit">
                Submit
            </button>
        </div>
    </form>
</x-modal>
