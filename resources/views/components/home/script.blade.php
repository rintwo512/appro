<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<!-- Import Js Files -->
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
<script src="{{ asset('assets/js/theme/theme.js') }}"></script>
<script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
<script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>

<script src="{{ asset('assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<script src="{{ asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/datatable/datatable-basic.init.js') }}"></script>



<script src="{{ asset('/assets/js/extra-libs/moment/moment.min.js') }}"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js">
</script>
<script src="{{ asset('/assets/js/forms/material-datepicker-init.js') }}"></script>
<script src="{{ asset('/assets/libs/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('/assets/js/forms/daterangepicker-init.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.min.js"></script>

<script src="{{ asset('/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('/assets/js/forms/select2.init.js') }}"></script>

<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/widget/widgets-charts.js') }}"></script>


<script src="{{ asset('assets/libs/excel/xlsx.full.min.js') }}"></script>

<script src="{{ asset('/assets/js/plugins/toastr-init.js') }}"></script>

<script src="{{ asset('/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>


<script src="{{ asset('assets/js/modul_ac/create-ac.js') }}"></script>
<script src="{{ asset('assets/js/modul_ac/delete-ac.js') }}"></script>
<script src="{{ asset('assets/js/modul_ac/details-ac.js') }}"></script>
<script src="{{ asset('assets/js/modul_ac/recycle-bin.js') }}"></script>
<script src="{{ asset('assets/js/modul_ac/data-ac-baru.js') }}"></script>
<script src="{{ asset('assets/js/modul_ac/chart-ac.js') }}"></script>
<script src="{{ asset('assets/js/modul_ac/filter-ac.js') }}"></script>
<script src="{{ asset('assets/js/modul_ac/chart-ac-cari.js') }}"></script>


<script src="{{ asset('assets/js/modul_logbook/details.js') }}"></script>
<script src="{{ asset('assets/js/modul_logbook/delete.js') }}"></script>
<script src="{{ asset('assets/js/modul_logbook/details-recycle-bin.js') }}"></script>
<script src="{{ asset('assets/js/modul_logbook/filter-logbook.js') }}"></script>
<script src="{{ asset('assets/js/modul_logbook/filter-kategori.js') }}"></script>


<script src="{{ asset('assets/js/modul_users/delete-users.js') }}"></script>
<script src="{{ asset('assets/js/modul_users/edit-users.js') }}"></script>

<script src="{{ asset('assets/js/modul_menus/add-menus.js') }}"></script>
<script src="{{ asset('assets/js/modul_menus/delete-menus.js') }}"></script>
<script src="{{ asset('assets/js/modul_menus/edit-menus.js') }}"></script>

<script src="{{ asset('assets/js/modul_submenus/add-submenus.js') }}"></script>
<script src="{{ asset('assets/js/modul_submenus/delete-submenus.js') }}"></script>
<script src="{{ asset('assets/js/modul_submenus/edit-submenus.js') }}"></script>

<script src="{{ asset('assets/js/modul_fitur/delete-fitur-ac.js') }}"></script>
<script src="{{ asset('assets/js/modul_fitur/edit-fitur-ac.js') }}"></script>
<script src="{{ asset('assets/js/modul_fitur/add-fitur-ac.js') }}"></script>

<script src="{{ asset('assets/js/modul_fitur_logbook/add-fitur-logbook.js') }}"></script>
<script src="{{ asset('assets/js/modul_fitur_logbook/edit-fitur-logbook.js') }}"></script>
<script src="{{ asset('assets/js/modul_fitur_logbook/delete-fitur-logbook.js') }}"></script>

<script src="{{ asset('assets/js/modul_dashboard/chart-ac.js') }}"></script>

<script src="{{ asset('assets/js/modul_documents/delete-docs.js') }}"></script>

<script src="{{ asset('assets/js/my-script/alert.js') }}"></script>
<script src="{{ asset('assets/js/settings-theme.js') }}"></script>
<script src="{{ asset('assets/js/logout.js') }}"></script>



<script>
    $(document).ready(function() {
        fetchOnlineUsers();

        function fetchOnlineUsers() {
            $.ajax({
                url: "{{ route('get.online.users') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $("#JumlahOnline").html(response.jumlah)
                    // Proses data pengguna yang online
                    displayOnlineUsers(response.data ? response.data : response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function displayOnlineUsers(users) {
            if (users != 0) {
                $('#online-users-list')
                    .empty(); // Kosongkan daftar pengguna online sebelum menambahkan yang baru
                const urlAsset = "{{ asset('/assets/images/profile/') }}";
                const urlAssetFolder = "{{ asset('/uploads/profile_images/') }}";

                users.forEach(function(user) {
                    var imageUrls = user.image == 'default.jpg' ? `${urlAsset}/${user.image}` :
                        `${urlAssetFolder}/${user.image}`;
                    var userHtml = `
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="${imageUrls}" alt="user" class="rounded-circle" width="48" height="48" />
                            </span>
                            <div class="w-100">
                                <h6 class="mb-1 fw-semibold lh-base">${user.name}</h6>
                                <span class="fs-2 d-block text-body-secondary">${user.user_time_online ? moment(user.user_time_online).locale('id').fromNow() : ''}</span>
                            </div>
                        </a>
                    `;
                    $('#online-users-list').append(userHtml);

                });
            } else {
                $('#online-users-list')
                    .empty();
                var userHtmlOff = `
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">                            
                            <div class="w-100">
                                <span class="fs-4 d-block text-primary">Tidak ada user yang online!</span>
                            </div>
                        </a>
                    `;
                $('#online-users-list').append(userHtmlOff);
            }
        }

        // Perbarui daftar pengguna online setiap 10 detik
        setInterval(fetchOnlineUsers, 10000);
    });
</script>

<script>
    // Fungsi untuk mengirim permintaan ke server untuk memperbarui status login menjadi offline
    function setOfflineStatus(userId) {
        // Kirim permintaan AJAX ke endpoint server
        $.ajax({
            url: '{{ route('logout', ['id' => ':userId']) }}'.replace(':userId',
                userId), // Ganti dengan nama rute logout Anda
            type: 'POST', // Atau sesuaikan dengan metode HTTP yang digunakan di endpoint Anda
            success: function(response) {
                console.log('Status login diperbarui menjadi offline');
                window.location.href = '{{ route('login') }}'; // Ganti dengan nama rute login Anda
            },
            error: function(xhr, status, error) {
                console.error('Gagal memperbarui status login:', error);
            }
        });
    }

    // Fungsi untuk mendeteksi aksi pengguna (misalnya, menutup browser atau tidak ada aktivitas)
    function detectUserActivity(userId) {
        // Deteksi ketika pengguna menutup browser
        // window.addEventListener('beforeunload', function(event) {
        //     setOfflineStatus(userId);
        // });

        // Deteksi ketika tidak ada aktivitas dalam jangka waktu tertentu (misalnya, 5 menit)
        var inactivityTimeout = setTimeout(function() {
            setOfflineStatus(userId);
        }, 15 * 60 * 1000); // Ubah 5 * 60 * 1000 menjadi jangka waktu yang Anda inginkan (dalam milidetik)

        // Reset timer jika ada aktivitas pengguna
        document.addEventListener('mousemove', function() {
            clearTimeout(inactivityTimeout);
            inactivityTimeout = setTimeout(function() {
                setOfflineStatus(userId);
            }, 15 * 60 * 1000); // Atur ulang timer ke jangka waktu yang sama
        });
    }

    // Panggil fungsi detectUserActivity saat halaman dimuat
    $(document).ready(function() {
        var userId = "<?php echo auth()->user()->id; ?>";
        detectUserActivity(userId);
    });
</script>
