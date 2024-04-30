
let chart = null;

function chartAc(year, title) {
    const url = "/chart-ac";
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

function drawChart(valTahun, title, year, valBulan){
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

$(document).ready(function() {
    $('#tahun').change(function() {
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
