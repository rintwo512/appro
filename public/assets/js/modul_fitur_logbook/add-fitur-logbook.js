$(document).ready(function () {
      const FiturLogbook = {
            "Tambah Logbook": {
                  location: "1",
                  icon: "bx bx-plus"
            },
            "Edit Logbook": {
                  location: "2",
                  icon: "bx bx-edit"
            },
            "Detail Logbook": {
                  location: "3",
                  icon: "ti ti-eye"
            },
            "Delete Logbook": {
                  location: "4",
                  icon: "bx bx-trash"
            },


            // Tambahkan pilihan menu lain jika diperlukan
      };

      $("#name_logbook").on("change", function () {
            const nama = $(this).val();
            let templFitur = '';
            let templFiturLogIcon = '';

            if (FiturLogbook[nama]) {
                  templFitur += funcFitur(FiturLogbook[nama].location);
                  $("#locationFiturLogbook").html(templFitur);
            }

            if (FiturLogbook[nama]) {
                  templFiturLogIcon += funcFiturLogIcons(FiturLogbook[nama].icon);
                  $("#iconFiturLogbook").html(templFiturLogIcon);
            }
      });

      function funcFitur(location) {
            return `<input type="hidden" id="location" name="location"
                value="${location}" readonly>
           `;
      }

      function funcFiturLogIcons(icons) {
            return `<input type="hidden" id="icon-logbook" name="icon"
                value="${icons}">
           `;
      }
});
