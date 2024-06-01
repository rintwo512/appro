<x-main title="{{ $title }}">
    @once
        <script src="{{ asset('assets/js/modul_tools/amper-to-va.js') }}"></script>
    @endonce

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Convert Ampere to Volt Ampere</h4>
                        <form name="calcform" autocomplete="off" class="form-horizontal">
                            <div class="form-group mb-3">
                                <label>Phase</label>
                                <select class="form-control" name="phase" autofocus>
                                    <option>Single phase</option>
                                    <option>Three phase</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Enter amps (A):</label>
                                <input type="text" min="1" step="any" name="x1"
                                    class="form-control intext"
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                            <div class="form-group mb-3">
                                <label>Enter line to line volts (V):</label>
                                <input type="text" min="1" step="any" name="x2"
                                    class="form-control intext"
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                            <div class="form-group mb-3">
                                <label>Result (VA):</label>
                                <input type="text" name="y" class="form-control outtext" readonly>
                            </div>
                            <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                <button type="button" class="btn btn-primary" onclick="calc3()">
                                    <i class="bx bx-calculator fs-4"></i>
                                </button>
                                <button type="reset" class="btn btn-danger" onclick="setfocus()">
                                    <i class="bx bx-refresh fs-6"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Rumus</h4>
                        <h5>Rumus 1 Phase</h5>
                        <hr>
                        <p>S(VA) = I(A) × V(V)</p>
                        <br><br>
                        <p>S(VA): Ini adalah daya aktif (active power) yang diukur dalam satuan Volt-Ampere (VA). Daya
                            aktif adalah bagian dari daya total dalam suatu rangkaian yang digunakan untuk melakukan
                            kerja riil, misalnya, untuk menggerakkan mesin atau menyediakan penerangan.
                            <br><br>
                            I(A): Ini adalah arus listrik yang mengalir dalam rangkaian, diukur dalam satuan Ampere (A).
                            Arus listrik adalah aliran muatan listrik melalui suatu rangkaian.
                            <br><br>
                            V(V): Ini adalah tegangan listrik antara dua titik dalam rangkaian, diukur dalam satuan Volt
                            (V). Tegangan listrik merupakan perbedaan potensial antara dua titik dalam rangkaian yang
                            menyebabkan aliran arus.
                            <br><br>
                            Persamaan tersebut menyatakan bahwa daya aktif (S) dalam satuan VA diukur dengan cara
                            mengalikan arus listrik (I) dalam satuan A dengan tegangan listrik (V) dalam satuan V.
                            <br><br>
                            Jadi, untuk menghitung daya aktif (S) dalam rangkaian, bisa menggunakan rumus berikut:
                            <br><br>
                            S(VA) = I(A) × V(V)
                            <br><br>
                            Sebagai contoh, jika Anda memiliki suatu rangkaian dengan arus listrik sebesar 5 A dan
                            tegangan listriknya sebesar 220 V, maka daya aktifnya akan menjadi:
                            <br><br>
                            S(VA) = 5 A × 220 V = 1100 VA
                            <br><br>
                            Menghitung daya aktif dalam suatu rangkaian adalah penting karena membantu kita memahami
                            berapa daya yang dikonsumsi oleh perangkat atau sistem tertentu, serta membantu dalam
                            perencanaan dan pengelolaan distribusi daya listrik secara efisien.
                        </p>
                        <br><br><br>
                        <br>
                        <h5>Rumus 3 Phase</h5>
                        <hr>
                        Penjelasan dari rumus S(VA) = √3 × I(A) × VL-L(V) = 3 × I(A) × VL-N(V) adalah sebagai berikut:
                        <br><br>
                        <p>Rumus tersebut digunakan untuk menghitung daya semu (apparent power) pada sebuah sistem tiga
                            fasa (three-phase system) dalam kelistrikan.
                            <br><br>
                            Dalam sistem tiga fasa, daya semu (S) diukur dalam volt-amperes (VA). Untuk menghitung daya
                            semu, kita memerlukan dua faktor utama:
                            <br><br>
                            Arus fase (I) dalam ampere (A): Ini adalah besar arus listrik yang mengalir dalam setiap
                            fase sistem tiga fasa.
                            <br><br>
                            Tegangan fase-ke-neutral atau tegangan fase-ke-fase (VL-N atau VL-L) dalam volt (V): Ini
                            adalah tegangan antara fase dan netral atau antara dua fase dalam sistem tiga fasa.
                            <br><br>
                            Rumus daya semu untuk sistem tiga fasa memiliki dua varian yang umum digunakan, tergantung
                            pada konfigurasi tegangan sistem:
                            <br><br>
                            Jika tegangan antara dua fase (VL-L) digunakan, maka rumus daya semunya adalah:
                            <br>
                            S(VA) = √3 × I(A) × VL-L(V)
                            <br><br>
                            Di sini, kita mengalikan akar tiga (√3) dengan besar arus listrik (I) dalam ampere dan
                            tegangan fase-ke-fase (VL-L) dalam volt.
                            <br><br>
                            Jika tegangan fase-ke-netral (VL-N) digunakan, maka rumus daya semunya adalah:
                            S(VA) = 3 × I(A) × VL-N(V)
                            <br><br>
                            Di sini, kita mengalikan tiga dengan besar arus listrik (I) dalam ampere dan tegangan
                            fase-ke-netral (VL-N) dalam volt.
                            <br><br>
                            Kedua rumus tersebut memberikan hasil yang sama, yaitu daya semu (S) dalam volt-amperes (VA)
                            pada sistem tiga fasa. Pilihan antara menggunakan tegangan fase-ke-neutral atau fase-ke-fase
                            tergantung pada konfigurasi kelistrikan dari sistem tiga fasa yang sedang dihitung.
                        </p>
                        <p>S(VA) = √3 × I(A) × VL-L(V) = 3 × I(A) × VL-N(V)</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-main>
