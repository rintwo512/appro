
const formLogHeader = document.querySelector('#autoLogoutHeader');
document.querySelector("#btnLogHeader").onclick = function () {
      Swal.fire({
            title: "Apakah Anda yakin ingin keluar ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, logout !!"
      }).then((result) => {
            if (result.isConfirmed) {
                  formLogHeader.submit();
            }
      });
};

