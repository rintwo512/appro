<x-main title="{{ $title }}">     
      <style>
            .badge{
                font-size: 16px;
                border-radius: 3px;
                margin-left: 5px !important;
                background: #3C8DBC;
            }
            #dayaPendinginSatuan,
            #dayaListrikSatuan,#currentSatuan {
            border-left: none;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
        }

        </style>
      <div class="container-fluid">
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                  <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                      <div class="col-9">
                        <h4 class="fw-semibold mb-8">Databases</h4>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                              <a class="text-muted text-decoration-none" href="{{ route('data-logbook.index') }}">Data LogBook</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit Data</li>
                          </ol>
                        </nav>
                      </div>
                      <div class="col-3">
                        <div class="text-center mb-n5">
                          <img src="{{ asset('/assets/images/breadcrumb/ChatBc.png') }}" alt="modernize-img" class="img-fluid mb-n4" />
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
             <div class="card">
                  <div class="border-bottom title-part-padding">
                    <h4 class="card-title mb-0"><a href="{{ route('data-logbook.index') }}" class="btn btn-danger btn-sm"><i class='bx bx-left-arrow-alt'></i> Kembali</a></h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('data-logbook.ubah', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data"> 
                          @csrf
                      <div class="row mt-4">
                        <div class="col-md-12">
                              <div class="mb-3 form-group">
                                    <label class="form-label" for="nama_tugas">Judul Tugas <span class="text-danger">*</span></label>
                                    <div class="controls">
                                          <textarea class="form-control @error('nama_tugas') is-invalid @enderror" name="nama_tugas"
                                          id="nama_tugas" rows="4" cols="4" value="{{ old('nama_tugas') }}"
                                          placeholder="Masukkan judul tugas">{{ $data->nama_tugas }}</textarea>
                                       @error('nama_tugas')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
                                    </div>                        
                              </div>
                         </div>
                         <div class="col-md-4">
                              <label for="wing" class="form-label">Wing <span class="text-danger">*</span></label>
                              <select
                                  class="form-control @error('wing') is-invalid @enderror"
                                  id="wing" name="wing">
                                  <option selected  value="{{ $data->wing }}">{{ $data->wing }}</option>
                                  <option disabled value="">--Select--</option>
                                  <option value="WA">WA</option>
                                  <option value="WB">WB</option>
                                  <option value="WC">WC</option>
                                  <option value="WD">WD</option>
                                  <option value="Lainnya">Lainnya</option>
                              </select>
                              @error('wing')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="col-md-4">
                              <label for="wing" class="form-label">Lantai <span class="text-danger">*</span></label>
                              <select
                                  class="form-control @error('lantai') is-invalid @enderror"
                                  id="lantai" name="lantai">
                                  <option selected value="{{ $data->lantai }}">{{ $data->lantai }}</option>
                                  <option disabled value="">--Select--</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                              </select>
                              @error('lantai')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="col-md-4">
                              <label for="lokasi" class="form-label">Lokasi <span
                                      class="text-danger">*</span></label>
                              <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                     name="lokasi" id="lokasi" value="{{ old('lokasi', $data->lokasi) }}" placeholder="Contoh : Rg.GM GSD">
                              @error('lokasi')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                          </div>
                          <div class="col-md-12 mt-3"  style="margin-bottom: 10px">
                              <label for="petugas" class="form-label">Petugas <span
                                    class="text-danger">*</span></label>
                              <select
                                  class="form-control"
                                  data-placeholder="Choose anything" multiple="multiple" name="petugas[]" data-placeholder="Select a State"
                                  style="width: 100%;" id="select2-with-tags">
                                    @foreach ($data->users as $d)
                                          <option selected value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
                                    @foreach ($petugas as $id => $petug)
                                          <option value="{{ $id }}">{{ $petug }}</option>
                                    @endforeach
                              </select>
                              @error('petugas')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <div class="col-md-4">
                              <div class="mb-3 form-group">
                                    <label for="tanggal" class="form-label">Tanggal <span
                                          class="text-danger">*</span>
                                    </label>
                                    <div class="controls">
                                          <input
                                    class="form-control"
                                    type="text" name="tanggal" id="mdate"
                                    value="{{ old('tanggal', Illuminate\Support\Carbon::parse($data->tanggal)->format('Y-m-d')) }}">
                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                          {{ $message }}
                                    </div>
                                    @enderror
                                    </div>                        
                              </div>
                         </div>
                         <div class="col-md-4">
                              <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                              <select
                                  class="form-control @error('status') is-invalid @enderror"
                                  id="status" name="status">
                                  <option selected value="{{ $data->status }}">{{ $data->status }}</option>
                                  <option disabled value="">--Select--</option>
                                  <option value="Done">Done</option>
                                  <option value="Progress">Progress</option>
                                  <option value="Pending">Pending</option>
                              </select>
                              @error('status')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="col-md-4">
                              <label for="prioritas" class="form-label">Prioritas <span class="text-danger">*</span></label>
                              <select
                                  class="form-control @error('prioritas') is-invalid @enderror"
                                  id="prioritas" name="prioritas">
                                  <option selected value="{{ $data->prioritas }}">{{ $data->prioritas }}</option>
                                  <option disabled value="">--Select--</option>
                                  <option value="Rendah">Rendah</option>
                                  <option value="Tinggi">Tinggi</option>
                              </select>
                              @error('prioritas')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="col-md-4">
                              <label for="type" class="form-label">Type Tugas</label>
                              <select
                                  class="form-control @error('type') is-invalid @enderror"
                                  id="type" name="type">
                                  <option selected value="{{ $data->type }}">{{ $data->type }}</option>
                                  <option disabled value="">--Select--</option>
                                  <option value="Project">Project</option>
                                  <option value="Not Project">Not Project</option>
                              </select>
                              @error('type')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                           </div>
                           <div class="col-md-4">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select
                                class="form-control @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori">
                                <option selected value="{{ $data->kategori }}">{{ $data->kategori }}</option>
                                <option disabled value="">--Select--</option>
                                <option value="ME">ME</option>
                                <option value="CIVIL">CIVIL</option>
                            </select>
                            @error('kategori')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                         </div>
                         <div class="col-md-4">
                          <label for="jenis_pekerjaan" class="form-label">Jenis Jekerjaan</label>
                          <select
                              class="form-control @error('jenis_pekerjaan') is-invalid @enderror"
                              id="jenis_pekerjaan" name="jenis_pekerjaan">
                              <option selected value="{{ $data->jenis_pekerjaan }}">{{ $data->jenis_pekerjaan }}</option>
                              <option disabled value="">--Select--</option>
                              <option value="Tata Udara">Tata Udara</option>
                              <option value="Elektrikal">Elektrikal</option>
                              <option value="Mekanikal">Mekanikal</option>
                              <option value="Civil">Civil</option>
                          </select>
                          @error('jenis_pekerjaan')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                       </div>
                           <div class="col-md-8">
                            <label class="form-label" for="eviden">Eviden </label>
                            <input type="file" name="evidens[]" id="evidens" value="{{ old('eviden') }}" class="form-control @error('evidens') is-invalid @enderror"
                            multiple>
                            @error('evidens')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                        </div>
                    <div class="col-md-12">
                        <label class="form-label" for="keterangan">Keterangan </label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                  id="keterangan" rows="4" cols="4" value="{{ old('keterangan') }}"
                                  placeholder="Masukkan ketrangan tugas jika ada!(optional)">{{ $data->keterangan }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 d-flex flex-wrap">
                          @foreach ($data->evidens as $eviden)
                              <a href="{{ asset($eviden->path) }}" data-lightbox="photos" class="py-3 d-block mx-2">
                                  <img src="{{ asset($eviden->path) }}" class="img-fluid img-thumbnail" style="max-width: 200px;">
                              </a>
                          @endforeach
                      </div>
                  </div>                    
                    </div>
                      <div class="d-flex flex-wrap gap-6 mt-5">
                        <button type="submit" class="btn btn-primary">
                          Submit
                        </button>
                        <button type="reset" class="btn bg-danger-subtle text-danger">
                          Cancel
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
      </div>
</x-main>