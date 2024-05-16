$(document).ready(function () {
      $(document).on("click", "#btnEditUser", function () {
            const id = $(this).data('idedit');
            const name = $(this).data('nameedit');
            const email = $(this).data('emailedit');
            const nik = $(this).data('nikedit');
            const jabatan = $(this).data('jabatanedit');
            const isActive = $(this).data('isactiveedit');


            $("#idEdit").val(id);
            $("#nameEdit").val(name);
            $("#emailEdit").val(email);
            $("#nikEdit").val(nik);
            $("#idJabatanEdit").val(jabatan);
            $("#isActiveEdit").prop("checked", isActive == 1);

      });
});