<x-modal id="modalEditUsers" titleId="titleModalEditUsers" dataFooter="d-none">
    <x-card-body>
        <form action="{{ route('user.update') }}" method="post">
            @csrf
            <input type="hidden" id="idEdit" name="id">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input class="form-control @error('name') is-invalid @enderror" name="name"
                                id="nameEdit" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="email">Email</label>
                        <div class="controls">
                            <input class="form-control @error('email') is-invalid @enderror" name="email"
                                id="emailEdit" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="nik">NIK <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input class="form-control @error('nik') is-invalid @enderror" name="nik" id="nikEdit"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="id_jabatan">Jabatan <span class="text-danger">*</span></label>
                        <div class="controls">
                            <select class="form-control @error('id_jabatan') is-invalid @enderror" name="id_jabatan"
                                id="idJabatanEdit" value="{{ old('id_jabatan') }}">
                                <option disabled selected value="">-Select-</option>
                                <option value="1">Administrator</option>
                                <option value="2">Auditor</option>
                                <option value="3">Petugas</option>
                            </select>
                            @error('id_jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input secondary" type="checkbox" id="isActiveEdit" name="is_active">
                        <label class="form-check-label" for="color-secondary">Status Akun</label>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-card-body>
</x-modal>
