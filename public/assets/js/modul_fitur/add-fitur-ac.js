$(document).ready(function () {
      const FiturOptions = {
            "Tambah AC": {
                  location: "1",
                  icon: "bx bx-plus"
            },
            "Edit AC": {
                  location: "2",
                  icon: "bx bx-edit"
            },
            "Detail AC": {
                  location: "3",
                  icon: "ti ti-eye"
            },
            "Delete AC": {
                  location: "4",
                  icon: "bx bx-trash"
            },


            // Tambahkan pilihan menu lain jika diperlukan
      };

      $("#name").on("change", function () {
            const nama = $(this).val();
            let templFitur = '';
            let templFiturIcon = '';

            if (FiturOptions[nama]) {
                  templFitur += funcFitur(FiturOptions[nama].location);
                  $("#locationFitur").html(templFitur);
            }

            if (FiturOptions[nama]) {
                  templFiturIcon += funcFiturIcon(FiturOptions[nama].icon);
                  $("#fiturAcIcon").html(templFiturIcon);
            }
      });

      function funcFitur(location) {
            return `<input type="hidden" class="form-control" id="location" name="location"
                value="${location}">
           `;
      }

      function funcFiturIcon(icon) {
            return `<input type="hidden" class="form-control" id="icon" name="icon"
                value="${icon}">
           `;
      }
});

// Tangkap elemen-elemen yang diperlukan
const icon = document.getElementById('icon');
const selectedIconFitur = document.getElementById('selected-icon-fitur');

// Tambahkan event listener untuk mengubah ikon saat opsi dipilih
icon.addEventListener('change', function () {
      const selectedValueFitur = icon.value;
      const iconHtmlFitur = `<i class="${selectedValueFitur}"></i>`;
      selectedIconFitur.innerHTML = iconHtmlFitur;
});