$(document).ready(function () {
    $("#btnUpdateChart1").hide();
    $("#totalUpdateChart").on("keyup", function () {
        $("#btnUpdateChart1").fadeIn();
    });
});

$(document).on("click", "#btnEditChart", function (e) {
    e.preventDefault();
    const ruteChartEdit = $(this).data("routechartedit");
    const idChart = $(this).data("idchart");
    const tahunChart = $(this).data("tahunchart");
    const bulanChart = $(this).data("bulanchart");
    const totalChart = $(this).data("totalchart");

    var actionUrl = ruteChartEdit;
    // var actionUrl = "chart-ac/" + idChart;
    $("#formUpdateChart").attr("action", actionUrl);

    $("#titleModalEditChart").text("Update Chart");

    $("#modal-body #idChartUpdate").val(idChart);
    $("#modal-body #tahunUpdateChart").val(tahunChart);
    $("#modal-body #monthUpdateChart").val(bulanChart);
    $("#modal-body #totalUpdateChart").val(totalChart);
});

$("#btnTambahChartAc").on("click", () => {
    $("#titleModalTambahChart").text("Tambah Data");
});

$(document).on("click", "#btnDeleteChartTb", function (e) {
    const href = $(this).attr("href");
    e.preventDefault();
    Swal.fire({
        title: "Apa kamu yakin?",
        text: "Ingin menghapus data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = href;
        }
    });
});

// Menangkap event klik pada tombol "Delete All"
document
    .getElementById("btnDeleteAllChart")
    .addEventListener("click", function () {
        var tahun = document.getElementById("deleteAllChart").value;

        if (!tahun) {
            Swal.fire({
                title: "Oops...",
                text: "Anda harus memilih tahun terlebih dahulu!",
                icon: "error",
            });
            return;
        }

        Swal.fire({
            title: `Anda yakin ingin mengapus data tahun ${tahun} ?`,
            text: "Data ini tidak dapat dipulihkan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yakin!",
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengirimkan form saat pengguna mengkonfirmasi
                document.getElementById("deleteAllChartForm").submit();
            }
        });
    });
