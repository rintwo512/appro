$(document).on("click", "#btnDetailLogbook", function () {
    const evidens = $(this).data("evidens");
    const baseUrl = $(this).data("baseurl");
    const userupdated = $(this).data("userupdated");
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
    const createdAt = $(this).data("createdat");

    $("#detailCreateddLogbook").html(createdAt);
    $("#detailKategoriLogbook").html(kategori);
    $("#detailJenisPekerjaanLogbook").html(jenispekerjaan);
    $("#detailUpdatedLogbook").html(userupdated);
    $("#detailJudulLogbook").html(namatugas);
    $("#detailWingLogbook").html(wing);
    $("#detailLantaiLogbook").html(lantai);
    $("#detailLokasiLogbook").html(lokasi);
    $("#detailTanggalLogbook").html(tanggal);
    $("#detailStatusLogbook").html(
        `${
            status === "Done"
                ? `<span class="text-success">${status}</span>`
                : status === "Progress"
                ? `<span class="text-warning">${status}</span>`
                : `<span class="text-danger">${status}</span>`
        }`
    );
    $("#detailPetugasLogbook").html(petugas);
    $("#detailTypeLogbook").html(type);
    $("#detailPrioritasLogbook").html(
        `${
            prioritas == "Tinggi"
                ? `<span class="text-danger">${prioritas}</span>`
                : `<span class="text-warning">${prioritas}</span>`
        }`
    );
    $("#detailKeteranganLogbook").html(keterangan);

    // Clear previous evidens
    $("#detailEvidensLogbook").html("");

    // Append new evidens

    evidens.forEach(function (eviden) {
        const imgUrl = `${baseUrl}/${eviden.path}`;
        $("#detailEvidensLogbook").append(`
            <div class="col-4 d-flex flex-wrap">
                <a href="${imgUrl}" data-lightbox="photos" class="py-3 d-block mx-2">
                    <img src="${imgUrl}" class="img-fluid img-thumbnail" width="200">
                </a>
            </div>
        `);
    });
});
