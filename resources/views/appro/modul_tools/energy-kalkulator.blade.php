<x-main title="{{ $title }}">
    @once
        <script src="{{ asset('assets/js/modul_tools/energy-kalkulator.js') }}"></script>
    @endonce

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form name="calcform" autocomplete="off">
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Peralatan elektronik</label>
                                <select class="form-control" name="Select4" onchange="OnSetPower()" autofocus>
                                    <option>-- select --</option>
                                    <option>Air conditioner</option>
                                    <option>Pengering pakaian</option>
                                    <option>Setrika pakaian</option>
                                    <option>Kipas</option>
                                    <option>Pemanas</option>
                                    <option>Oven microwave</option>
                                    <option>Komputer</option>
                                    <option>Laptop</option>
                                    <option>Lemari es</option>
                                    <option>TV</option>
                                    <option>Vacuum cleaner</option>
                                    <option>Mesin cuci</option>
                                    <option>Pemanas air</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-2">Daya Listrik</label>
                                <div class="input-group mb-3">
                                    <input type="number" min="0" step="any" name="Text1" class="form-control intext">
                                    <div class="input-group-append">
                                        <select name="Select2" class="form-control my-select">
                                            <option selected="selected">(W)</option>
                                            <option>(kW)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Jam penggunaan per hari</label>
                                <input type="number" step="any" min="0" max="24" name="Text2"
                                    class="form-control intext">
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Energi yang dikonsumsi per hari (kWh/hari)</label>
                                <input type="text" name="Text8" class="form-control outtext" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Energi yang dikonsumsi per bulan (kWh/bulan)</label>
                                <input type="text" name="Text9" class="form-control outtext" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Energi yang dikonsumsi per tahun (kWh/tahun)</label>
                                <input type="text" name="Text10" class="form-control outtext" readonly>
                            </div>
                            <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                <button onclick="OnEnergyCalc()" type="button" class="btn btn-primary">
                                    <i class="bx bx-calculator fs-4"></i>
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    <i class="bx bx-refresh fs-6"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="box-title mb-3">Menghitung Biaya Listrik per kWh</h3>
                        <div class="form-group">
                            <div id="placeKWH">

                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Daya Listrik</label>
                            <select class="form-control" id="iDaya">
                                <option value="415">450 VA (Subsidi) = Rp415/kWh - R1</option>
                                <option value="605">900 VA (Subsidi) = Rp605/kWh - R1</option>
                                <option value="1352">900 VA = Rp1352/kWh - R1</option>
                                <option value="1444.7">1300 VA = Rp1444.7/kWh - R1</option>
                                <option value="1444.7">2200 VA = Rp1444.7/kWh - R1</option>
                                <option value="1444.7">33000 – 5500 VA = Rp1444.7/kWh - R2</option>
                                <option value="1444.7">6600 VA ke atas = Rp1444.7/kWh - R3</option>
                                <option value="254">450 VA = Rp254/kWh - B1</option>
                                <option value="420">900 VA = Rp420/kWh - B1</option>
                                <option value="966">1300 VA = Rp966/kWh - B1</option>
                                <option value="1114.7">2200 – 5500 VA = Rp1.114,74/kWh - B1</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Total Biaya</label>
                            <input type="text" class="form-control" id="iBiaya" readonly>
                        </div>
                        <div class="box-footer">
                            <button type="button" id="hitungBiaya" class="btn btn-primary">Hitung</button>
                        </div>
                        <hr>
                        <h4>Rumus : Total kWh x tarif</h4>
                        <hr>
                        <h6>Cara menghitung :</h6>
                        <p>(Jumlah watt x Lama Pemakaian jam)/1000</p>
                        <p>Di bagi 1000 karena untuk menghitung biaya listrik mmenggunkan kWh</p>
                        <br>
                        <h6>Contoh :</h6>
                        <p>Jumlah watt = (100 watt x 4 jam)/1000 = 0.4 kWh</p>
                        <p>Biaya listrik = 0.4 kWh x 1.444.70 = Rp578 / hari</p>
                        <p>1.444.70 adalah tarif listrik R1 non-subsidi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Rumus</h3>
                        <hr>
                        <p>Rumus untuk menghitung konsumsi energi listrik (E) dalam kilowatt-jam (kWh) per hari
                            berdasarkan daya listrik (P) yang digunakan oleh suatu peralatan, alat, atau sistem selama
                            waktu tertentu (t) dalam sehari.</p><br>
                        <p>E (kWh perhari) = P (W) × t (jam perhari) / 1000 (faktor konversi)</p><br>
                        <p>Dalam rumus tersebut: <br><br>

                            <strong>-</strong> E adalah konsumsi energi listrik dalam satuan kilowatt-jam (kWh) per
                            hari. Kilowatt-jam merupakan satuan energi yang mengukur konsumsi listrik dalam jangka waktu
                            tertentu.<br><br>
                            <strong>-</strong> P adalah daya listrik peralatan atau sistem dalam satuan Watt (W). Daya
                            listrik adalah tingkat konsumsi atau penggunaan energi listrik oleh suatu perangkat atau
                            sistem.<br><br>
                            <strong>-</strong> t adalah waktu penggunaan peralatan atau sistem dalam sehari, diukur
                            dalam jam per hari.<br><br>
                            <strong>-</strong> 1000 adalah faktor konversi untuk mengubah daya dari Watt (W) menjadi
                            kilowatt (kW) karena 1 kilowatt = 1000 Watt.
                        </p><br>

                        <p>Dengan menggunakan rumus ini, Anda dapat menghitung seberapa banyak energi listrik yang
                            dikonsumsi oleh suatu peralatan atau sistem dalam sehari berdasarkan daya yang digunakan dan
                            lama waktu penggunaannya.</p> <br>

                        <h6>Contoh:</h6><br>
                        <p>Misalkan peralatan dengan daya listrik 1500 Watt (1,5 kW) dan digunakan selama 8 jam dalam
                            sehari. Untuk menghitung konsumsi energi listrik per hari (E), dapat menggunakan rumus:</p>

                        <span>E (kWh/hari) = 1500 W × 8 jam / 1000 W (1kW)</span><br>
                        <span>E (kWh/hari) = 12 kWh/hari</span> <br><br>

                        <p>Jadi, peralatan tersebut akan mengkonsumsi sekitar 12 kilowatt-jam (kWh) energi listrik
                            setiap harinya.</p>
                    </div>
                </div>
            </div>

        </div>



</x-main>
