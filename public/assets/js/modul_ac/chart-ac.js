
let chart = null;

function chartAc(year, title) {
    const url = "/grafik-ac";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        data: {
            tahun: year,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        success: result => {
            const tahun = result.data;
            if (chart) {
                chart.destroy();
            }
            const valTahun = tahun.map(item => parseInt(item.total));
            const valBulan = tahun.map(item => item.bulan);
            const kalkus = valTahun.reduce((acc, curr) => acc + curr);
            $("#chartTitle").html(`${title} | Total : ${kalkus}`);
            chart = drawChart(valTahun, title, year, valBulan);
        }
    });
}

function drawChart(valTahun, title, year, valBulan) {
    document.querySelector("#yearly-salary").innerHTML = ""; // Menghapus elemen HTML chart sebelumnya

    var options = {
        series: [
            {
                name: "",
                data: valTahun,
            },
        ],

        chart: {
            toolbar: {
                show: false,
            },
            height: 310,
            type: "bar",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
        },
        colors: ["#845EC2", "#D65DB1", "#FF6F91", "#FF9671", "#FFC75F", "#F9F871", "#3DDAB4", "#EB0000", "#3DD9EB", "#EB7900", "#F5BC00", "var(--bs-primary)"],
        plotOptions: {
            bar: {
                borderRadius: 3,
                columnWidth: "45%",
                distributed: true,
                endingShape: "rounded",
            },
        },

        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            yaxis: {
                lines: {
                    show: false,
                },
            },
        },
        xaxis: {
            categories: valBulan,
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: false,
            },
        },
        tooltip: {
            theme: "dark",
        },
    };


    var newChart = new ApexCharts(document.querySelector("#yearly-salary"), options);
    newChart.render();

    return newChart;
}

$(document).ready(function () {
    $('#tahun').change(function () {
        var year = $(this).val();

        if (year != '') {
            chartAc(year, `Maintenance AC : Tahun ${year}`);
        }
    });

    const d = new Date();
    let tahun = d.getFullYear();
    $("#chartTitle").html(`Maintenance AC : Tahun ${tahun}`);
    chartAc(tahun, `Maintenance AC : Tahun ${tahun}`);

});

$(document).ready(function () {
    $('#totalUpdateChart').on('keyup', function () {
        $("#btnUpdateChart1").removeAttr("disabled");
    });
});

$(document).on("click", "#btnEditChart", function (e) {
    e.preventDefault();
    const idChart = $(this).data('idchart');
    const tahunChart = $(this).data('tahunchart');
    const bulanChart = $(this).data('bulanchart');
    const totalChart = $(this).data('totalchart');

    var actionUrl = "chart-ac/" + idChart;
    $("#formUpdateChart").attr('action', actionUrl);

    $("#titleModalEditChart").text("Update Chart");

    $("#modal-body #idChartUpdate").val(idChart);
    $("#modal-body #tahunUpdateChart").val(tahunChart);
    $("#modal-body #monthUpdateChart").val(bulanChart);
    $("#modal-body #totalUpdateChart").val(totalChart);
});

$("#btnTambahChartAc").on("click", () => {
    $("#titleModalTambahChart").text("Tambah Data");
});


function delDataChart(id, tahun) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/chart-ac" + "/" + id + "/" + tahun,
                type: "DELETE",
                data: {
                    _token: $("input[name=_token]").val()
                },
                success: function (response) {
                    $("#idchart" + id).remove();
                    $("#totalData").html(`Akumulasi : ${response.total} Unit`);
                }
            });
        }
    })
}


// Menangkap event klik pada tombol "Delete All"
document.getElementById('btnDeleteAllChart').addEventListener('click', function () {
    var tahun = document.getElementById('deleteAllChart').value;

    if (!tahun) {
        Swal.fire({
            title: 'Oops...',
            text: 'Anda harus memilih tahun terlebih dahulu!',
            icon: 'error'
        });
        return;
    }

    Swal.fire({
        title: `Anda yakin ingin mengapus data tahun ${tahun} ?`,
        text: 'Data ini tidak dapat dipulihkan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Mengirimkan form saat pengguna mengkonfirmasi
            document.getElementById('deleteAllChartForm').submit();
        }
    })
});

