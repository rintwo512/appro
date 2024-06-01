<x-main title="{{ $title }}">
    @once
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/modul_tools/ac-kal.js') }}"></script>
    @endonce

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="mt-2">BTU/h (British Thermal Unit per hour), Bisa dikatakan daya pendingin ac, BTU
                            menyatakan
                            kemampuan mengurangi panas / mendinginkan ruangan dengan luas dan kondisi tertentu selama 1
                            jam. Daya
                            listrik (Watt), Besarnya tenaga yang dibutuhkan ketika AC dalam kondisi menyala.</p>
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Kapasitas AC</th>
                                    <th>BTU/h</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1/2 PK</td>
                                    <td>5.000</td>
                                </tr>
                                <tr>
                                    <td>3/4 PK</td>
                                    <td>7.000</td>
                                </tr>
                                <tr>
                                    <td>1 PK</td>
                                    <td>9.000</td>
                                </tr>
                                <tr>
                                    <td>1,5 PK</td>
                                    <td>12.000</td>
                                </tr>
                                <tr>
                                    <td>2 PK</td>
                                    <td>18.000</td>
                                </tr>
                                <tr>
                                    <td>2,5 PK</td>
                                    <td>24.000</td>
                                </tr>
                                <tr>
                                    <td>3 PK</td>
                                    <td>27.000</td>
                                </tr>
                                <tr>
                                    <td>5 PK</td>
                                    <td>45.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="pasang-ac-custom-column" id="pasang_ac_column_tipe">
                            <div style="margin-bottom:0px;" class="pasang-ac-value-ladder">
                                <div class="form-group onoffswitch">
                                    <label>
                                        <input type="checkbox" class="onoffswitch-checkbox" id="on_off_advanced"
                                            name="on_off_advanced">
                                        Advanced Mode
                                    </label>
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </div>
                                <div class="form-group">
                                    <label id="pasang_ac_range_output" class="text-primary"
                                        style="font-size: 20px"></label>
                                    <input type="range" min="3" max="100" value="3"
                                        class="slider form-range my-range" id="myRange">
                                </div>
                                <div class="form-group">
                                    <label id="pasang_ac_range_output_lebar" class="text-primary"
                                        style="font-size: 20px"></label>
                                    <input type="range" min="3" max="100" value="3"
                                        class="slider form-range" id="myRangeLebar">
                                </div>
                                <div class="form-group" style="display:none" id="advanced_mode_container">
                                    <label id="pasang_ac_range_output_plafon" class="text-primary"
                                        style="font-size: 20px"></label>
                                    <input type="range" min="2.0" max="10.0" step="0.1" value="3"
                                        class="slider form-range" id="myRange_plafon">
                                    <div style="text-align:left" class="mb-2">
                                        <div class="advanced-column mb-3">
                                            <div class="pasang-ac-value-ladder-title"><b>Suhu Yang Di inginkan</b>
                                            </div>
                                            <label><input type="radio" class="advanced-radio" name="radio_suhu"
                                                    value="low" /> 25-26&#8451; &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_suhu"
                                                    value="medium" /> 23-24&#8451; &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_suhu"
                                                    value="high" /> > 23&#8451;</label>
                                        </div>

                                        <div class="advanced-column mb-3">
                                            <div class="pasang-ac-value-ladder-title"><b>Berapa orang (per 10m2)</b>
                                            </div>
                                            <label><input type="radio" class="advanced-radio" name="radio_orang"
                                                    value="low" /> 1-2 &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_orang"
                                                    value="medium" /> 3-6 &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_orang"
                                                    value="high" /> 10</label>
                                        </div>

                                        <div class="advanced-column mb-3">
                                            <div class="pasang-ac-value-ladder-title"><b>Aktivitas</b></div>
                                            <label><input type="radio" class="advanced-radio" name="radio_aktivitas"
                                                    value="low" /> Santai &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_aktivitas"
                                                    value="medium" /> Office &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_aktivitas"
                                                    value="high" />Olahraga</label>
                                        </div>

                                        <div class="advanced-column mb-3">
                                            <div class="pasang-ac-value-ladder-title"><b>Posisi Ruangan
                                                    Menghadap</b></div>
                                            <label><input type="radio" class="advanced-radio" name="radio_arah"
                                                    value="low" /> Utara, Selatan &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_arah"
                                                    value="medium" /> Tenggara,Timur Laut, Barat Daya, Barat Laut
                                                &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_arah"
                                                    value="high" /> Barat, Timur</label>
                                        </div>

                                        <div class="advanced-column mb-3">
                                            <div class="pasang-ac-value-ladder-title"><b>Jenis Lampu Yang
                                                    digunakan</b></div>
                                            <label><input type="radio" class="advanced-radio" name="radio_lampu"
                                                    value="low" /> LED &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_lampu"
                                                    value="medium" /> Neon &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_lampu"
                                                    value="high" /> Spot Light</label>
                                        </div>

                                        <div class="advanced-column mb-3">
                                            <div class="pasang-ac-value-ladder-title"><b>Jam Penggunaan</b></div>
                                            <label><input type="radio" class="advanced-radio" name="radio_hour"
                                                    value="low" /> Malam &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_hour"
                                                    value="medium" /> Pagi &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_hour"
                                                    value="high" /> 24 Jam</label>
                                        </div>

                                        <div class="advanced-column mb-3">
                                            <div class="pasang-ac-value-ladder-title"><b>Jenis Kaca</b></div>
                                            <label><input type="radio" class="advanced-radio" name="radio_glass"
                                                    value="low" /> Low-E Double Glass
                                                &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_glass"
                                                    value="medium" /> Double Glass
                                                &nbsp;</label>
                                            <label><input type="radio" class="advanced-radio" name="radio_glass"
                                                    value="high" /> Clear</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn btn-primary hitung-button pasang-ac-button my-2 mx-3 w-25 mb-3">
                                Hitung
                            </div>
                            <div style="display:none" class="pasang-ac-custom-column"
                                id="pasang_ac_custom_column_result">
                                <div style="text-align:left;margin-bottom:0px;"" class="pasang-ac-value-ladder">
                                    <div id="pk_calculator_result_title" class="pasang-ac-value-ladder-title">
                                        <b>Calculator&trade;</b>
                                    </div>

                                    <div style="font-size:24px;" class="pasang-ac-value-ladder-title">
                                        <b>Daya : <span class="count text-primary" id="count_btu"></span> Btu/h</b>
                                    </div>
                                    <div id="pk_result" style="font-size:24px;display:none"
                                        class="pasang-ac-value-ladder-title"><b>Kapasitas : <span class="text-primary"
                                                id="count_pk"></span> PK</b></div>

                                    <div
                                        style="border-radius: 5px;margin-bottom:10px;padding:5px 10px;background-color:#d9edf7;color:#3a87ad;border-color:#bce8f1">
                                        Perhitungan ini untuk ruangan yang pintu tidak terbuka tutup dengan tinggi
                                        plafon max 3m. Untuk ruangan yang sering terbuka tutup tambahkan 10% dari luas
                                        ruangan tersebut.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6>Rumus : Panjang(p) x Lebar(L) x Tinggi(t) x 200 atau 500</h6>
                        <h6>Contoh :</h6>
                        <small>Sebuah kamar dengan panjang 4m, lebar 3m, tinggi 3m dan di huni oleh 2 orang. Kapasitas AC yang
                            ideal untuk kamar tersebut adalah : 4 x 3 x 3 x 200 = 7200 Btu/h = 1pk</small>
                        <hr>

                        <h6>Keterangan :</h6>
                        <span>Satuan 200 digunakan apabila ruangan terisi dengan sedikit orang misalnya saja kurang dari 5 orang
                        didalamnya. Bila lebih, dan dalam kamar tersebut banyak barang elektronik yang menghasilkan panas
                        kamu harus mengkalikan jumlah tersebut dengan 500.</span>
                        <hr>
                        <h6>Contoh akurat :</h6>
                        <span>Untuk menghitung kapasitas AC yang dibutuhkan untuk kamar dengan panjang 2 meter, lebar 3 meter,
                        dan tinggi 3 meter, kita perlu mengikuti langkah-langkah berikut:</span><br><br>
                        <p>1. Hitung volume ruangan (V) dalam satuan kaki kubik (ft³) atau meter kubik (m³):
                            <br>
                            Volume (V) = Panjang × Lebar × Tinggi <br>
                            V = 2 m × 3 m × 3 m = 18 m³
                        </p>
                        <p>2. Konversi volume ruangan ke dalam satuan kaki kubik (ft³) jika perlu. (1 meter kubik = 35.315 ft³)
                            <br>
                            V ≈ 18 m³ × 35.315 ft³/m³ ≈ 635.77 ft³<br>
                        </p>
                        <p>3. Tentukan faktor konversi. Faktor konversi ini bergantung pada berbagai faktor, tetapi kita bisa menggunakan nilai umum, seperti 1 hingga 1,5.
                            <br>
                            Misalnya, kita gunakan faktor konversi = 1,2.<br>
                        </p>
                        <p>4. Tentukan perbedaan suhu antara suhu di dalam ruangan dengan suhu yang diinginkan. Misalnya, perbedaan suhu yang umum adalah 20°F hingga 25°F (atau sekitar 10°C hingga 14°C).<br>

                            Misalnya, kita gunakan perbedaan suhu = 20°F.<br>
                        </p>
                        <p>5. Gunakan rumus kapasitas AC: <br><br>

                            Kapasitas AC (dalam Btu/h) = Volume Ruangan × Faktor Konversi × Perbedaan Suhu<br>

                            Kapasitas AC ≈ 635.77 ft³ × 1,2 × 20°F<br>

                            Kapasitas AC ≈ 15266.48 Btu/h<br>
                        </p><br><br>
                        <p>Jadi, untuk kamar dengan panjang 2 meter, lebar 3 meter, dan tinggi 3 meter, kapasitas AC yang dibutuhkan adalah sekitar 15266.48 Btu/h.</p>
                        <hr>
                        <h6>Kesimpulan :</h6>
                        <span>Selain cara menghitung BTU AC, ada beberapa poin yang dipertimbangkan ketika membeli AC. Sebagai
                        contoh, posisi rumah perlu dilihat, apakah menghadap ke utara atau ke barat. Pasalnya, rumah yang
                        menghadap ke barat akan jauh lebih panas. Semakin banyak kaca, maka sinar matahari semakin mudah
                        masuk ke dalam ruangan. Alhasil, AC bekerja lebih keras untuk mendinginkan ruangan tersebut.</span>
                    </div>
                </div>
            </div>



</x-main>

