<x-main title="{{ $title }}">

    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Account Settings</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Change Password</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('/assets/images/breadcrumb/ChatBc.png') }}" alt="modernize-img"
                                class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTENT --}}

        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <h4 class="card-title">Change Password</h4>
                    <p class="card-subtitle mb-4">To change your password please confirm here</p>
                    <form action="{{ route('ubah.pass.post') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="userId">
                            <label for="exampleInputPassword1" class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('changeOldPass') is-invalid @enderror"
                                id="changeOldPass" required name="changeOldPass">
                            @error('changeOldPass')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">New Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" required name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="exampleInputPassword3" class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" required name="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button class="btn bg-danger-subtle text-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- CONTENT --}}


    </div>


</x-main>
