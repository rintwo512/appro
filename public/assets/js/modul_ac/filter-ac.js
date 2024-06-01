$(document).ready(function () {
    $(".filter-data-ac").click(function (e) {
        e.preventDefault();
        const url = $("#spanIdFilter").data("url-filter-ac");
        console.log("url:", url);
        const wing = $(this).data("wing"); // Ambil wing
        const lantai = $(this).data("lantai"); // Ambil lantai
        const type = $(this).data("type"); // Ambil type
        const jenis = $(this).data("jenis"); // Ambil jenis

        // Kirim permintaan AJAX
        $.ajax({
            url: url,
            method: "GET",
            data: {
                wing: wing,
                lantai: lantai,
                type: type,
                jenis: jenis,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                const result = response.ac;
                const jumlah = response.jumlah;
                let card = "";
                result.map((item) => {
                    $("#modalFilterAc").modal("show");
                    $("#titleModalFilter").text(`${jumlah} Unit`);
                    card += updateCardFilterAc(item);
                });

                $("#modalBodyFilterAc").html(card);
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

function updateCardFilterAc(e) {
    return `<tr>
                  <td>${e.id_ac ? e.id_ac : ""}</td>
                  <td>${e.lantai}</td>
                  <td>${e.wing}</td>
                  <td>${e.ruangan}</td>
                  <td>${e.type}</td>
                  <td>${e.merk ? e.merk : ""}</td>
                  <td>${e.petugas_pemasangan ? e.petugas_pemasangan : ""}</td>
                  <td>${e.tgl_pemasangan ? e.tgl_pemasangan : ""}</td>
              </tr>`;
}
