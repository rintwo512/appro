$(document).ready(function () {
      $('#searchForm').on('submit', function (e) {
            e.preventDefault();

            var tahun = $('#updateTahun').val();

            $.ajax({
                  type: 'GET',
                  url: 'chart-ac/cari',
                  data: { updateTahun: tahun }, 
                  success: function (data) {
                        // Hapus semua baris yang ada di tabel
                        $('#myTable tbody').empty();

                        // Tambahkan baris-baris baru berdasarkan data yang diterima
                        $.each(data, function (index, chart) {
                              $('#myTable tbody').append(
                                    '<tr id="idchart' + chart.id + '">' +
                                    '<td>' + chart.tahun + '</td>' +
                                    '<td>' + chart.bulan + '</td>' +
                                    '<td>' + chart.total + '</td>' +
                                    '<td>' +
                                    '<button type="button" id="btnEditChart" class="border-0 bg-transparent" data-bs-toggle="modal"' +
                                    'data-bs-target="#modalUpdateChart"' +
                                    'data-idchart="' + chart.id + '"' +
                                    'data-tahunchart="' + chart.tahun + '"' +
                                    'data-bulanchart="' + chart.bulan + '"' +
                                    'data-totalchart="' + chart.total + '">' +
                                    '<i class="bx bx-edit fs-6 text-info"></i>' +
                                    '</button>' +
                                    '<a href="javascript:void(0)" id="btnDeleteChart" onclick="delDataChart(' + chart.id + ', ' + chart.tahun + ')">' +
                                    '<i class="bx bx-trash fs-6 text-danger"></i>' +
                                    '</a>' +
                                    '</td>' +
                                    '</tr>'
                              );
                        });
                  },
                  error: function (data) {
                        console.log('Error:', data);
                  }
            });
      });
});