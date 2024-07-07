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
                    <option value="Document">Document</option>
                    <option value="Settings">Settings</option>
                    <option value="Tools">Tools</option>
                </select>
                @error('menu_label')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div id="menuUrl">
                {{--  --}}
            </div>

            <div id="menuLocation">
                {{--  --}}
            </div>

            <div id="menuInputIcon">
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
