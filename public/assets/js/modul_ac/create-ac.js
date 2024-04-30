$(document).ready(function () {
    $('#status').change(function () {
        const st = $(this).val();

        if (st == 'Rusak' || st == 'Progres') {
            $('#kerusakan').prop('required', true).show(1000);
            $('#labelKerusakan').show(1000);
            $('#colKeterangan').removeClass('col-md-12').addClass('col-md-6');
        } else if (st == 'Normal') {
            $('#kerusakan').prop('required', false).hide(1000).val("");
            $('#labelKerusakan').hide(1000);
            $('#colKeterangan').addClass('col-md-12').removeClass('col-md-6');
        }

        if (st == 'Progres') {
            $('#catatan').prop('required', true);
        } else {
            $('#catatan').prop('required', false);
        }
    });
});


$('#wing').on('change', function () {
    const wing = $(this).val();

    let cardLantai = '';
    if (wing == 'WA' || wing == 'WB') {
        cardLantai += wingAB();
        $('.optLantai').html(cardLantai);
    } else if (wing == 'WC' || wing == 'WD') {
        cardLantai += wingCD();
        $('.optLantai').html(cardLantai);
    } else {
        cardLantai += wingLainnya();
        $('.optLantai').html(cardLantai);
    }
});


function wingAB() {
    return `<label for="lantai" class="form-label">Lantai <span               class="text-danger">*</span></label>
          <select class="form-control" id="lantai" required name="lantai">
              <option value="1">Lt1</option>
              <option value="2">Lt2</option>
              <option value="3">Lt3</option>
          </select>`;
}
function wingCD() {
    return `<label for="lantai" class="form-label">Lantai <span               class="text-danger">*</span></label>
            <select class="form-control" id="lantai" required name="lantai">
                <option value="1">Lt1</option>
                <option value="2">Lt2</option>
            </select>`;
}
function wingLainnya() {
    return `<label for="lantai" class="form-label">Lantai <span               class="text-danger">*</span></label>
            <select class="form-control" id="lantai" required name="lantai">
                <option value="1">Lt1</option>
            </select>`;
}


$('#jenis').on('change', function () {
    const jenis = $(this).val();
    let cardRefri = '';
    if (jenis == 'Inverter') {
        cardRefri += funcInverter();
        $('.optRefrigerant').html(cardRefri);
    } else {
        cardRefri += funcNonInverter();
        $('.optRefrigerant').html(cardRefri);
    }
});

function funcInverter() {
    return `<label for="refrigerant" class="form-label">Refrigerant <span class="text-danger">*</span></label>
      <select class="form-control" id="refrigerant" required name="refrigerant">
          <option value="R32">R32</option>
          <option value="R410">R410</option>
      </select>`;
}

function funcNonInverter() {
    return `<label for="refrigerant" class="form-label">Refrigerant <span class="text-danger">*</span></label>
      <select class="form-control" id="refrigerant" required name="refrigerant">
          <option value="R22">R22</option>
          <option value="R32">R32</option>
          <option value="R410">R410</option>
      </select>`;
}

function formatCurrency(input) {
    // Mengambil nilai input
    let value = input.value;

    // Menghapus karakter non-digit dari input
    value = value.replace(/\D/g, '');

    // Mengubah nilai menjadi bilangan dan memformat menjadi tanda pemisah ribuan dan desimal
    const formatter = new Intl.NumberFormat('id-ID');
    const formattedValue = formatter.format(value);

    // Memperbarui nilai input dengan format harga
    input.value = formattedValue;
}


document.getElementById('current').addEventListener('input', function (e) {
    var inputValue = e.target.value;
    var sanitizedValue = sanitizeInput(inputValue);
    e.target.value = sanitizedValue;
});

function sanitizeInput(input) {
    // Hapus semua karakter kecuali angka dan koma
    return input.replace(/[^0-9,]/g, '');
}

document.getElementById('id_ac').addEventListener('input', function (e) {
    var inputValue1 = e.target.value;
    var sanitizedValue1 = sanitizeInput1(inputValue1);
    e.target.value = sanitizedValue1;
});

function sanitizeInput1(input1) {
    // Hapus semua karakter kecuali angka dan koma
    return input1.replace(/[^0-9,]/g, '');
}
