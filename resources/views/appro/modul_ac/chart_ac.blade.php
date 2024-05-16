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
                        <li class="breadcrumb-item" aria-current="page">Chart AC</li>
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
                <button type="buttton" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalTambahChart" id="btnTambahChartAc">
                  <i class="bx bx-plus fs-4"></i>
                </button>                               
              </div>
            </div>

            <div class="row mb-3">
                  <div class="col-md-3">
                      <form id="searchForm">
                          @csrf
                      <div class="input-group">
                          <select class="form-select" name="updateTahun"
                                  id="updateTahun">
                              <option value="">Pilih Tahun</option>
                              @foreach ($listUpdateTahun as $list)
                                  <option value="{{ $list->tahun }}"
                                      {{ $list->tahun == $tahunTerpilih ? 'selected' : '' }}>
                                      {{ $list->tahun }}</option>
                              @endforeach
                          </select>
                           <button type="submit" class="btn btn-info">Cari</button>                         
                      </div>
                      </form>
                  </div>
                  <div class="col-md-3">
                      <form action="{{ route('chart.delete') }}" id="deleteAllChartForm" method="get">
                          @csrf
                      <div class="input-group margin">
                          <select class="form-select" name="deleteAllChart" id="deleteAllChart">
                              <option value="">Pilih Tahun</option>
                              @foreach ($listUpdateTahun as $list)
                                  <option value="{{ $list->tahun }}">{{ $list->tahun }}
                                  </option>
                              @endforeach
                          </select>
                           <button type="button" id="btnDeleteAllChart" class="btn btn-danger btn-flat">Hapus</button>
                         
                      </div>
                      </form>
                  </div>
              </div>
         
                  <x-table id="myTable" class="table table-striped table-bordered display text-nowrap">
                  <x-thead>
                    <!-- start row -->
                    <tr>
                      <th>Tahun</th>
                      <th>Bulan</th>
                      <th>Total</th>
                      <th>Opsi</th>                     
                    </tr>
                    <!-- end row -->
                  </x-thead>
                  <x-tbody>
                        @foreach ($data as $chart)
                        <tr id="idchart{{ $chart->id }}">
                            <td>{{ $chart->tahun }}</td>
                            <td>{{ $chart->bulan }}</td>
                            <td>{{ $chart->total }}</td>
                                    <td>
                                          <button type="button" id="btnEditChart" class="border-0 bg-transparent" data-bs-toggle="modal"
                                          data-bs-target="#modalUpdateChart"
                                          data-idchart="{{ $chart->id }}"
                                          data-tahunchart="{{ $chart->tahun }}"
                                          data-bulanchart="{{ $chart->bulan }}"
                                          data-totalchart="{{ $chart->total }}"><i class='bx bx-edit fs-6 text-info'></i></button>

                                          <a href="javascript:void(0)" id="btnDeleteChart" onclick="delDataChart({{ $chart->id }}, {{ $chart->tahun }})"><i class='bx bx-trash fs-6 text-danger'></i></a>
                                    </td>                             
                              </tr>
                        @endforeach            
                  </x-tbody>
                  <x-tfoot>
                    <!-- start row -->
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                    <!-- end row -->
                  </x-tfoot>
                </x-table>
             
            </div>
          </div>
          <!-- end Row selection and deletion (single row) -->
            </div>
      </div>
@include('components.AC.ac-modal-edit-chart')
@include('components.AC.ac-modal-tambah-chart')
</x-main>