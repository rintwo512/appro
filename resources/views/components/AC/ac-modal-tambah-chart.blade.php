<x-modal class="modal-dialog modal-dialog-centered" id="modalTambahChart" titleId="titleModalTambahChart"
    bodyId="modal-body" dataFooter="d-none">
    <form action="{{ route('chart-ac.store') }}" class="row g-3 needs-validation" method="post" id="formUpdateChart">
        @csrf
        <div class="col-md-4">
            <input type="hidden" id="idChartUpdate" name="idUpdateChart">
            <label for="tahun" class="form-label">Tahun </label>
            <select class="form-control" id="tahun" name="tahun" required>
                <option value="">--Select--</option>
                <option value="{{ Illuminate\Support\Carbon::now()->format('Y') }}">
                    {{ Illuminate\Support\Carbon::now()->format('Y') }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="bulan" class="form-label">Bulan </label>
            <select class="form-control" id="bulan" name="bulan" required>
                <option value="">--Select--</option>
                @foreach (array_slice($month, Illuminate\Support\Carbon::now()->month - 1) as $mon)
                    @if (Illuminate\Support\Carbon::now()->format('F') == $mon)
                        <option value="{{ $mon }}">{{ $mon }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="totalUpdateChart" class="form-label">Jumlah </label>
            <input type="text" class="form-control @error('total') is-invalid @enderror" id="total"
                name="total" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required
                value="{{ old('total') }}">
            @error('total')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary col-md-2">Submit</button>

    </form>
</x-modal>
