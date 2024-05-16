<x-modal id="modalUpdateChart" titleId="titleModalEditChart" bodyId="modal-body">
      <form class="row g-3 needs-validation" method="post" id="formUpdateChart">
            @csrf
            <div class="col-md-4">
                <input type="hidden" id="idChartUpdate" name="idUpdateChart">
                <label for="tahunUpdateChart" class="form-label">Tahun </label>
                <select class="form-control" id="tahunUpdateChart" name="tahunUpdateChart" required>
                    <option value="">--Select--</option>
                    <option value="{{ Illuminate\Support\Carbon::now()->format('Y') }}">{{ Illuminate\Support\Carbon::now()->format('Y') }}</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="monthUpdateChart" class="form-label">Bulan </label>
                <select class="form-control" id="monthUpdateChart" name="monthUpdateChart" required>
                    <option value="">--Select--</option>
                    @foreach (array_slice($month, Illuminate\Support\Carbon::now()->month - 1) as $mon)
                        <option value="{{ $mon }}">{{ $mon }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="totalUpdateChart" class="form-label">Unit </label>
                <input type="text" class="form-control" id="totalUpdateChart" name="totalUpdateChart"
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
            </div>
        <button type="submit" id="btnUpdateChart1" class="btn btn-primary col-md-2" disabled>Submit</button>
    
    </form>
</x-modal>