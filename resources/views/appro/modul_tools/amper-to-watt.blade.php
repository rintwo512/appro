<x-main title="{{ $title }}">
    @once
        <script src="{{ asset('assets/js/modul_tools/amper-to-watt.js') }}"></script>
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
                        <h4 class="card-title mb-4">Convert Ampere to Watt</h4>
                        <form id="calcform" name="calcform" autocomplete="off">
                            <div class="form-group mb-3">
                                <label>Current type</label>
                                <select id="phase" name="phase" onchange="OnPhaseChange()" class="form-control"
                                    autofocus>
                                    <option>DC</option>
                                    <option selected>AC - Single phase</option>
                                    <option>AC - Three phase</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>Current (amps)</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="x1" name="x1" class="form-control" required>
                                    <div class="input-group-append">
                                        <select id="aunitsel" class="form-control">
                                            <option>mA</option>
                                            <option selected>A</option>
                                            <option>kA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Voltage type</label>
                                <select id="volt" name="volt" class="form-control">
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
                                            <option>mV</option>
                                            <option selected>V</option>
                                            <option>kV</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3" id="pf1">
                                <label for="pf">Power factor (&le;1)</label>
                                <input type="text" id="pf" name="pf" value="1" class="form-control">
                            </div>
                            <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                <button type="button" title="Calculate" class="btn btn-primary" onclick="convert()">
                                    <i class="bx bx-calculator fs-4"></i>
                                </button>
                                <button type="reset" class="btn btn-danger" onclick="setfocus()">
                                    <i class="bx bx-refresh fs-6"></i>
                                </button>
                            </div>
                            <div class="col-md-12">
                                <label>Power (watts)</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="y" name="y" class="form-control" readonly>
                                    <span class="input-group-text">
                                        W
                                        </sp>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Power (kilowatts)</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="y2" name="y2" class="form-control" readonly>
                                    <span class="input-group-text">
                                        kW
                                        </sp>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Power (milliwatts)</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="y3" name="y3" class="form-control" readonly>
                                    <span class="input-group-text">
                                        mW
                                        </sp>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Rumus 1 Phase</h4>
                            <hr>
                            <p>P(W) = PF × I(A) × V(V)</p>
                            <br>
                            <br>
                            <p>P(W): Ini adalah daya aktif (real power) yang diukur dalam satuan Watt (W). Daya aktif adalah bagian dari daya total dalam suatu rangkaian yang digunakan untuk melakukan kerja riil, seperti menghasilkan cahaya, menggerakkan motor, atau menyediakan pemanasan.
                                <br><br>
                                PF: Ini adalah faktor daya (power factor) dalam bentuk desimal yang menunjukkan efisiensi penggunaan daya dalam suatu rangkaian. Faktor daya berkisar dari 0 hingga 1, dan semakin tinggi nilai faktor daya, semakin efisien pemanfaatan daya listrik dalam rangkaian tersebut.
                                <br><br>
                                I(A): Ini adalah arus listrik yang mengalir dalam rangkaian, diukur dalam satuan Ampere (A). Arus listrik adalah aliran muatan listrik melalui suatu rangkaian.
                                <br><br>
                                V(V): Ini adalah tegangan listrik antara dua titik dalam rangkaian, diukur dalam satuan Volt (V). Tegangan listrik merupakan perbedaan potensial antara dua titik dalam rangkaian yang menyebabkan aliran arus.
                                <br><br>
                                Persamaan tersebut menyatakan bahwa daya aktif (P) dalam satuan Watt (W) dihitung dengan cara mengalikan faktor daya (PF) dengan perkalian antara arus listrik (I) dalam satuan A dan tegangan listrik (V) dalam satuan V.
                                <br><br>
                                Jadi, untuk menghitung daya aktif (P) dalam suatu rangkaian, bisa menggunakan rumus berikut:
                                <br><br>
                                P(W) = PF × I(A) × V(V)
                                <br><br>
                                Sebagai contoh, jika Anda memiliki suatu rangkaian dengan faktor daya 0,8 arus listrik sebesar 5 A dan tegangan listriknya sebesar 220 V, maka daya aktifnya akan menjadi:
                                <br><br>
                                P(W) = 0,8 × 5 A × 220 V = 880 W
                                <br><br>
                                Faktor daya penting untuk memahami sejauh mana daya yang dihasilkan oleh sumber listrik dapat dimanfaatkan secara efisien. Semakin tinggi nilai faktor daya, semakin sedikit daya yang terbuang percuma dan semakin efisien pemanfaatan daya dalam rangkaian tersebut.</p>
                            <br>
                            <br>
                            <br>
                            <h4>Rumus 3 Phase</h4>
                            <h5>Perhitungan dengan tegangan line to line</h5>
                            <hr>
                            <p>Daya P dalam watt (W) sama dengan akar kuadrat dari 3 kali faktor daya PF kali arus fasa I dalam amp (A), dikalikan tegangan line to line VL-L dalam volt (V):</p>
                            <p>P(W) = √3 × PF × I(A) × VL-L(V)</p>
                            <br>
                            <br>
                            <p>Contoh</p>
                            <br>
                            <br>
                            <p>Misalkan Anda memiliki sebuah mesin industri yang terhubung ke sistem tiga fasa dengan faktor daya 0,9. Arus listrik yang mengalir ke mesin tersebut adalah 50 Ampere, dan tegangan antara dua fasa (VL-L) adalah 400 Volt.
                                <br>
                                <br>
                                Langkah 1: Hitung akar kuadrat dari 3 (√3):
                                <br>
                                √3 ≈ 1.732
                                <br>
                                <br>
                                Langkah 2: Gunakan rumus daya tiga fasa:
                                <br>
                                P(W) = 1.732 × PF × I(A) × VL-L(V)
                                <br>
                                <br>
                                Langkah 3: Gantikan nilai yang diketahui ke dalam rumus dan hitung:
                                <br>
                                P(W) = 1.732 × 0.9 × 50 A × 400 V
                                P(W) = 1.732 × 0.9 × 20000 VA
                                P(W) ≈ 31152 Watt
                                <br>
                                <br>

                                Jadi, daya aktif (real power) tiga fasa yang dikonsumsi oleh mesin industri tersebut sekitar 31152 Watt atau 31.152 kW.</p>
                            <hr>
                            <h5>Perhitungan dengan tegangan line to netral voltage</h5>
                            <p>Daya P dalam watt (W) sama dengan 3 kali faktor daya PF dikalikan arus fasa I dalam ampere (A), dikalikan line to tegangan netral VL-N dalam volt (V):</p>
                            <p>P(W) = 3 × PF × I(A) × VL-N(V)</p>
                    </div>
                </div>
            </div>
        </div>

    </div>



</x-main>
