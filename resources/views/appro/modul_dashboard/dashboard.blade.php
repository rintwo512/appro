<x-main title="{{ $title }}">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h4 class="card-title mb-0" id="chartTitle"> Maintenance AC </h4>
                                <div>
                                    <span id="ruteChart" data-rute="{{ route('chart.getchart') }}"></span>
                                    <select class="form-select text-dark" name="tahun" id="tahun">
                                        @foreach ($list_tahun as $tahun)
                                            <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="dashboard-chart-ac" class="mx-n7"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="card border-start border-primary">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <span class="text-primary display-6">
                                    <i class='bx bx-server'></i>
                                </span>
                            </div>
                            <div class="ms-auto">
                                <p class="card-subtitle text-primary">Total AC Tireg7</p>
                                <h4 class="card-title fs-7">{{ $totalAc }} Unit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-start border-primary">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <span class="text-primary display-6">
                                    <i class='bx bx-server'></i>
                                </span>
                            </div>
                            <div class="ms-auto">
                                <p class="card-subtitle text-primary">Tidak Aktif</p>
                                <h4 class="card-title fs-7">{{ $acRusak }} Unit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-start border-primary">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <span class="text-primary display-6">
                                    <i class='bx bx-server'></i>
                                </span>
                            </div>
                            <div class="ms-auto">
                                <p class="card-subtitle text-primary">Belum Maintenance</p>
                                <h4 class="card-title fs-7">{{ $mainten }} Unit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- LINE --}}

            <div class="col-md-6">
                <div class="card border-start border-info">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <span class="text-info display-6">
                                    <i class='bx bx-book-alt'></i>
                                </span>
                            </div>
                            <div class="ms-auto">
                                <p class="card-subtitle text-info">Logbook
                                    {{ Illuminate\Support\Carbon::now()->translatedFormat('F Y') }}</p>
                                <h4 class="card-title fs-7">{{ $totalLogbook }} Tugas</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-start border-info">
                    <div class="card-body">
                        <div class="d-flex  align-items-center">
                            <div>
                                <span class="text-info display-6">
                                    <i class='bx bx-book-alt'></i>
                                </span>
                            </div>
                            <div class="ms-auto">
                                <p class="card-subtitle text-info"> Tugas Done </p>
                                <h4 class="card-title fs-7">{{ $totalLogbookDone }} Tugas</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-main>
