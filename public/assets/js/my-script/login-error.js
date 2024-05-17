

// LOGIN NOTIF
const flash = document.querySelector('.flash-error-login');
const message = flash.dataset.errorlogin;

if (message) {
      Swal.fire({
            icon: 'error',
            title: "Oops...",
            html: message,
            footer: '<a href="">www.appro.co.id</a>'
      })
}
// LOGIN NOTIF
