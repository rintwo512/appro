<x-main title="{{ $title }}">     
      <div class="container-fluid">
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
              <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                  <div class="col-9">
                    <h4 class="fw-semibold mb-8">Databases</h4>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a class="text-muted text-decoration-none" href="{{ route('index.ac') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Data AC</li>
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
            <div class="datatables">
      <!-- start Row selection and deletion (single row) -->
      <div class="card">
            <div class="card-body">              
             {{-- BTN --}}
             <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                @if ($btnCreate)                    
                <a href="{{ route('ac.create') }}" class="btn btn-secondary" id="btnCreateAC" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Tambah Data">
                  <i class="bx bx-plus fs-4"></i>
                </a>
                @endif
                <a href="{{ route('ac.export') }}" class="btn btn-secondary" id="exportExcel" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Export Excel">
                  <i class="bx bx-printer fs-4"></i>
                </a>                
                <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Grafik Maintenance">
                  <i class="bx bx-bar-chart-alt-2 fs-4"></i>
                </button>                
                <a href="{{ route('ac.recycle.bin') }}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Recycle Bin">
                  <i class="bx bx-trash fs-4"></i>
                </a>
                <div class="btn-group" role="group">
                  <button id="btnFilterAc" type="button" class="btn btn-secondary  dropdown-toggle rounded-end" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-search-alt-2'></i>
                    <div class="dropdown-menu" aria-labelledby="btnFilterAc">
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-attribute="jenis" data-value="Inverter">Jumlah AC Inverter</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-attribute="type" data-value="Cassete">Jumlah AC Cassete</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-attribute="type" data-value="Wall Mounted">Jumlah AC Split</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-attribute="type" data-value="Standing Floor">Jumlah AC Standing</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="1" data-value="WA">Jumlah AC Wing A 1</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="2" data-value="WA">Jumlah AC Wing A 2</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="3" data-value="WA">Jumlah AC Wing A 3</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="1" data-value="WB">Jumlah AC Wing B 1</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="2" data-value="WB">Jumlah AC Wing B 2</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="3" data-value="WB">Jumlah AC Wing B 3</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="1" data-value="WC">Jumlah AC Wing C 1</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="2" data-value="WC">Jumlah AC Wing C 2</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="1" data-value="WD">Jumlah AC Wing D 1</a>
                      <a class="dropdown-item filter-data-ac" href="javascript:void(0)" data-lantai="2" data-value="WD">Jumlah AC Wing D 2</a>
                    </div>
                  </button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control input-range-ac-baru showdropdowns" name="rangeQueryAcBaru" placeholder="Cari data berdasarkan tanggal" />
  
                  <button class="btn btn-primary" type="button" id="btnRangeAcBaru" data-url="{{ url('data-ac-baru') }}">
                    Cari
                  </button>
                </div>
              </div>
            </div>
             {{-- BTN --}}
              <div class="table-responsive">
                  <table id="myTable" class="table table-striped table-bordered display text-nowrap">
                  <thead>
                    <!-- start row -->
                    <tr>
                      <th>ID</th>
                      <th>Wing</th>
                      <th>Lantai</th>
                      <th>Ruangan</th>
                      <th>Tgl Mainten</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                    <!-- end row -->
                  </thead>
                  <tbody>
                        @foreach ( $datas as $ac)
                              <!-- start row -->
                              <tr>
                              <td>{{ $ac->id_ac }}</td>
                              <td>{{ $ac->wing }}</td>
                              <td>{{ $ac->lantai }}</td>
                              <td>{{ $ac->ruangan }}</td>
                              <td>{{ $ac->tgl_maintenance ? Illuminate\Support\Carbon::parse($ac->tgl_maintenance)->locale('id')->diffForHumans() : '' }}</td>
                              <td>
                                @if ($ac->status == "Normal")
                                    <span class="badge bg-success">{{ $ac->status }}</span>
                               @elseif ($ac->status == "Progres")
                                    <span class="badge bg-warning">{{ $ac->status }}</span>
                               @elseif ($ac->status == "Rusak")
                                    <span class="badge bg-danger">{{ $ac->status }}</span>
                               @endif
                              </td>
                              <td>

                                <div class="btn-group">
                                  <button type="button" class="btn bg-info-subtle text-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                  </button>
                                  <ul class="dropdown-menu animated flipInX" style="">
                                    <li>
                                      @if ($btnEdit)
                                      <a class="dropdown-item" href="{{ route('ac.edit', ['ac' => $ac->id]) }}" id="btnEditAC"><i class="bx bx-edit"></i> Update</a>
                                      @endif
                                    </li>
                                    <li>
                                      @if ($btnDetail)
                                      <button class="dropdown-item" id="btnDetailAC" data-bs-toggle="modal" data-bs-target="#modalDetailAC" data-id="{{ $ac->id }}" data-idac="{{ $ac->id_ac }}" data-assetac="{{ $ac->asset }}" data-wingac="{{ $ac->wing }}" data-lantaiac="{{ $ac->lantai }}" data-ruanganac="{{ $ac->ruangan }}" data-merkac="{{ $ac->merk }}" data-typeac="{{ $ac->type }}" data-jenisac="{{ $ac->jenis }}" data-dayapkac="{{ $ac->datasheetAc->daya_pk }}" data-dayalistrikac="{{ $ac->datasheetAc->daya_listrik }}" data-refrigerantac="{{ $ac->datasheetAc->refrigerant }}" data-productac="{{ $ac->datasheetAc->product }}" data-currentac="{{ $ac->datasheetAc->current }}" data-phaseac="{{ $ac->datasheetAc->phase }}" data-dayapendinginac="{{ $ac->datasheetAc->daya_pendingin }}" data-pipaac="{{ $ac->datasheetAc->pipa }}" data-statusac="{{ $ac->status }}" data-seriindoorac="{{ $ac->datasheetAc->seri_indoor }}" data-beratindoorac="{{ $ac->datasheetAc->berat_indoor }}" data-dimensiindoorac="{{ $ac->datasheetAc->dimensi_indoor }}" data-kebisinganindoorac="{{ $ac->datasheetAc->kebisingan_indoor }}" data-serioutdoorac="{{ $ac->datasheetAc->seri_outdoor }}" data-beratoutdoorac="{{ $ac->datasheetAc->berat_outdoor }}" data-dimensioutdoorac="{{ $ac->datasheetAc->dimensi_outdoor }}" data-kebisinganoutdoorac="{{ $ac->datasheetAc->kebisingan_outdoor }}" data-catatanac="{{ $ac->catatan }}" data-keteranganac="{{ $ac->keterangan }}" data-kerusakanac="{{ $ac->kerusakan }}" data-tglpemasanganac="{{ $ac->tgl_pemasangan}}" data-petugasmaintac="{{ str_replace(',', "<br>", $ac->petugas_maint) }}" data-petugaspemasanganac="{{ str_replace(',', "<br>",$ac->petugas_pemasangan) }}" data-tanggalmaintenanceac="{{ $ac->tgl_maintenance ? Illuminate\Support\Carbon::parse($ac->tgl_maintenance)->locale('id')->diffForHumans() : '' }}" data-updatedtimeac="{{ $ac->user_updated ? $ac->user_updated.'/'.Illuminate\Support\Carbon::parse($ac->user_updated_time)->diffForHumans() : '' }}"><i class="bx bx-low-vision"></i> Detail</button>
                                      @endif
                                    </li>
                                    <li>
                                      @if ($btnDelete)
                                      <a class="dropdown-item" id="btnDeleteAC" href="{{ route('ac.delete', ['id' => $ac->id])}}"><i class="bx bx-trash"></i> Delete</a>
                                      @endif
                                    </li>
                                    <li>
                                      <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                      <a class="dropdown-item" href="{{ route('ac.export.pdf', ['id' => $ac->id]) }}"><i class='bx bxs-file-export'></i> Export PDF</a>
                                    </li>
                                  </ul>
                                </div>
                              </td>
                              </tr>
                              <!-- end row -->
                        @endforeach                   
                       
                  </tbody>
                  <tfoot>
                    <!-- start row -->
                    <tr>
                      <th>ID</th>
                      <th>Wing</th>
                      <th>Lantai</th>
                      <th>Ruangan</th>
                      <th>Tgl Mainten</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                    <!-- end row -->
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- end Row selection and deletion (single row) -->
            </div>
      </div>
      
      @include('components.AC.ac-modal')
      @include('components.AC.ac-modal-range-ac-baru')
      @include('components.AC.ac-modal-filter')

</x-main>