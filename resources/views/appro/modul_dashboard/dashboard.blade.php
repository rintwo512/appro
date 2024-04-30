<x-main title="{{$title}}">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="card w-100 position-relative overflow-hidden">
          <div class="card-body">
            <div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="card-title mb-0" id="chartTitle"> Monthly Earnings </h4>
                <div>
                  <select class="form-select text-dark" name="tahun" id="tahun">
                    @foreach ($list_tahun as $tahun)
                        <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div id="yearly-salary" class="mx-n7"></div>              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-3">
        <div class="card border-start border-primary">
          <div class="card-body">
            <div class="d-flex  align-items-center">
              <div>
                <span class="text-primary display-6">
                  <i class='bx bx-server'></i>
                </span>
              </div>
              <div class="ms-auto">
                <h4 class="card-title fs-7">{{ $totalAc }}</h4>
                <p class="card-subtitle text-primary">Total AC Tireg7</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-start border-primary">
          <div class="card-body">
            <div class="d-flex  align-items-center">
              <div>
                <span class="text-primary display-6">
                  <i class='bx bx-server'></i>
                </span>
              </div>
              <div class="ms-auto">
                <h4 class="card-title fs-7">{{ $acRusak }}</h4>
                <p class="card-subtitle text-primary">Total AC Rusak</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-start border-primary">
          <div class="card-body">
            <div class="d-flex  align-items-center">
              <div>
                <span class="text-primary display-6">
                  <i class='bx bx-server'></i>
                </span>
              </div>
              <div class="ms-auto">
                <h4 class="card-title fs-7">{{ $mainten }}</h4>
                <p class="card-subtitle text-primary">Total Belum Mainten</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-start border-primary">
          <div class="card-body">
            <div class="d-flex  align-items-center">
              <div>
                <span class="text-primary display-6">
                  <i class='bx bx-server'></i>
                </span>
              </div>
              <div class="ms-auto">
                <h4 class="card-title fs-7">290</h4>
                <p class="card-subtitle text-primary">New Customers</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</x-main>

