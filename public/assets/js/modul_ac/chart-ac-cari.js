$(document).ready(function () {
    $("#searchForm").on("submit", function (e) {
        e.preventDefault();

        var tahun = $("#updateTahun").val();
        const hapusSemua = $("#updateTahun").data("hapussemua");
        const urlCariTahun = $("#updateTahun").data("urlcaricart");

        $.ajax({
            type: "GET",
            url: urlCariTahun,
            data: { updateTahun: tahun },
            success: function (data) {
                $("#modalFilterAc").modal("show");

                let card = "";
                data.map((item) => {
                    $("#modalChartCari").modal("show");
                    card += updateChartAc(item);

                    $("#headerBtnDelete").empty();
                    const superAdmin =
                        $("#superAdminStatus").data("super-admin");
                    if (superAdmin) {
                        $("#headerBtnDelete").append(
                            `<form id="formDelete" action="${hapusSemua}" method="get">
                            <input hidden value="${item.tahun}" name="deleteAllChart">
                            <button type="submit" class="btn btn-danger mb-3" id="btnChartAllDelete">Hapus data ${item.tahun}</button>
                        </form>`
                        );
                    } else {
                        $("#titleCariChartTahun").text(
                            `Data tahun ${item.tahun}`
                        );
                    }
                });
                $("#modalBodyChartCari").html(card);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });
});

function updateChartAc(val) {
    return `<tr>                  
                  <td>${val.bulan}</td>
                  <td>${val.total}</td>                  
              </tr>`;
}

$(document).on("submit", "#formDelete", function (e) {
    e.preventDefault();
    const tahunToDelete = $("input[name='deleteAllChart']").val();
    const href = $(this).attr("action");
    Swal.fire({
        title: "Apa kamu yakin?",
        text: `Ingin menghapus data tahun ${tahunToDelete}?`,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = href + "?" + $(this).serialize();
        }
    });
});
