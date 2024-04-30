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
                              <a class="text-muted text-decoration-none" href="{{ route('index.ac') }}">Data AC</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Update Data</li>
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
                    <h4 class="card-title mb-0"><a href="{{ route('index.ac') }}" class="btn btn-danger btn-sm"><i class='bx bx-left-arrow-alt'></i> Kembali</a></h4>
                  </div>
                  <div class="card-body">
                    <form novalidate="" action="{{ route('ac.update', ['ac' => $data->id]) }}" method="post">
                      @csrf
                      <div class="row mt-4">
                        <div class="col-md-4">
                              <div class="mb-3 form-group">
                                    <label class="form-label">Tanggal Pemasangan</label>
                                    <div class="controls">
                                          <input type="text"
                                       class="form-control @error('tgl_pemasangan') is-invalid @enderror"
                                       name="tgl_pemasangan" id="mdate2" value="{{ old('tgl_pemasangan', $data->tgl_pemasangan) }}">
                                       @error('tgl_pemasangan')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
                                    </div>                        
                              </div>
                         </div>
                         <div class="col-md-4">
                              <div class="mb-3 form-group">
                                    <label for="petugas_pemasangan" class="form-label">Petugas Pemasangan
                                    </label>
                                    <div class="controls">
                                          <input type="text" data-role="tagsinput"
                                       class="form-control"
                                       id="petugas_pemasangan" name="petugas_pemasangan"
                                       value="{{ old('petugas_pemasangan', $data->petugas_pemasangan) }}" placeholder="Contoh : nama1, nama2,">
                                    <small>Jika lebih dari 2 nama akhiri tiap nama dengan karakter koma ( , )</small>
                                    @error('petugas_pemasangan')
                                          <div class="invalid-feedback">
                                                {{ $message }}
                                          </div>
                                          @enderror
                                    </div>                        
                              </div>
                         </div>
                         <div class="col-md-4">
                              <div class="mb-3 form-group">
                                    <label for="tgl_maintenance" class="form-label">Tanggal Maintenance
                                    </label>
                                    <div class="controls">
                                          <input
                                    class="form-control"
                                    type="text" name="tgl_maintenance" id="mdate"
                                    value="{{ old('tgl_maintenance', $data->tgl_maintenance) }}">
                                    @error('tgl_maintenance')
                                    <div class="invalid-feedback">
                                          {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                              </div>
                         </div>
                      </div>    
                      <div class="row mt-4">
                        <div class="col-md-12">
                          <div class="col-md-12"  style="margin-bottom: 10px">
                            <label for="petugas_maint" class="form-label">Petugas Maintenance
                            </label>
                            <select
                                class="form-control"
                                data-placeholder="Choose anything" multiple="multiple" name="petugas_maint[]" data-placeholder="Select a State"
                                style="width: 100%;" id="select2-with-tags">
                                <option value="" disabled>--Select--</option>
                                        @foreach ($petugas as $petug)
                                            <option value="{{ $petug }}"
                                                {{ in_array($petug, explode(',', $data->petugas_maint)) ? 'selected' : '' }}>
                                                {{ $petug }}
                                            </option>
                                        @endforeach
                            </select>
                            @error('petugas_maint')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>                        
                      </div> 
                      <div class="row mt-4">
                        <div class="col-md-4">
                          <label for="id_ac" class="form-label">ID Perankgat</label>
                          <input type="text"
                                class="form-control text-capitalize @error('id_ac') is-invalid @enderror"
                                id="id_ac" name="id_ac" value="{{ old('id_ac', substr($data->id_ac, 6)) }}" placeholder="Contoh : 001">
                          @error('id_ac')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label for="asset" class="form-label">Asset </label>
                          <input type="text"
                                 class="form-control @error('asset') is-invalid @enderror"
                                 name="asset" id="asset" value="{{ old('asset', $data->asset) }}" placeholder="Contoh : GSD">
                          @error('asset')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                      </div>
                        <div class="col-md-4">
                          <label for="merk" class="form-label">Merk <span class="text-danger">*</span></label>
                          <select
                              class="form-control @error('merk') is-invalid @enderror"
                              id="merk" name="merk">
                              <option value="{{ $data->merk }}" selected>{{ $data->merk }}</option>
                              <option disabled value="">--Select--</option>
                              <option value="Daikin">Daikin</option>
                              <option value="General">General</option>
                              <option value="Panasonic">Panasonic</option>
                              <option value="LG">LG</option>
                              <option value="Sharp">Sharp</option>
                              <option value="Mitshubisi">Mitshubisi</option>
                              <option value="Midea">Midea</option>
                              <option value="Polytron">Polytron</option>
                              <option value="Toshiba">Toshiba</option>
                              <option value="AUX">AUX</option>
                          </select>
                          @error('merk')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                      </div>
                    </div>       
                    <div class="row mt-4">
                      <div class="col-md-4">
                        <label for="wing" class="form-label">Wing <span class="text-danger">*</span></label>
                        <select
                            class="form-control @error('wing') is-invalid @enderror"
                            id="wing" name="wing">
                            <option value="{{ $data->wing }}" selected>{{ $data->wing }}</option>
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
                        <label for="lantai" class="form-label">Lantai <span
                              class="text-danger">*</span></label>
                      <select class="form-control" id="lantai" name="lantai">
                          <option value="{{ $data->lantai }}" selected>{{ $data->lantai }}</option>
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
                      <label for="ruangan" class="form-label">Ruangan <span
                              class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('ruangan') is-invalid @enderror"
                             name="ruangan" id="ruangan" value="{{ old('ruangan', $data->ruangan) }}" placeholder="Contoh : Rg.GM GSD">
                      @error('ruangan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-4">
                        <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                        <select
                            class="form-control @error('type') is-invalid @enderror"
                            id="type" name="type">
                            <option value="{{ $data->type }}" selected>{{ $data->type }}</option>
                            <option disabled value="">--Select--</option>
                            <option value="Cassete">Cassete</option>
                            <option value="Wall Mounted">Wall Mounted</option>
                            <option value="Standing floor">Standing Floor</option>
                            <option value="Central">Central</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                      <label for="daya_pk" class="form-label">Daya PK <span
                              class="text-danger">*</span></label>
                      <select
                          class="form-control @error('daya_pk') is-invalid @enderror"
                          id="daya_pk" name="daya_pk">
                          <option value="{{ $data->datasheetAc->daya_pk }}" selected>{{ $data->datasheetAc->daya_pk }}</option>
                          <option disabled value="">--Select--</option>
                          <option value="1/2pk">1/2pk</option>
                          <option value="3/4pk">3/4pk</option>
                          <option value="1pk">1pk</option>
                          <option value="1,5pk">1,5pk</option>
                          <option value="2pk">2pk</option>
                          <option value="2,5pk">2,5pk</option>
                          <option value="3pk">3pk</option>
                          <option value="5pk">5pk</option>
                          <option value="8pk">8pk</option>
                          <option value="10pk">10pk</option>
                      </select>
                      @error('daya_pk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="col-md-4">
                    <label for="jenis" class="form-label">Jenis <span class="text-danger">*</span></label>
                    <select
                        class="form-control @error('jenis') is-invalid @enderror"
                        id="jenis" name="jenis">
                        <option value="{{ $data->jenis }}" selected>{{ $data->jenis }}</option>
                        <option disabled value="">--Select--</option>
                        <option value="Inverter">Inverter</option>
                        <option value="Convensional">Convensional</option>
                    </select>
                    @error('jenis')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                    </div>     
                    <div class="row mt-4">
                      <div class="col-md-4">
                        <label for="refrigerant" class="form-label">Refrigerant <span
                              class="text-danger">*</span></label>
                      <select class="form-control" id="refrigerant" name="refrigerant">
                          <option value="{{ $data->datasheetAc->refrigerant }}" selected>{{ $data->datasheetAc->refrigerant }}</option>
                          <option disabled value="">--Select--</option>
                          <option value="R22">R22</option>
                          <option value="R32">R32</option>
                          <option value="R410">R410</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="pipa" class="form-label">Pipa <small>(Cair +
                              Gas)(Inch)</small></label>
                      <select
                          class="form-control @error('pipa') is-invalid @enderror"
                          id="pipa" name="pipa">
                          <option value="{{ $data->datasheetAc->pipa }}" selected>{{ $data->datasheetAc->pipa }}</option>
                          <option disabled value="">--Select--</option>
                          <option value="1/4 + 3/8">1/4 + 3/8</option>
                          <option value="1/4 + 1/2">1/4 + 1/2</option>
                          <option value="1/4 + 5/8">1/4 + 5/8</option>
                          <option value="3/8 + 5/8">3/8 + 5/8</option>
                          <option value="3/8 + 3/4">3/8 + 3/4</option>
                          <option value="1/2 + 3/4">1/2 + 3/4</option>
                          <option value="1/2 + 7/8">1/2 + 7/8</option>
                          <option value="1/2 + 1 1/2">1/2 + 1 1/2</option>
                      </select>
                      @error('pipa')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="col-md-4">
                    <label for="current">Rated Current </label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control @error('current') is-invalid @enderror" name="current" id="current" value="{{ old('current', $dayaAmper) }}" placeholder="Contoh : 4">
                      {{-- <span class="input-group-text">A</span> --}}
                      <div class="input-group-append">
                        <select id="currentSatuan" class="form-control"
                            name="current_satuan">
                            <option value="A" selected>A</option>
                            <option value="mA">mA</option>
                        </select>
                    </div>
                      @error('current')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                    </div>  
                    <div class="row mt-4">
                      <div class="col-md-4">
                        <label class="form-label">Daya Listrik </label>
                        <div class="input-group">
                            <input type="text"
                                   class="form-control @error('daya_listrik') is-invalid @enderror"
                                   name="daya_listrik" value="{{ old('daya_listrik', $dayaListrik) }}"
                                   oninput="formatCurrency(this)" id="dayaListrik" placeholder="Contoh : 21.000">
                                   <div class="input-group-append">
                                    <select id="dayaListrikSatuan" class="form-control"
                                        name="daya_listrik_satuan">
                                        <option value="W" selected>W</option>
                                        <option value="kW">kW</option>
                                    </select>
                                </div>
                            @error('daya_listrik')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                      <label for="phase" class="form-label">Phase <span class="text-danger">*</span></label>
                      <select
                          class="form-control @error('phase') is-invalid @enderror"
                          id="phase" name="phase">
                          <option value="{{ $data->datasheetAc->phase }}" selected>{{ $data->datasheetAc->phase }}</option>
                          <option disabled value="">--Select--</option>
                          <option value="1">1</option>
                          <option value="3">3</option>
                      </select>
                      @error('phase')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Daya Pendingin </label>
                    <div class="input-group">
                        <input type="text"
                               class="form-control @error('daya_pendingin') is-invalid @enderror"
                               name="daya_pendingin" id="daya_pendingin"
                               value="{{ old('daya_pendingin', $dayaPendingin) }}" oninput="formatCurrency(this)"
                               id="dayaPendingin" placeholder="Contoh : 5.000">
                               <div class="input-group-append">
                                <select id="dayaPendinginSatuan" class="form-control" name="daya_pendingin_satuan">
                                    <option value="Btu/h" selected>Btu/h</option>
                                    <option value="Joule/h">Joule/h</option>
                                </select>
                            </div>
                        @error('daya_pendingin')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-3">
                        <label for="product" class="form-label">Product </label>
                        <input type="text"
                        class="form-control"
                        name="product" id="product" value="{{ old('product', $data->datasheetAc->product) }}" placeholder="Contoh : Thailand">
                        @error('product')                
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                      <label for="seriIndoor" class="form-label">No Seri Indoor
                      </label>
                      <input type="text"
                             class="form-control @error('seri_indoor') is-invalid @enderror"
                             name="seri_indoor" id="seriIndoor" value="{{ old('seri_indoor', $data->datasheetAc->seri_indoor) }}" placeholder="Contoh : RC25NV14">
                      @error('seri_indoor')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                    <div class="col-md-3">
                        <label for="seriOutdoor" class="form-label">No Seri Outdoor
                        </label>
                        <input type="text" class="form-control @error('seri_outdoor') is-invalid @enderror"
                               name="seri_outdoor" id="seriOutdoor" value="{{ old('seri_outdoor', $data->datasheetAc->seri_outdoor) }}" placeholder="Contoh : FTC25NV14">
                        @error('seri_outdoor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="beratIndoor" class="form-label">Berat Indoor <small>(kg)</small>
                        </label>
                        <input type="text" class="form-control"
                               name="berat_indoor" id="beratIndoor" value="{{ old('berat_indoor',$data->datasheetAc->berat_indoor) }}" placeholder="Contoh : 14" oninput="formatCurrency(this)">
                        @error('berat_indoor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-4">
                        <label for="beratOutdoor" class="form-label">Berat Outdoor <small>(kg)</small>
                        </label>
                        <input type="text" class="form-control"
                               name="berat_outdoor" id="beratOutdoor" value="{{ old('berat_outdoor',$data->datasheetAc->berat_outdoor) }}" placeholder="Contoh : 35" oninput="formatCurrency(this)">
                        @error('berat_outdoor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="dimensiIndoor" class="form-label">Dimensi Indoor <small>(cm)</small>
                        </label>
                        <input type="text" class="form-control"
                               name="dimensi_indoor" id="dimensiIndoor" value="{{ old('dimensi_indoor',$data->datasheetAc->dimensi_indoor) }}" placeholder="Contoh : 28cm x 77cm x 22cm">
                        @error('dimensi_indoor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="dimensiOutdoor" class="form-label">Dimensi Outdoor <small>(cm)</small>
                        </label>
                        <input type="text" class="form-control"
                               name="dimensi_outdoor" id="dimensiOutdoor" value="{{ old('dimensi_outdoor', $data->datasheetAc->dimensi_outdoor) }}" placeholder="Contoh : 59cm x 84cm x 30cm">
                        @error('dimensi_outdoor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-4">
                        <label for="kebisinganindoor" class="form-label">Kebisingan Indoor <small>Db(A)</small>
                        </label>
                        <input type="text" class="form-control"
                               name="kebisingan_indoor" id="kebisinganindoor" value="{{ old('kebisingan_indoor', $data->datasheetAc->kebisingan_indoor) }}" placeholder="Contoh : 42/26/19">
                        @error('kebisingan_indoor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="kebisinganOutdoor" class="form-label">Kebisingan Outdoor <small>Db(A)</small>
                        </label>
                        <input type="text" class="form-control"
                               name="kebisingan_outdoor" id="kebisinganOutdoor" value="{{ old('kebisingan_outdoor', $data->datasheetAc->kebisingan_outdoor) }}" placeholder="Contoh : 46/43">
                        @error('kebisingan_outdoor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status <span
                                class="text-danger">*</span></label>
                        <select
                            class="form-control @error('status') is-invalid @enderror"
                            id="status" name="status">
                            <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                            <option disabled value="">--Select--</option>
                            <option value="Normal">Normal</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Progres">Progres</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-6">
                        <label class="form-label" id="labelKerusakan">Kerusakan</label>
                        <textarea class="form-control @error('kerusakan') is-invalid @enderror"
                                  name="kerusakan" id="kerusakan" rows="4" cols="4"
                                  placeholder="Contoh : E3 / Kekurangan freon">{{ old('kerusakan', $data->kerusakan) }}</textarea>
                        @error('kerusakan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div id="colKeterangan" class="col-md-6">
                        <label class="form-label">Keterangan </label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                  name="keterangan" id="keterangan" rows="4" cols="4"
                                  placeholder="Sudah tidak bisa diperbaiki">{{ old('keterangan', $data->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">                          
                            {{ $message }}                          
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-4">
                        <label class="form-label">Catatan </label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan"
                                  id="catatan" rows="4" cols="4" value="{{ old('catatan') }}"
                                  placeholder="Butuh penggantian AC baru">{{ old('catatan', $data->catatan) }}</textarea>
                        @error('catatan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
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