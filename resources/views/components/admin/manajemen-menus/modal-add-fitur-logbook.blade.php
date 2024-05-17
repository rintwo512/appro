<x-modal id="modalAddFiturLogbook" class="modal-dialog modal-dialog-centered modal-dialog-scrollable" dataFooter="d-none">
    <form class="ps-3 pr-3" action="{{ route('fitur.logbook.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="name_logbook">Nama Fitur <span class="text-danger">*</span></label>
                <select class="form-control @error('name') is-invalid @enderror" id="name_logbook" name="name"
                    value="{{ old('name') }}">
                    <option disabled selected value="">-Select-</option>
                    <option value="Tambah Logbook">Tambah Logbook</option>
                    <option value="Edit Logbook">Edit Logbook</option>
                    <option value="Detail Logbook">Detail Logbook</option>
                    <option value="Delete Logbook">Delete Logbook</option>
                </select>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div id="locationFiturLogbook">
                {{--  --}}
            </div>

            <div id="iconFiturLogbook">
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
