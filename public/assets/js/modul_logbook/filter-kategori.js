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
    const urlKategori = $("#spanIdFilterKategoriLogbook").data(
        "url-kategori-logbook"
    );
    const evid = e.evidens;
    let imgElements = ""; // Buat string untuk menyimpan elemen gambar

    evid.forEach((el) => {
        const pathImg = `${urlKategori}/${el.filename}`;
        imgElements += `
        <a href="${pathImg}" data-lightbox="photos" class="py-3 d-block mx-2">
            <img src="${pathImg}" class="img-fluid img-thumbnail" width="200">
        </a>`;
    });
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
                  <td class="wrap-text">${e.nama_tugas}</td>
                  <td class="wrap-text">${e.lokasi}</td>
                  <td class="wrap-text">${e.users.map((user) => user.name)}</td>
                  <td class="wrap-text">${tanggalAkhir}</td>
                  <td class="wrap-text">${e.status}</td>
                  <td><div>
              ${imgElements}
            </div></td>
                  
                  
              </tr>`;
}
