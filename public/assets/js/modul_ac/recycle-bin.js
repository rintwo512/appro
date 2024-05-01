

$(document).on('click', '#recycleBin', function () {

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
      const deleted = $(this).data('deleted');
      console.log(deleted);


      $('#detailDeleteAC').html(deleted == '/1 detik yang lalu' ? '' : deleted);

      $('#detailTglMaintenanceAC').html(tanggalmaint == '1 detik yang lalu' ? '' : tanggalmaint);

      $('#modalDetailsRecycle').text('Detail Data');

      $('#detailTanggaPemasanganAC').html(tanggalpemasanganac);
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
      $('#detailUpdatedAC').html(deleted);
});

$(document).on('click', '#btnRestoreAc', function (e) {
      const hrefRes = $(this).attr('href');
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

$(document).on('click', '#btnDeletePermanent', function (e) {
      const hrefPer = $(this).attr('href');
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

