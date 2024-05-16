$(document).ready(function () {
      const menuOptions = {
            Dashboard: {
                  url: "/dashboard"
            },
            Databases: {
                  url: "javascript:void(0)"
            },
            Settings: {
                  url: "/settings"
            },


            // Tambahkan pilihan menu lain jika diperlukan
      };

      $("#menu_label").on("change", function () {
            const nama = $(this).val();
            let templ = '';

            if (menuOptions[nama]) {
                  templ += funcMenu(menuOptions[nama].url);
                  $("#menuUrl").html(templ);
            }
      });

      function funcMenu(url) {
            return `<label for="menu_url">Link <span class="text-danger">*</span></label>
            <input class="form-control" id="menu_url" name="menu_url"
                value="${url}" readonly>
           `;
      }
});

// Tangkap elemen-elemen yang diperlukan
const menuIcon = document.getElementById('menu_icon');
const selectedIcon = document.getElementById('selected-icon');

// Tambahkan event listener untuk mengubah ikon saat opsi dipilih
menuIcon.addEventListener('change', function () {
      const selectedValue = menuIcon.value;
      const iconHtml = `<i class="${selectedValue}"></i>`;
      selectedIcon.innerHTML = iconHtml;
});