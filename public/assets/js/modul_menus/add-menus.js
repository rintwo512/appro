$(document).ready(function () {
    const menuOptions = {
        Dashboard: {
            url: "dashboard.index",
            location: "1",
            icon: "bx bx-home-alt",
        },
        Databases: {
            url: "javascript:void(0)",
            location: "2",
            icon: "bx bx-data",
        },
        Settings: {
            url: "javascript:void(0)",
            location: "3",
            icon: "bx bx-cog",
        },
        Tools: {
            url: "javascript:void(0)",
            location: "4",
            icon: "bx bx-wrench",
        },

        // Tambahkan pilihan menu lain jika diperlukan
    };

    $("#menu_label").on("change", function () {
        const nama = $(this).val();
        let templ = "";
        let templocation = "";
        let tempMenuIcon = "";
        if (menuOptions[nama]) {
            templ += funcMenu(menuOptions[nama].url);
            $("#menuUrl").html(templ);
        }

        if (menuOptions[nama]) {
            templocation += funcMenuLoca(menuOptions[nama].location);
            $("#menuLocation").html(templocation);
        }

        if (menuOptions[nama]) {
            tempMenuIcon += funcMenuIcon(menuOptions[nama].icon);
            $("#menuInputIcon").html(tempMenuIcon);
        }
    });

    function funcMenu(url) {
        return `
            <input hidden class="form-control" id="menu_url" name="menu_url"
                value="${url}" readonly>
           `;
    }

    function funcMenuLoca(location) {
        return `
            <input hidden class="form-control" id="menu_location" name="menu_location"
                value="${location}" readonly>
           `;
    }

    function funcMenuIcon(icon) {
        return `
            <input hidden class="form-control @error('menu_icon') is-invalid @enderror" id="menu_icon" name="menu_icon"
                value="${icon}" readonly>
           `;
    }
});

// Tangkap elemen-elemen yang diperlukan
// const menuIcon = document.getElementById('menu_icon');
// const selectedIcon = document.getElementById('selected-icon');

// Tambahkan event listener untuk mengubah ikon saat opsi dipilih
// menuIcon.addEventListener('change', function () {
//       const selectedValue = menuIcon.value;
//       const iconHtml = `<i class="${selectedValue}"></i>`;
//       selectedIcon.innerHTML = iconHtml;
// });
