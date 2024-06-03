function roundresult(x) {
    y = parseFloat(x);
    y = roundnum(y, 10);
    return y;
}

function roundnum(x, p) {
    var i;
    var n = parseFloat(x);
    var m = n.toPrecision(p + 1);
    var y = String(m);
    i = y.indexOf("e");
    if (i == -1) i = y.length;
    j = y.indexOf(".");
    if (i > j && j != -1) {
        while (i > 0) {
            if (y.charAt(--i) == "0") y = removeAt(y, i);
            else break;
        }
        if (y.charAt(i) == ".") y = removeAt(y, i);
    }
    return y;
}

function removeAt(s, i) {
    s = s.substring(0, i) + s.substring(i + 1, s.length);
    return s;
}

function OnSetPower() {
    look = [870, 400, 200, 60, 700, 200, 450, 200, 450, 230, 190, 175, 350];
    i = document.calcform.Select4.selectedIndex;
    if (i == 0) return;
    document.calcform.Text1.value = look[i - 1];
    document.calcform.Select2.selectedIndex = 0;
}

function OnEnergyCalc() {
    i2 = document.calcform.Select2.selectedIndex;
    p = document.calcform.Text1.value;
    h = document.calcform.Text2.value;
    if (p == "" || h == "") return;
    if (i2 == 0) p /= 1000;
    kwh_day = p * h;
    kwh_month = kwh_day * 30;
    kwh_year = kwh_day * 365;
    kwh_day = roundnum(kwh_day, 5);
    kwh_month = roundnum(kwh_month, 5);
    kwh_year = roundnum(kwh_year, 5);
    document.calcform.Text8.value = kwh_day;
    document.calcform.Text9.value = kwh_month;
    document.calcform.Text10.value = kwh_year;

    const perH = document.calcform.Text8.value;
    const perB = document.calcform.Text9.value;
    const perT = document.calcform.Text10.value;

    document.getElementById(
        "placeKWH"
    ).innerHTML = `<label class="form-label">kWh</label>
                            <select class="form-control" id="iKWH">
                                <option value="" selected>--Select--</option>
                                <option value="${perH}">${perH} kWh/hari</option>
                                <option value="${perB}">${perB} kWh/bulan</option>
                                <option value="${perT}">${perT} kWh/tahun</option>
                            </select>`;

    const btnKwh = document.querySelector("#iKWH");
    btnKwh.addEventListener("change", function () {
        const kwh = this.value;
        const btnHitung = document.getElementById("hitungBiaya");
        btnHitung.addEventListener("click", function () {
            const iDaya = document.querySelector("#iDaya").value;
            var biaya = Math.floor(kwh * iDaya);
            var total = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(biaya);
            document.querySelector("#iBiaya").value = total;
        });
    });
}
