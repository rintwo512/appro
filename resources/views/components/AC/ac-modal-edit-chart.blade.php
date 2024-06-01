<x-modal class="modal-dialog modal-dialog-centered" id="modalUpdateChart" titleId="titleModalEditChart" bodyId="modal-body"
    dataFooter="d-none">
    <form class="row g-3 needs-validation" method="post" id="formUpdateChart">
        @csrf

        <input type="hidden" id="idChartUpdate" name="idUpdateChart">
        <input type="hidden" id="tahunUpdateChart" name="tahunUpdateChart">
        <input type="hidden" id="monthUpdateChart" name="monthUpdateChart">

        <div class="col-md-12">
            <label for="totalUpdateChart" class="form-label">Jumlah </label>
            <input type="text" class="form-control" id="totalUpdateChart" name="totalUpdateChart"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
        </div>
        <button type="submit" id="btnUpdateChart1" class="btn btn-primary col-md-2">Submit</button>

    </form>
</x-modal>
