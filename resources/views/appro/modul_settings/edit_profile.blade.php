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
                                <li class="breadcrumb-item" aria-current="page">Edit Profile</li>
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

        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                        <h4 class="card-title">Change Profile</h4>
                        <p class="card-subtitle mb-4">Change your profile picture from here</p>
                        <div class="text-center">
                            @if (auth()->user()->image != 'default.jpg')
                                <img src="{{ asset('/uploads/profile_images/' . auth()->user()->image) }}"
                                    alt="modernize-img" id="imgPreview" class="img-fluid rounded-circle" width="120"
                                    height="120">
                            @else
                                <img src="{{ asset('/assets/images/profile/' . auth()->user()->image) }}"
                                    alt="modernize-img" id="imgPreview" class="img-fluid rounded-circle" width="120"
                                    height="120">
                            @endif

                            <div class="d-flex align-items-center justify-content-center my-4 gap-6">
                                <form action="{{ route('edit.profile.post') }}" method="post"
                                    enctype="multipart/form-data" id="uploadForm">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <input type="file" class="form-control" name="image" id="fileup">
                                </form>
                            </div>
                            <div class="d-flex align-items-center justify-content-center my-4 gap-6">

                                <button type="submit" class="btn btn-primary" id="btnUpload">Upload</button>
                            </div>
                            <p class="mb-0" id="errorMessages" style="color: red; text-align: center;"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card w-100 border position-relative overflow-hidden mb-0">
                <div class="card-body p-4">
                    <h4 class="card-title">Personal Details</h4>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputtext" class="form-label">Your Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Location</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">Indonesia</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtext1" class="form-label">Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputtext2" class="form-label">Store Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Currency</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">Indonesia</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputtext3" class="form-label">Phone</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label for="exampleInputtext4" class="form-label">Address</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                    <button class="btn btn-primary">Save</button>
                                    <button class="btn bg-danger-subtle text-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- CONTENT --}}


    </div>


</x-main>

<script>
    document.getElementById('fileup').addEventListener('change', function(event) {
        var file = this.files[0];
        var errorMessages = document.getElementById('errorMessages');
        errorMessages.innerHTML = '';

        // Validasi tipe file
        var validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!validTypes.includes(file.type)) {
            errorMessages.innerHTML = 'Hanya file dengan tipe JPG, JPEG, dan PNG yang diperbolehkan.';
            this.value = ''; // Hapus file yang tidak valid
            document.getElementById('btnUpload').disabled = true;
            return;
        }

        // Validasi ukuran file (max 2MB)
        var maxSize = 2 * 1024 * 1024; // 2MB dalam byte
        if (file.size > maxSize) {
            errorMessages.innerHTML = 'Ukuran file maksimal adalah 2MB.';
            this.value = ''; // Hapus file yang tidak valid
            document.getElementById('btnUpload').disabled = true;
            return;
        }

        // Tampilkan pratinjau gambar
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('imgPreview').src = e.target.result;
            };

            reader.readAsDataURL(this.files[0]);
        }

        document.getElementById('btnUpload').disabled = false;
    });

    document.getElementById('btnUpload').addEventListener('click', function() {
        document.getElementById('uploadForm').submit();
    });

    document.getElementById('btnUpload').disabled = true;
</script>
