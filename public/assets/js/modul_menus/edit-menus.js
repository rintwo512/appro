
$(document).ready(function () {
      // Event saat checkbox berubah
      $('.checkbox-menus').change(function () {
            var isActive = $(this).prop('checked') ? 1 : 0; // 1 jika checked, 0 jika tidak
            var menuId = $(this).data('id');

            // Kirim data ke server menggunakan Ajax
            $.ajax({
                  url: 'manajemen-menus-update', // Sesuaikan dengan route yang kamu gunakan
                  method: 'POST',
                  data: {
                        id: menuId,
                        is_active: isActive,
                        _token: $('meta[name="csrf-token"]').attr('content') // Diperlukan untuk laravel
                  },
                  success: function (response) {
                        Swal.fire('Success!', response.message, 'success');
                        setTimeout(location.reload.bind(location), 1000);
                  },
                  error: function (xhr, status, error) {
                        console.error(xhr.responseText); // Tampilkan pesan error jika ada
                  }
            });
      });
});