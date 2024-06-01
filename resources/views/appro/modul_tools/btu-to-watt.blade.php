<x-main title="{{ $title }}">
    @once
        <script src="{{ asset('assets/js/modul_tools/btu-to-watt.js') }}"></script>
    @endonce

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Convert Btu to Watt</h4>
                        <form name="calcform">
                            <div class="form-group mb-3">
                                <label>Masukkan Btu/h :</label>
                                <input type="number" name="x" id="x" class="intext form-control"
                                    placeholder="Btu/h">
                            </div>
                            <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                <button type="button" title="Calculate" class="btn btn-primary" onclick="calc()">
                                    <i class="bx bx-calculator fs-4"></i>
                                </button>
                                <button type="reset" class="btn btn-danger" nclick="setfocus()">
                                    <i class="bx bx-refresh fs-6"></i>
                                </button>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Hasil: dalam satuan watt</label>
                                <div class="input-group mb-3">
                                    <input name="y" class="outtext form-control" placeholder="Watt" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Tabel konversi Btu/h ke Watt</h4>
                        <table class="table mb-0 table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Power (BTU/hr)</th>
                                    <th scope="col">Power (watt)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 BTU/h</td>
                                    <td>0.293 Watt</td>
                                </tr>
                                <tr>
                                    <td>10 BTU/h</td>
                                    <td>2.93 Watt</td>
                                </tr>
                                <tr>
                                    <td>100 BTU/h</td>
                                    <td>29.3 Watt</td>
                                </tr>
                                <tr>
                                    <td>1000 BTU/h</td>
                                    <td>293 Watt</td>
                                </tr>
                                <tr>
                                    <td>10000 BTU/h</td>
                                    <td>2930 Watt</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Rumus konversi Btu/hr ke watt</h4>
                        <hr>
                        <p>Daya P dalam watt (W) sama dengan daya P dalam BTU per jam (BTU/jam) dikali 0,29307107
                            dan sama
                            dengan daya P dalam BTU per jam (BTU/jam) dibagi 3.412141633:</p>
                        <p>P(W) = P(BTU/hr) × 0.29307107 = P(BTU/hr) / 3.412141633</p>
                        <br>

                        <ul>
                            <li>- P(W): Ini adalah daya aktif (real power) dalam satuan Watt (W). Daya aktif adalah
                                bagian dari
                                daya total dalam suatu rangkaian yang digunakan untuk melakukan kerja riil, seperti
                                menghasilkan
                                cahaya, menggerakkan motor, atau menyediakan pemanasan.</li>
                            <br>
                            <li>- P(BTU/hr): Ini adalah daya dalam satuan British Thermal Units per jam (BTU/hr).
                                BTU adalah unit
                                energi panas yang digunakan dalam sistem Imperial, terutama di Amerika Serikat.
                                Jadi, P(BTU/hr)
                                menunjukkan tingkat produksi energi panas dalam BTU per jam.</li><br>
                            <li>- 0.29307107: Ini adalah faktor konversi yang digunakan untuk mengubah daya dari
                                satuan BTU/hr
                                menjadi Watt. Angka ini diperoleh dari perhitungan bahwa 1 BTU/hr setara dengan
                                0.29307107 Watt.
                            </li><br>
                            <li>- 3.412141633: Ini adalah faktor konversi yang digunakan untuk mengubah daya dari
                                satuan Watt
                                menjadi BTU/hr. Angka ini diperoleh dari perhitungan bahwa 1 Watt setara dengan 1 /
                                3.412141633
                                BTU/hr.</li><br>
                        </ul>
                        <h6>Contoh1</h6>
                        <p>Misalkan Anda memiliki sebuah perangkat pemanas yang memiliki daya 5000 BTU/hr. Untuk
                            mengkonversinya ke Watt, Anda bisa menggunakan faktor konversi 0.29307107:</p>
                        <p>P(W) = P(BTU/hr) × 0.29307107
                            <br>
                            P(W) = 5000 BTU/hr × 0.29307107
                            <br>
                            P(W) ≈ 1465.35535 Watt
                        </p>
                        <br>
                        Jadi, daya pemanas tersebut sekitar 1465.35535 Watt.
                        <br>
                        <br>
                        <h6>Contoh2</h6>
                        <p>Misalkan Anda memiliki lampu dengan daya 100 Watt. Untuk mengkonversinya ke BTU/hr, Anda
                            bisa menggunakan faktor konversi 1 / 3.412141633:</p>
                        <p>P(BTU/hr) = P(W) / 3.412141633
                            <br>
                            P(BTU/hr) = 100 Watt / 3.412141633
                            <br>
                            P(BTU/hr) ≈ 29.307107 BTU/hr

                            <br>
                            <br>
                            Jadi, daya lampu tersebut sekitar 29.307107 BTU/hr.
                        </p>
                    </div>
                </div>
            </div>

        </div>



</x-main>
