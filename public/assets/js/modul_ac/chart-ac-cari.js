$(document).ready(function () {
    $("#searchForm").on("submit", function (e) {
        e.preventDefault();

        var tahun = $("#updateTahun").val();
        const hapusSemua = $("#updateTahun").data("hapussemua");
        const hapusChart = $("#updateTahun").data("urlhapuschartajax");
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
                    card += updateChartAc(item, hapusChart);
                    $("#headerBtnDelete").empty();
                    //   $("#headerBtnDelete").append(
                    //       `<a href='${hapusSemua}' class='btn btn-danger mb-3'>Hapus data ${item.tahun}</a>`
                    //   );
                    $("#headerBtnDelete").append(
                        `<form action="${hapusSemua}" method="get">
                                <input hidden value="${item.tahun}" name="deleteAllChart">
                                    <button type="submit"
                                        class="btn btn-danger mb-3">Hapus data ${item.tahun}</button>
                            </form>`
                    );
                });
                $("#modalBodyChartCari").html(card);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });
});

function updateChartAc(e, hapus) {
    const urlChart = hapus + "/" + e.id + "/" + e.tahun;

    return `<tr>
                  
                  <td>${e.tahun}</td>
                  <td>${e.bulan}</td>
                  <td>${e.total}</td>
                  <td>

                        <a href="${urlChart}"
                                            id="btnDeleteChartTb">
                                            <i class='bx bx-trash fs-6 text-danger'></i>
                                        </a>
                  </td>
              </tr>`;
}
