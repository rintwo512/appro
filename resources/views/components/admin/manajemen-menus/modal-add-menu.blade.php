<x-modal id="modalAddMenu" class="modal-dialog modal-dialog-centered modal-dialog-scrollable" dataFooter="d-none">
    <form class="ps-3 pr-3" action="{{ route('menus.store') }}" method="post">
      @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="menu_label">Nama Menu <span class="text-danger">*</span></label>
                <select class="form-control @error('menu_label') is-invalid @enderror" id="menu_label" name="menu_label"
                    value="{{ old('menu_label') }}">
                    <option disabled selected value="">-Select-</option>
                    <option value="Dashboard">Dashboard</option>
                    <option value="Databases">Databases</option>
                    <option value="Settings">Settings</option>
                </select>
                @error('menu_label')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12 mb-3" id="menuUrl">
                {{--  --}}
            </div>
            <div class="col-md-12 mb-3">
                <label for="menu_icon">Icon Menu <span class="text-danger">*</span></label>
                <select class="form-control custom-select @error('menu_icon') is-invalid @enderror" id="menu_icon"
                    name="menu_icon" value="{{ old('menu_icon') }}">
                    <option disabled selected value="">-Select-</option>
                    <option value="bx bx-home-alt">Dashboard</option>
                    <option value="bx bx-data">Databases</option>
                    <option value="bx bx-cog">Settings</option>
                </select>
                <div id="selected-icon" style="font-size: 20px"></div>
                @error('menu_icon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
