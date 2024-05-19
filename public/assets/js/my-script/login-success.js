

// LOGIN NOTIF
const flashSuccessLogin = document.querySelector('.flash-success-login');
const messageSuccess = flashSuccessLogin.dataset.errorsuccess;

if (messageSuccess) {
      Swal.fire({
            icon: 'success',
            title: "success",
            html: messageSuccess,
            footer: '<a href="">www.appro.co.id</a>'
      })
}
// LOGIN NOTIF
