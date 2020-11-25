<script>
    //triggers
    $('.btnlogin').on('click', function() {
        const email = $('.email').val();
        const password = $('.password').val();
        $.ajax({
            method: "post",
            url: "<?= base_url('API/login') ?>",
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            success: function(response) {
                const status = response.status;
                const role = response.role;
                console.log(response);
                if (status == "success") {
                    if (role == "pemilik") {
                        window.location.href = '<?= base_url('Admin') ?>';
                    } else if (role == "user") {
                        window.location.href = '<?= base_url('Main') ?>';
                    }
                } else if (status == "wrong_password") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password Salah!'
                    })
                    $('.password').val('')
                } else if (status == "not_active") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Akun Belum Terverifikasi!'
                    })
                } else if (status == "empty") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'User Tidak Terdaftar!'
                    })
                }
                if (email == '' || password == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Email atau Password Kosong!'
                    })
                }
            }
        });
    })
</script>