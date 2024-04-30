

$(document).on('click', '#btnDetailAC', function () {

      const idac = $(this).data('idac');
      const asset = $(this).data('assetac');
      const wingac = $(this).data('wingac');
      const lantaiac = $(this).data('lantaiac');
      const ruanganac = $(this).data('ruanganac');
      const merkac = $(this).data('merkac');
      const typeac = $(this).data('typeac');
      const jenisac = $(this).data('jenisac');
      const dayalistrikac = $(this).data('dayalistrikac');
      const dayapkac = $(this).data('dayapkac');
      const refrigerantac = $(this).data('refrigerantac');
      const productac = $(this).data('productac');
      const currentac = $(this).data('currentac');
      const phaseac = $(this).data('phaseac');
      const dayapendinginac = $(this).data('dayapendinginac');
      const pipaac = $(this).data('pipaac');
      const statusac = $(this).data('statusac');
      const seriIndoor = $(this).data('seriindoorac');
      const beratIndoor = $(this).data('beratindoorac');
      const dimensiIndoor = $(this).data('dimensiindoorac');
      const seriOutdoor = $(this).data('serioutdoorac');
      const beratOutdoor = $(this).data('beratoutdoorac');
      const dimensiOutdoor = $(this).data('dimensioutdoorac');
      const kebisinganIndoor = $(this).data('kebisinganindoorac');
      const kebisinganOutdoor = $(this).data('kebisinganoutdoorac');
      const catatanac = $(this).data('catatanac');
      const kerusakanac = $(this).data('kerusakanac');
      const keteranganac = $(this).data('keteranganac');
      const tanggalpemasanganac = $(this).data('tglpemasanganac');
      const petugaspemsanganac = $(this).data('petugaspemasanganac');
      const tanggalmaint = $(this).data('tanggalmaintenanceac');
      const petugasmaintac = $(this).data('petugasmaintac');
      const updatedtimeac = $(this).data('updatedtimeac');

      // Format tanggal dari string
      var dateString = tanggalpemasanganac;
      var parts = dateString.split('-');
      var date = new Date(parts[0], parts[1] - 1, parts[2]); // Tanggal diatur sebagai (tahun, bulan, tanggal)
      
      // Periksa apakah tanggal adalah tanggal yang valid
      if (!isNaN(date.getTime())) {
          // Lakukan formatting jika tanggal valid
          var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          var formattedDate = date.toLocaleDateString('id-ID', options);
          $('#detailTanggaPemasanganAC').html(formattedDate);
      } else {
          // Tanggal tidak valid, lakukan sesuatu, misalnya tidak menampilkan apa-apa
          console.log("Tanggal tidak valid.");
          $('#detailTanggaPemasanganAC').html(""); // Mengosongkan isi elemen
      }
      
      
      $('#detailTglMaintenanceAC').html(tanggalmaint);
      $('#detailPetugasMaintAC').html(petugasmaintac);
      $('#detailPetugasPemasanganAC').html(petugaspemsanganac);
      $('#detailIDAC').html(idac);
      $('#detailAssetsAC').html(asset);
      $('#detailWingAC').html(wingac);
      $('#detailLantaiAC').html(lantaiac);
      $('#detailRuanganAC').html(ruanganac);
      $('#detailMerkAC').html(merkac);
      $('#detailTypeAC').html(typeac);
      $('#detailJenisAC').html(jenisac);
      $('#detailDayaPKAC').html(dayapkac);
      $('#detailDayaListrikAC').html(dayalistrikac);
      $('#detailRefrigerantAC').html(refrigerantac);
      $('#detailProductAC').html(productac);
      $('#detailCurrentAC').html(currentac);
      $('#detailPhaseAC').html(phaseac);
      $('#detailKapasitasPendinginAC').html(dayapendinginac);
      $('#detailSeriIndoorAC').html(seriIndoor);
      $('#detailKebisinganIndoorAC').html(kebisinganIndoor);
      $('#detailKebisinganOutdoorAC').html(kebisinganOutdoor);
      $('#detailSeriOutdoorAC').html(seriOutdoor);
      $('#detailDimensiOutdoorAC').html(dimensiOutdoor);
      $('#detailDimensiIndoorAC').html(dimensiIndoor);
      $('#detailBeratIndoorAC').html(beratIndoor);
      $('#detailBeratOutdoorAC').html(beratOutdoor);
      $('#detailPipaAC').html(pipaac);
      $('#detailStatusAC').html(`${statusac === "Rusak" ? `<span class="text-danger">${statusac}</span>` : `<span class="text-success">${statusac}</span>`}`);
      $('#detailCatatanAC').html(catatanac);
      $('#detailKerusakanAC').html(kerusakanac);
      $('#detailKeteranganAC').html(keteranganac);
      $('#detailUpdatedAC').html(updatedtimeac);
});

$(document).ready(function () {
      // Ketika salah satu opsi dropdown dipilih
      $('.dropdown-detail').click(function () {
            // Dapatkan teks dari opsi yang dipilih
            const selectedText = $(this).text();

            // Ubah teks dropdown menjadi teks opsi yang dipilih
            $('#dropdownText').text(selectedText);

      });
});