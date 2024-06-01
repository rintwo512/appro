$(document).ready(function () {
    $(".filter-data-logbook").click(function (e) {
        e.preventDefault();
        const urlFilterLogbook = $("#spanIdFilterLogbook").data(
            "url-filter-logbook"
        );
        var attribute = $(this).data("attribute"); // Ambil attribute
        var value = $(this).data("value"); // Ambil value
        // Kirim permintaan AJAX
        $.ajax({
            url: urlFilterLogbook,
            method: "GET",
            data: {
                attribute: attribute,
                value: value,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                const logbook = response.logbook;
                const jumlah = response.jumlah;
                let card = "";
                logbook.map((item) => {
                    $("#modalFilterLogbookKategori").modal("show");
                    $("#titleModalFilterLogbookKategori").text(
                        `${jumlah} Data`
                    );
                    card += updateCardFilterLogbookKategori(item);
                });

                $("#bodyModalFilterLogbookKategori").html(card);
            },
            error: function (xhr, status, error) {
                const responseData = JSON.parse(xhr.responseText);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    html: responseData.message,
                });
            },
        });
    });
});

function updateCardFilterLogbookKategori(e) {
    const tanggalAwal = e.tanggal;

    // Buat objek Date dari tanggal awal
    const date = new Date(tanggalAwal);

    // Ambil tanggal, bulan, dan tahun dari objek Date
    const tahun = date.getFullYear();
    const bulan = String(date.getMonth() + 1).padStart(2, "0"); // Tambahkan '0' di depan jika bulan < 10
    const tanggal = String(date.getDate()).padStart(2, "0"); // Tambahkan '0' di depan jika tanggal < 10

    // Format tanggal sesuai kebutuhan: YYYY-MM-DD
    const tanggalAkhir = tahun + "-" + bulan + "-" + tanggal;
    return `<tr>
                  <td>${e.nama_tugas}</td>
                  <td>${e.lokasi}</td>
                  <td>${e.users.map((user) => user.name)}</td>
                  <td>${tanggalAkhir}</td>
                  <td>${e.status}</td>
                  <td id="image-container"></td>
              </tr>`;
}
