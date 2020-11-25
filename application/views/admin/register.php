<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url('assets/login/') ?>images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/') ?>css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url('assets/login/') ?>images/img-01.jpg');">
            <div class="wrap-login100 p-t-31 p-b-30">
                <div class="login100-form-avatar">
                    <img style="opacity:0.5" src="<?= base_url('assets/login/') ?>images/avatar-01.png" alt="AVATAR">
                </div>
                <span class="login100-form-title p-t-20 p-b-25">Sign Up</span>
                <?php if (isset($error)) {
                    echo $error;
                }; ?>
                <form class="login100-form validate-form" action="<?= base_url('Auth/register'); ?>" method="post">
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Name is required">
                        <input class="input100 name" type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-user"></i></span>
                    </div>
                    <?= form_error('nama','<p class="badge badge-danger m-b-10 mx-3">','</p>'); ?>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
                        <input class="input100 email" type="email" value="<?= set_value('email') ?>" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-envelope"></i></span>
                    </div>
                    <?= form_error('email','<p class="badge badge-danger m-b-10 mx-3">','</p>'); ?>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                        <input class="input100 password" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-lock"></i></span>
                    </div>
                    <?= form_error('password','<p class="badge badge-danger m-b-10 mx-3">','</p>'); ?>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Konfirmasi Password is required">
                        <input class="input100 password" type="password" name="password2" placeholder="Konfirmasi Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-key"></i></span>
                    </div>
                    <?= form_error('password2','<p class="badge badge-danger m-b-10 mx-3">','</p>'); ?>
                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" class="login100-form-btn btnlogin">Sign Up</button>
                    </div>
                    <div class="text-center w-full p-t-25 p-b-20">
                    </div>
                </form>
                <div class="text-center w-full">
                    <a class="txt1" href="<?= base_url('Auth') ?>">Sign In&nbsp;<i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/') ?>vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/login/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/') ?>vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/') ?>js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <?php
    if ($this->session->flashdata('message')):
    ?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('message');?>'
            })
        })
    </script>
    <?php endif ?>
</body>

</html>