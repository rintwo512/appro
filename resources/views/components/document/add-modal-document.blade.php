<div class="modal fade" id="modalAddDocument" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">
                    Form Upload File
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="upload" method="post" action="{{ route('document.store') }}" enctype="multipart/form-data"
                    accept-charset="utf-8">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="">Input File</label>
                        <input type="file" class="form-control @error('fileup') is-invalid @enderror"
                            name="fileup" />
                        @error('tgl_pemasangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">
                        Upload
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
