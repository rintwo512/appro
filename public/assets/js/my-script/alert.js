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
            title: "Success!",
            html: successMessage,
            footer: '<a href="">www.appro.co.id</a>'
      })
}




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

// TOAST
const flashTo = document.querySelector('#toasted');
const messageTo = flashTo.dataset.successtoast;
if (messageTo) {

      toastr.success(
            messageTo,
            "Success!",
            { showMethod: "slideDown", hideMethod: "slideUp", timeOut: 2000 }
      );
}
// TOAST
