// SET THEME
// Fungsi untuk mengubah tema menjadi tema gelap
// function setDarkTheme() {
//       $('#thems').attr('data-bs-theme', 'dark');
//       localStorage.setItem('theme', 'dark');
//       // document.documentElement.setAttribute('data-bs-theme', 'dark');
//       // localStorage.setItem('theme', 'dark');
// }

// // Fungsi untuk mengubah tema menjadi tema terang
// function setLightTheme() {
//       $('#thems').attr('data-bs-theme', 'light');
//       localStorage.setItem('theme', 'light');
//       $('#thems').attr('data-bs-theme', 'light');
//         localStorage.setItem('theme', 'light');
//         $('#moon').removeClass('ti ti-moon').addClass('ti ti-moon');
//         $('#sun').removeClass('ti ti-sun').addClass('ti ti-sun');
//       // document.documentElement.setAttribute('data-bs-theme', 'light');
//       // localStorage.setItem('theme', 'light');
// }

// // Fungsi untuk memeriksa tema yang disimpan dalam storage
// function checkTheme() {
//       const savedTheme = localStorage.getItem('theme');
//       console.log(savedTheme);
//       if (savedTheme == 'dark') {
//             setDarkTheme();
//       } else {
//             setLightTheme(); // Mengatur tema default jika tidak ada tema yang disimpan
//       }
// }

// // Panggil fungsi untuk memeriksa tema saat halaman dimuat
// checkTheme();

// // Tambahkan event listener untuk tombol tema
// document.querySelector('.sun').addEventListener('click', setLightTheme);
// document.querySelector('.moon').addEventListener('click', setDarkTheme);
$(document).ready(function () {
      // Function to set dark theme
      function setDarkTheme() {
            $('#thems').attr('data-bs-theme', 'dark');
            localStorage.setItem('theme', 'dark');
      }

      // Function to set light theme
      function setLightTheme() {
            $('#thems').attr('data-bs-theme', 'light');
            localStorage.setItem('theme', 'light');
      }

      // Check localStorage for theme on page load
      var storedTheme = localStorage.getItem('theme');
      if (storedTheme === 'dark') {
            setDarkTheme();
      } else {
            setLightTheme();
      }

      // Toggle theme on click
      $('.nav-link').click(function () {
            if ($('#thems').attr('data-bs-theme') === 'dark') {
                  setDarkTheme();
            } else {
                  setLightTheme();
            }
      });
});




// SET LAYOUT
function setLayoutVertical() {
      document.documentElement.setAttribute('data-layout', 'vertical');
      localStorage.setItem('layout', 'vertical');
}
function setLayoutHorizontal() {
      document.documentElement.setAttribute('data-layout', 'horizontal');
      localStorage.setItem('layout', 'horizontal');
}
function checkLayout() {
      const savedLayout = localStorage.getItem('layout');
      if (savedLayout === 'vertical') {
            setLayoutVertical();
      } else {
            setLayoutHorizontal();
      }
}
checkLayout();
document.querySelector('#vertical-layout').addEventListener('click', setLayoutVertical);
document.querySelector('#horizontal-layout').addEventListener('click', setLayoutHorizontal);

// SET COLOR THEME data-color-theme="Purple_Theme"
function biru() {
      document.documentElement.setAttribute('data-color-theme', 'Blue_Theme');
      localStorage.setItem('colorTheme', 'Blue_Theme');
      document.querySelector('#Blue_Theme').checked = true;
}

function aqua() {
      document.documentElement.setAttribute('data-color-theme', 'Aqua_Theme');
      localStorage.setItem('colorTheme', 'Aqua_Theme');
      document.querySelector('#Aqua_Theme').checked = true;
}

function ungu() {
      document.documentElement.setAttribute('data-color-theme', 'Purple_Theme');
      localStorage.setItem('colorTheme', 'Purple_Theme');
      document.querySelector('#Purple_Theme').checked = true;
}
function hijau() {
      document.documentElement.setAttribute('data-color-theme', 'Green_Theme');
      localStorage.setItem('colorTheme', 'Green_Theme');
      document.querySelector('#green-theme-layout').checked = true;
}
function cyan() {
      document.documentElement.setAttribute('data-color-theme', 'Cyan_Theme');
      localStorage.setItem('colorTheme', 'Cyan_Theme');
      document.querySelector('#cyan-theme-layout').checked = true;
}
function orange() {
      document.documentElement.setAttribute('data-color-theme', 'Orange_Theme');
      localStorage.setItem('colorTheme', 'Orange_Theme');
      document.querySelector('#orange-theme-layout').checked = true;
}

function checkColor() {
      const savedColor = localStorage.getItem('colorTheme');
      if (savedColor === 'Blue_Theme') {
            biru();
      } else if (savedColor === 'Aqua_Theme') {
            aqua();
      } else if (savedColor === 'Purple_Theme') {
            ungu();
      } else if (savedColor === 'Green_Theme') {
            hijau();
      } else if (savedColor === 'Cyan_Theme') {
            cyan();
      } else {
            orange();
      }
}

checkColor();

document.querySelector('#Blue_Theme').addEventListener('click', biru);
document.querySelector('#Aqua_Theme').addEventListener('click', aqua);
document.querySelector('#Purple_Theme').addEventListener('click', ungu);
document.querySelector('#green-theme-layout').addEventListener('click', hijau);
document.querySelector('#cyan-theme-layout').addEventListener('click', cyan);
document.querySelector('#orange-theme-layout').addEventListener('click', orange);
