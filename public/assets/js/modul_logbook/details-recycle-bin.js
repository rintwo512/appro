$(document).on("click", "#recycleBinLogbook", function () {
    const evidenstrash = $(this).data("evidenstrash");
    const urlEvidensTrash = $(this).data("baseurlbin");
    const userdeleted = $(this).data("userdeleted");
    const namatugas = $(this).data("namatugas");
    const wing = $(this).data("wing");
    const lantai = $(this).data("lantai");
    const lokasi = $(this).data("lokasi");
    const status = $(this).data("status");
    const tanggal = $(this).data("tanggal");
    const prioritas = $(this).data("prioritas");
    const type = $(this).data("type");
    const keterangan = $(this).data("keterangan");
    const petugas = $(this).data("petugas");
    const kategori = $(this).data("kategori");
    const jenispekerjaan = $(this).data("jenispekerjaan");

    $("#detailKategoriLogbookTrash").html(kategori);
    $("#detailJenisPekerjaanLogbookTrash").html(jenispekerjaan);

    $("#detailDeleteLogbookTrash").html(userdeleted);
    $("#detailJudulLogbookTrash").html(namatugas);
    $("#detailWingLogbookTrash").html(wing);
    $("#detailLantaiLogbookTrash").html(lantai);
    $("#detailLokasiLogbookTrash").html(lokasi);
    $("#detailTanggalLogbookTrash").html(tanggal);
    $("#detailStatusLogbookTrash").html(
        `${
            status === "Done"
                ? `<span class="text-success">${status}</span>`
                : status === "Progress"
                ? `<span class="text-warning">${status}</span>`
                : `<span class="text-danger">${status}</span>`
        }`
    );
    $("#detailPetugasLogbookTrash").html(petugas);
    $("#detailTypeLogbookTrash").html(type);
    $("#detailPrioritasLogbookTrash").html(
        `${
            prioritas == "Tinggi"
                ? `<span class="text-danger">${prioritas}</span>`
                : `<span class="text-warning">${prioritas}</span>`
        }`
    );
    $("#detailKeteranganLogbookTrash").html(keterangan);

    // Clear previous evidens
    $("#detailEvidensLogbookTrash").html("");

    // Append new evidens

    evidenstrash.forEach(function (eviden) {
        const imgUrlTrash = `${urlEvidensTrash}/${eviden.path}`;
        $(
            "#detailEvidensLogbookTrash"
        ).append(`<div class="col-4 d-flex flex-wrap">
            <a href="${imgUrlTrash}" data-lightbox="photos" class="py-3 d-block mx-2">
                <img src="${imgUrlTrash}" class="img-fluid img-thumbnail" width="200" alt="${imgUrlTrash}">
            </a>
        </div>`);
    });
});

$(document).on("click", "#btnRestoreLogbook", function (e) {
    const hrefRes = $(this).attr("href");
    e.preventDefault();
    Swal.fire({
        title: "Apa kamu yakin?",
        text: "Data ini akan dipulihkan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Restore!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = hrefRes;
        }
    });
});

$(document).on("click", "#btnDeletePermanentLogbook", function (e) {
    const hrefPer = $(this).attr("href");
    e.preventDefault();
    Swal.fire({
        title: "Apa kamu yakin?",
        text: "Data ini akan dihapus permanent",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = hrefPer;
        }
    });
});
