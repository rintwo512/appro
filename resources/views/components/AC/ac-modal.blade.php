<!-- Modal -->
<x-modal id="modalDetailAC" titleId="modalDetailsTitle">
    <h5 class="d-flex justify-content-between align-items-center fs-3">Di tambahkan <strong
            id="detailCreateddAC"></strong>
    </h5>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">Di update <strong class="pull-right"
                id="detailUpdatedAC"></strong>
        <li class="list-group-item d-flex justify-content-between align-items-center">ID <strong class="pull-right"
                id="detailIDAC" class="text-capitalize"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Asset <strong class="pull-right"
                id="detailAssetsAC" class="text-capitalize"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Wing <strong class="pull-right"
                id="detailWingAC"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Lantai <strong class="pull-right"
                id="detailLantaiAC"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Ruangan <strong class="pull-right"
                id="detailRuanganAC" class="text-capitalize"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Merk <strong class="pull-right"
                id="detailMerkAC"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Status <strong class="pull-right"
                id="detailStatusAC"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal
            Pemasangan <strong class="pull-right" id="detailTanggaPemasanganAC"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal
            Maintenance <strong class="pull-right" id="detailTglMaintenanceAC" style="float:right"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="height: 120px">Petugas
            Pemasangan <strong class="pull-right" id="detailPetugasPemasanganAC" class="text-capitalize"></strong>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center" style="height: 120px">Petugas
            Maintenance <strong class="pull-right" id="detailPetugasMaintAC" class="pull-right"></strong>
        </li>
    </ul>
    <div class="col-12 mt-3">
        <!-- start Tab with dropdown -->
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home5" role="tab"
                            aria-controls="home5" aria-expanded="true">
                            <span>Spesifikasi</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0)"
                            role="button" aria-expanded="false">
                            <span id="dropdownText">Dropdown</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item dropdown-detail" id="dropdown1-tab" href="#dropdown1"
                                    role="tab" data-bs-toggle="tab" aria-controls="dropdown1">Case</a>
                            </li>
                            <li>
                                <a class="dropdown-item dropdown-detail" id="dropdown2-tab" href="#dropdown2"
                                    role="tab" data-bs-toggle="tab" aria-controls="dropdown2">Keterangan</a>
                            </li>
                            <li>
                                <a class="dropdown-item dropdown-detail" id="dropdown3-tab" href="#dropdown3"
                                    role="tab" data-bs-toggle="tab" aria-controls="dropdown3">Catatan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content tabcontent-border p-3" id="myTabContent">
                    <div role="tabpanel" class="tab-pane fade show active" id="home5" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Type</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailTypeAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Jenis</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailJenisAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Pipa Cair/Gas <mark>(Inch)</mark></strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailPipaAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Daya PK</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailDayaPKAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Daya Listrik</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailDayaListrikAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Refrigerant</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailRefrigerantAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Product</strong>
                            </div>
                            <div class="col-md-6 text-capitalize">
                                <p id="detailProductAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Current</strong>
                            </div>
                            <div class="col-md-6 text-capitalize">
                                <p id="detailCurrentAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Fasa</strong>
                            </div>
                            <div class="col-md-6 text-capitalize">
                                <p id="detailPhaseAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Kapasitas Pendingin</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailKapasitasPendinginAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>No Seri Indoor</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailSeriIndoorAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>No Seri Outdoor</strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailSeriOutdoorAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Berat Indoor <mark>(kg)</mark></strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailBeratIndoorAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Berat Outdoor <mark>(kg)</mark></strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailBeratOutdoorAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Dimensi Indoor <mark>(cm)</mark></strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailDimensiIndoorAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Dimensi Outdoor <mark>(cm)</mark></strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailDimensiOutdoorAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Kebisingan Indoor <mark>Db(A)</mark></strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailKebisinganIndoorAC"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Kebisingan Outdoor <mark>Db(A)</mark></strong>
                            </div>
                            <div class="col-md-6">
                                <p id="detailKebisinganOutdoorAC"></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dropdown1" role="tabpanel" aria-labelledby="dropdown1-tab">
                        <div class="card">
                            <div class="card-body">
                                <p id="detailKerusakanAC"></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dropdown2" role="tabpanel" aria-labelledby="dropdown2-tab">
                        <div class="card">
                            <div class="card-body">
                                <p id="detailKeteranganAC">detailKeteranganAC</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dropdown3" role="tabpanel" aria-labelledby="dropdown3-tab">
                        <div class="card">
                            <div class="card-body">
                                <p id="detailCatatanAC">detailCatatanAC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Tab with dropdown -->
    </div>
    {{-- ddfhudhf --}}
</x-modal>
