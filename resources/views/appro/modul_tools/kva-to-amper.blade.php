<x-main title="{{ $title }}">
    @once
        <script src="{{ asset('assets/js/modul_tools/kva-ampere.js') }}"></script>
    @endonce

    <style>
        #aunitsel,
        #vunitsel {
            border-left: none;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
        }
    </style>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">kVA to amps calculator</h4>
                        <form name="calcform" autocomplete="off">
                            <div class="form-group mb-3">
                                <label>Enter phase #</label>
                                <select id="phase" name="phase" onchange="OnPhaseChange()" class="form-control"
                                    autofocus>
                                    <option>Single phase</option>
                                    <option>Three phase</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>Enter kilovolt-amps</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="x1" min="0" step="any"
                                        class="form-control intext">
                                    <div class="input-group-append">
                                        <select id="aunitsel" class="form-control">

                                            <option selected>kA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Voltage type</label>
                                <select name="volt" class="form-control">
                                    <option>Line to line voltage</option>
                                    <option>Line to neutral voltage</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>Voltage (volts)</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="220" id="x2" name="x2"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <select id="vunitsel" class="form-control">
                                            <option>kV</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                <button type="button" title="Calculate" class="btn btn-primary mb-3" onclick="calc3()">
                                    <i class="bx bx-calculator fs-4"></i>
                                </button>
                                <button type="reset" title="Reset" class="btn btn-danger  mb-3" onclick="setfocus()">
                                    <i class="bx bx-refresh fs-4"></i>
                                </button>
                            </div>
                            <div class="col-md-12">
                                <label>Result Ampere</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="y" class="form-control" readonly id="result-amp">
                                    <span class="input-group-text">
                                        A
                                        </sp>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



</x-main>
