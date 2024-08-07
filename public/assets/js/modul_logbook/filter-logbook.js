$(document).on("click", "#btnfilterLogbook", function () {
    const urlog = $(this).data("urlog");
    const data = $(".input-filter-logbook").val();
    const start = data.slice(0, 11).split("-").join("/");
    const end = data.slice(13, 23).split("-").join("/");

    $.ajax({
        url: urlog,
        data: {
            val: data,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        method: "post",
        dataType: "json",
        success: (result) => {
            let card = "";
            const count = result.count;
            const data = result.data;

            data.forEach((e) => {
                $("#modalFilterLogbook").modal("show");
                $("#titleModalFilterLogbook").text(
                    `${start} - ${end} = ${count} Data`
                );

                card += updateBodyModal(e);
            });
            $("#bodyModalFilterLogbook").html(card);
        },
        error: (xhr, textStatus, errorThrown) => {
            if (xhr.status === 404) {
                // Data tidak ditemukan, tampilkan alert
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `Data tanggal ${start} - ${end} tidak ditemukan!`,
                });
            }
        },
    });
});

function updateBodyModal(e) {
    const tanggalAwal = e.tanggal;

    // Buat objek Date dari tanggal awal
    const date = new Date(tanggalAwal);

    // Ambil tanggal, bulan, dan tahun dari objek Date
    const tahun = date.getFullYear();
    const bulan = String(date.getMonth() + 1).padStart(2, "0"); // Tambahkan '0' di depan jika bulan < 10
    const tanggal = String(date.getDate()).padStart(2, "0"); // Tambahkan '0' di depan jika tanggal < 10

    // Format tanggal sesuai kebutuhan: YYYY-MM-DD
    const tanggalAkhir = tahun + "-" + bulan + "-" + tanggal;

    const petugas = e.users;
    const evidens = e.evidens;

    return `<tr>
                    <td class="wrap-text">${e.nama_tugas}</td>
                    <td class="wrap-text">${e.lokasi}</td>
                    <td class="wrap-text">${petugas.map(
                        (user) => user.name
                    )}</td>
                    <td class="wrap-text">${tanggalAkhir}</td>
                    <td class="wrap-text">${e.status}</td>
                    <td id="image-container" class="wrap-text"></td> 
                    
                </tr>`;
}


