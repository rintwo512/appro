$(document).ready(function () {
      const submenuOptions = {
            "Data AC": {
                  url: "/data-ac",
                  location: "1"
            },
            "Data Logbook": {
                  url: "/data-logbook",
                  location: "2"
            },
            "Data Apar": {
                  url: "/data-apar",
                  location: "3"
            },


            // Tambahkan pilihan menu lain jika diperlukan
      };

      $("#submenu_label").on("change", function () {
            const namaSubmenu = $(this).val();
            let templ = '';
            let tempSubLocation = '';

            if (submenuOptions[namaSubmenu]) {
                  templ += funcSubmenu(submenuOptions[namaSubmenu].url);
                  $("#submenuUrl").html(templ);
            }

            if (submenuOptions[namaSubmenu]) {
                  tempSubLocation += funcSubenuLoca(submenuOptions[namaSubmenu].location);
                  $("#submenuLocation").html(tempSubLocation);
            }
      });

      function funcSubmenu(subUrl) {
            return `
            <input hidden class="form-control" id="submenu_url" name="submenu_url"
                value="${subUrl}" readonly>
           `;
      }

      function funcSubenuLoca(location) {
            return `
            <input hidden class="form-control" id="submenu_location" name="submenu_location"
                value="${location}" readonly>
           `;
      }
});