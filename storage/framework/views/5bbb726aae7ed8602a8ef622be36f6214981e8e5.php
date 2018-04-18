<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Ticket App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/animate/animate.css')); ?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/css-hamburgers/hamburgers.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                        <p class="text-center txt2">
                            Kenyaman dalam pemesanan 100%
                        </p>
                        <p class="text-center txt2">
                            Kepuasan anda sangat berharga bagi kami
                        </p>
                        <p class="text-center txt2">
                            Diskon 10% bagi para travellers
                        </p>
                        <p class="text-center txt2">
                            Tepat waktu dalam pemberangkatan
                        </p>
                </div>

                <form action="<?php echo e(route('register')); ?>" method="POST" class="login100-form validate-form">
                    <?php echo e(csrf_field()); ?>

                    <span class="login100-form-title">
                        Zard Travel Register
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Name is required">
                        <input class="input100" type="text" name="name" placeholder="Nama">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" <?php if($errors->has('password_confirmation')): ?> data-validate = "{$errors->first('password_confirmation')}" <?php else: ?> data-validate = "Password is required" <?php endif; ?>>
                        <input class="input100" type="password" name="password_confirmation" placeholder="Password confirmation">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="/login">
                            Have an account? Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="<?php echo e(asset('vendor/jquery/jquery-3.2.1.min.j')); ?>s"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('vendor/bootstrap/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('vendor/tilt/tilt.jquery.min.js')); ?>"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>
