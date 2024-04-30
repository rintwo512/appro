const flashError = document.querySelector('.flash-error');
const errorMessage = flashError.dataset.error;

if (errorMessage) {
      Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: errorMessage,
            footer: '<a href="">www.appro.co.id</a>'
      })

}

const flashSuccess = document.querySelector('.flash-success');
const successMessage = flashSuccess.dataset.success;

if (successMessage) {
      Swal.fire({
            icon: 'success',
            title: "Good job!",
            html: successMessage
      })
}




// LOGIN NOTIF
const flash = document.querySelector('.flash-error-login');
const message = flash.dataset.errorlogin;

if (message) {
      Swal.fire({
            icon: 'error',
            title: "Oops...",
            html: message
      })
}
// LOGIN NOTIF