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
                <a href="{{ route('index.ac') }}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Kembali">
                  <i class='bx bx-left-arrow-alt fs-4'></i>
                </a>
                <a href="{{ route('ac.hapus.permanent') }}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Semua Data" id="btnDeletePermanent">
                  <i class="bx bx-trash fs-4"></i>
                </a>                               
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
                              <td>{{ Illuminate\Support\Carbon::parse($ac->tgl_maintenance)->locale('id')->diffForHumans() }}</td>
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
                                   
                                          <button class="btn btn-info btn-sm" id="recycleBin" data-bs-toggle="modal" data-bs-target="#modalRecycle" data-id="{{ $ac->id }}" data-idac="{{ $ac->id_ac }}" data-assetac="{{ $ac->asset }}" data-wingac="{{ $ac->wing }}" data-lantaiac="{{ $ac->lantai }}" data-ruanganac="{{ $ac->ruangan }}" data-merkac="{{ $ac->merk }}" data-typeac="{{ $ac->type }}" data-jenisac="{{ $ac->jenis }}" data-dayapkac="{{ $ac->datasheetAc->daya_pk }}" data-dayalistrikac="{{ $ac->datasheetAc->daya_listrik }}" data-refrigerantac="{{ $ac->datasheetAc->refrigerant }}" data-productac="{{ $ac->datasheetAc->product }}" data-currentac="{{ $ac->datasheetAc->current }}" data-phaseac="{{ $ac->datasheetAc->phase }}" data-dayapendinginac="{{ $ac->datasheetAc->daya_pendingin }}" data-pipaac="{{ $ac->datasheetAc->pipa }}" data-statusac="{{ $ac->status }}" data-seriindoorac="{{ $ac->datasheetAc->seri_indoor }}" data-beratindoorac="{{ $ac->datasheetAc->berat_indoor }}" data-dimensiindoorac="{{ $ac->datasheetAc->dimensi_indoor }}" data-kebisinganindoorac="{{ $ac->datasheetAc->kebisingan_indoor }}" data-serioutdoorac="{{ $ac->datasheetAc->seri_outdoor }}" data-beratoutdoorac="{{ $ac->datasheetAc->berat_outdoor }}" data-dimensioutdoorac="{{ $ac->datasheetAc->dimensi_outdoor }}" data-kebisinganoutdoorac="{{ $ac->datasheetAc->kebisingan_outdoor }}" data-catatanac="{{ $ac->catatan }}" data-keteranganac="{{ $ac->keterangan }}" data-kerusakanac="{{ $ac->kerusakan }}" data-tglpemasanganac="{{ $ac->tgl_pemasangan }}" data-petugasmaintac="{{ str_replace(',', "<br>", $ac->petugas_maint) }}" data-petugaspemasanganac="{{ str_replace(',', "<br>",$ac->petugas_pemasangan) }}" data-tanggalmaintenanceac="{{ Illuminate\Support\Carbon::parse($ac->tgl_maintenance)->locale('id')->diffForHumans() }}" data-deleted="{{ $ac->is_delete }}/{{ Illuminate\Support\Carbon::parse($ac->deleted_at)->diffForHumans() }}"><i class="{{ $btnDetail->icon}}"></i> Detail</button>
                                        </li>
                                       
                                          <a class="btn btn-secondary btn-sm" id="btnRestoreAc" href="{{ route( 'ac.restore', ['id' => $ac->id])}}"><i class='bx bx-download'></i> Restore</a>
                                        
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
      @include('components.AC.ac-modal-recycle-bin')

</x-main>