$(document).ready(function () {
    const submenuOptions = {
        "Data AC": {
            url: "index.ac",
            location: "1",
            menu_id: "Databases",
        },
        "Data Logbook": {
            url: "data-logbook.index",
            location: "2",
            menu_id: "Databases",
        },
        "Data Perangkat": {
            url: "perangkat.index",
            location: "3",
            menu_id: "Databases",
        },
        "Data Ruangan": {
            url: "ruangan.index",
            location: "4",
            menu_id: "Databases",
        },
        "Edit Profile": {
            url: "edit.profile",
            location: "1",
            menu_id: "Settings",
        },
        "Ubah Password": {
            url: "ubah.pass",
            location: "2",
            menu_id: "Settings",
        },
        "Amper To VA": {
            url: "amper.va",
            location: "1",
            menu_id: "Tools",
        },
        "Amper To Watt": {
            url: "amper.watt",
            location: "2",
            menu_id: "Tools",
        },
        "AC Kalkulator": {
            url: "ac.kalkulator",
            location: "3",
            menu_id: "Tools",
        },
        "Btu To Watt": {
            url: "btu.watt",
            location: "4",
            menu_id: "Tools",
        },
        "kVa to Ampere": {
            url: "kva.ampere",
            location: "5",
            menu_id: "Tools",
        },
        "Energy Kalkulator": {
            url: "energy.kalkulator",
            location: "6",
            menu_id: "Tools",
        },

        // Tambahkan pilihan menu lain jika diperlukan
    };

    $("#submenu_label").on("change", function () {
        const namaSubmenu = $(this).val();
        let templ = "";
        let tempSubLocation = "";
        let tempSubMenuId = "";

        if (submenuOptions[namaSubmenu]) {
            templ += funcSubmenu(submenuOptions[namaSubmenu].url);
            $("#submenuUrl").html(templ);
        }

        if (submenuOptions[namaSubmenu]) {
            tempSubLocation += funcSubenuLoca(
                submenuOptions[namaSubmenu].location
            );
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
