$(document).on('click', '#btnDeleteSubmenu', function (e) {
      const href = $(this).attr('href');
      e.preventDefault();
      Swal.fire({
            title: "Apa kamu yakin?",
            text: "Ingin menghapus submenu ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!",
      }).then((result) => {
            if (result.isConfirmed) {
                  window.location.href = href;
            }
      });

});