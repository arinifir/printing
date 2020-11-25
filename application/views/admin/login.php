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
            <div class="wrap-login100 p-t-58 p-b-30">
                <div class="login100-form-avatar">
                    <img style="opacity:0.5" src="<?= base_url('assets/login/') ?>images/avatar-01.png" alt="AVATAR">
                </div>
                <span class="login100-form-title p-t-20 p-b-45">Sign In</span>
                <?php if (isset($error)) {
                    echo $error;
                }; ?>
                <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
                    <input class="input100 email" type="text"  placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-envelope"></i></span>
                </div>
                <?php echo form_error('email'); ?>
                <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                    <input class="input100 password" type="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-lock"></i></span>
                </div>
                <?php echo form_error('password'); ?>
                <div class="container-login100-form-btn p-t-10">
                    <button type="button" class="login100-form-btn btnlogin">Sign In</button>
                </div>
                <div class="text-center w-full p-t-25 p-b-65">
                    <a href="#" class="txt1">Forgot Password?</a>
                </div>
                <div class="text-center w-full">
                    <a class="txt1" href="<?= base_url('Auth/register') ?>">Sign Up&nbsp;<i class="fa fa-long-arrow-right"></i>
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
                icon: 'success',
                title: 'Yey...',
                text: '<?= $this->session->flashdata('message');?>'
            })
        })
    </script>
    <?php endif ?>
</body>

</html>