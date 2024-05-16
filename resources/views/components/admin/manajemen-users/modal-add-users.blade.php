<x-modal id="modalAddUsers" titleId="titleModalAddUsers" dataFooter="d-none">
    <x-card-body>
        <form action="{{ route('user.create') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="email">Email</label>
                        <div class="controls">
                            <input class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="nik">NIK <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="id_jabatan">Jabatan <span class="text-danger">*</span></label>
                        <div class="controls">
                            <select class="form-control @error('id_jabatan') is-invalid @enderror" name="id_jabatan"
                                id="id_jabatan" value="{{ old('id_jabatan') }}">
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
                    <div class="mb-3 form-group">
                        <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 form-group">
                        <label class="form-label" for="password_confirmation">Password Confirmation <span
                                class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" id="password_confirmation"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input secondary" type="checkbox" id="is_active" name="is_active">
                        <label class="form-check-label" for="color-secondary">Status</label>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-card-body>
</x-modal>
