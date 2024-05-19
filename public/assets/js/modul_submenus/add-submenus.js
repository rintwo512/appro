$(document).ready(function () {
      const submenuOptions = {
            "Data AC": {
                  url: "/data-ac",
                  location: "1",
                  menu_id: "Databases"
            },
            "Data Logbook": {
                  url: "/data-logbook",
                  location: "2",
                  menu_id: "Databases"
            },
            "Data Apar": {
                  url: "/data-apar",
                  location: "3",
                  menu_id: "Databases"
            },
            "Edit Profile": {
                  url: "/settings/edit-profile",
                  location: "1",
                  menu_id: "Settings"
            },
            "Ubah Password": {
                  url: "/settings/ubah-password",
                  location: "2",
                  menu_id: "Settings"
            },


            // Tambahkan pilihan menu lain jika diperlukan
      };

      $("#submenu_label").on("change", function () {
            const namaSubmenu = $(this).val();
            let templ = '';
            let tempSubLocation = '';
            let tempSubMenuId = '';

            if (submenuOptions[namaSubmenu]) {
                  templ += funcSubmenu(submenuOptions[namaSubmenu].url);
                  $("#submenuUrl").html(templ);
            }

            if (submenuOptions[namaSubmenu]) {
                  tempSubLocation += funcSubenuLoca(submenuOptions[namaSubmenu].location);
                  $("#submenuLocation").html(tempSubLocation);
            }

            if (submenuOptions[namaSubmenu]) {
                  tempSubMenuId += funcSubMenuId(submenuOptions[namaSubmenu].menu_id);
                  $("#menuSubId").html(tempSubMenuId);
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

      function funcSubMenuId(menuid) {
            return `
            <input hidden class="form-control" id="menu_id" name="menu_id"
                value="${menuid}" readonly>
           `;
      }
});