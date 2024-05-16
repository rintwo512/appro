$(document).ready(function () {
      const submenuOptions = {
            "Data AC": {
                  url: "/data-ac"
            },
            "Data Logbook": {
                  url: "/data-logbook"
            },
            "Data Apar": {
                  url: "/data-apar"
            },


            // Tambahkan pilihan menu lain jika diperlukan
      };

      $("#submenu_label").on("change", function () {
            const namaSubmenu = $(this).val();
            let templ = '';

            if (submenuOptions[namaSubmenu]) {
                  templ += funcSubmenu(submenuOptions[namaSubmenu].url);
                  $("#submenuUrl").html(templ);
            }
      });

      function funcSubmenu(subUrl) {
            return `<label for="submenu_url">Slug <span class="text-danger">*</span></label>
            <input class="form-control" id="submenu_url" name="submenu_url"
                value="${subUrl}" readonly>
           `;
      }
});