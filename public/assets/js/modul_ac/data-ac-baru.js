$(document).on('click', '#btnRangeAcBaru', function() {
      const url = $(this).data('url');
      const data = $('.input-range-ac-baru').val();
      const start = data.slice(0, 11).split('-').join('/');
      const end = data.slice(13, 23).split('-').join('/');


      $.ajax({
          url: url,
          data: {
            val: data,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        method: 'post',
        dataType: 'json',
          success: result => {

              let card = '';
              const count = result.count;
              const data = result.data;
              data.forEach(e => {
                  $('#modalRangeDataAcBaru').modal('show');
                  $("#rangeTitleAcBaru").text(
                      `${start} - ${end} | Total : ${count} Unit`);
                  card += updateCardAcBaru(e);
              });
              $("#rangeDataAcBaru").html(card);

              // Tambahkan event listener untuk tombol "Export Excel"
              $('.btn-export-excel').click(function() {
                  exportToExcel(data);
              });

          }
          , error: (xhr, textStatus, errorThrown) => {
              if (xhr.status === 404) {
                  // Data tidak ditemukan, tampilkan alert
                  Swal.fire({
                      icon: 'error'
                      , title: 'Oops...'
                      , text: `Data tanggal ${start} - ${end} tidak ditemukan!`
                  })
              }
          }
      });
  });


function updateCardAcBaru(e) {
      return `<tr>
                  <td>${e.id_ac}</td>
                  <td>${e.lantai}</td>
                  <td>${e.wing}</td>
                  <td>${e.ruangan}</td>
                  <td>${e.merk}</td>
                  <td>${e.type}</td>
                  <td>${e.petugas_pemasangan}</td>
                  <td>${e.tgl_pemasangan}</td>
              </tr>`;

  }


  function exportToExcel(data) {
      // Mengambil hanya field yang diinginkan
      var exportedData = data.map(item => ({
          ID: item.id_ac,
          Merk: item.merk,
          Type: item.type,
          Jenis: item.jenis,
          Kapasitas: item.datasheet_ac.daya_pk,
          'Daya Listrik': item.datasheet_ac.daya_listrik,
          Refigerant: item.datasheet_ac.refrigerant,
          Amper: item.datasheet_ac.current,
          Buatan: item.datasheet_ac.product,
          Phase: item.datasheet_ac.phase,
          'Daya Pendingin': item.datasheet_ac.daya_pendingin,
          'Ukuran Pipa(inch)': item.datasheet_ac.pipa,
          'No Seri Indoor': item.datasheet_ac.seri_indoor,
          'No Seri Outdoor': item.datasheet_ac.seri_outdoor,
         'Dimensi Indoor(cm)': item.datasheet_ac.dimensi_indoor,
          'Dimensi Outdoor(cm)': item.datasheet_ac.dimensi_outdoor,
          'Berat Indoor(kg)': item.berat_indoor,
          'Berat Outdoor(kg)': item.datasheet_ac.berat_outdoor,
          'Kebisingan Indoor': item.datasheet_ac.kebisingan_indoor,
          'Kebisingan Outdoor': item.datasheet_ac.kebisingan_outdoor,
          Asset: item.asset,
          Lokasi: item.wing,
          Lantai: item.lantai,
          Ruangan: item.ruangan,
          'Status AC': item.status,
          'Kerusakan AC': item.kerusakan,
          Keterangan: item.keterangan,
          'Tanggal Pemasangan': item.tgl_pemasangan,
          'Petugas Pemasangan': item.petugas_pemasangan,
          // Tambahkan field lain yang ingin diexport
      }));

      // Buat workbook baru
      var wb = XLSX.utils.book_new();

      // Buat worksheet baru dari data yang telah di-filter
      var ws = XLSX.utils.json_to_sheet(exportedData);

      // Tambahkan worksheet ke workbook
      XLSX.utils.book_append_sheet(wb, ws, "Data AC Baru");

      // Simpan file Excel
      var filename = "data_ac_baru.xlsx";
      XLSX.writeFile(wb, filename);
  }
