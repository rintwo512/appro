<x-modal id="modalAddFiturAc" class="modal-dialog modal-dialog-centered modal-dialog-scrollable" dataFooter="d-none">
    <form class="ps-3 pr-3" action="{{ route('fitur.ac.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="name">Nama Fitur <span class="text-danger">*</span></label>
                <select class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                    <option disabled selected value="">-Select-</option>
                    <option value="Tambah AC">Tambah AC</option>
                    <option value="Edit AC">Edit AC</option>
                    <option value="Detail AC">Detail AC</option>
                    <option value="Delete AC">Delete AC</option>
                </select>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div id="locationFitur">
                {{--  --}}
            </div>

            <div id="fiturAcIcon">
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
