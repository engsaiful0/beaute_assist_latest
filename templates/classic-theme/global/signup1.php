<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Beautassist.com-Register</title>


    <!-- Bootstrap core CSS -->
    <link href="<?php _esc(TEMPLATE_URL);?>/css-ui/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Bootstrap CSS -->
    <link href="<?php _esc(TEMPLATE_URL);?>/css-ui/style.css" rel="stylesheet">

    <!--Font Awesome styles for this template -->
    <link href="<?php _esc(TEMPLATE_URL);?>/css-ui/all.css" rel="stylesheet">
    <link href="<?php _esc(TEMPLATE_URL);?>/css-ui/fontawesome.css" rel="stylesheet">
    <link href="<?php _esc(TEMPLATE_URL);?>/css-ui/solid.css" rel="stylesheet">

    <script src="<?php _esc(TEMPLATE_URL);?>/js/jquery-3.4.1.min.js"></script>

    <style type="text/css">
        input[type=text]{border:1px solid #E5998C; background-color: #FFFFFF; color: #E5998C; font-size: 1em; padding: 15px;}
        input[type=text]::placeholder{color: #747579; opacity: 0.5;}
        input[type=text]:focus{border:1px solid #E5998C; background-color: #FFFFFF; color: #E5998C;}

        .account-type {
            font-size: 25px;
            margin-bottom: 10px;
            margin-top: -5px;
        }
    </style>
</head>
<?php
overall_header(__("Login"));
?>
<body class="text-center">

<section class="container-fluid h-100">

    <div class="row">

        <!-- Login Section Starts Here -->
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

            <div class="row align-items-center vh-100">

                <div class="mx-auto">

                    <img src="<?php _esc(TEMPLATE_URL);?>/images-ui/Beautassist_Logo_Color_Logotype_300dpiRGB.png" class="img-fluid img_logo" alt="logo">

                    <h2 class="m-5 text-uppercase"><?php _e("Register") ?></h2>

                    <!-- Login Form Starts Here -->
                    <form method="post" id="register-account-form" action="#" accept-charset="UTF-8" class="form_ctr m-auto">

                        <!-- Account Type -->
                        <div class="account-type">
                            <!-- <div> -->
                            <input type="radio" name="user-type" id="freelancer-radio" class="account-type-radio" value="1" checked/>
                            <label for="freelancer-radio" class="ripple-effect-dark"><i class="la la-user"></i>Beauty Expert</label>
                            <!-- </div> -->
                            <!-- <div> -->
                            <input type="radio" name="user-type" id="employer-radio" class="account-type-radio" value="2" />
                            <label for="employer-radio" class="ripple-effect-dark"><i class="la la-suitcase"></i> User</label>
                            <!-- </div> -->
                        </div>
                        <span id="type-status"><?php if($type_error != ""){ _esc($type_error) ; }?></span>

                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="<?php _e("Full Name") ?>" value="<?php _esc($name_field)?>" id="name" name="name" aria-describedby="NameHelp" onBlur="checkAvailabilityName()" required/>
                            <!-- <input type="email" class="form-control" id="exampleInputName1" aria-describedby="NameHelp" placeholder="Name"> -->
                        </div>

                        <span id="name-availability-status"><?php if($name_error != ""){ _esc($name_error) ; }?></span>

                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="<?php _e("Username") ?>" value="<?php _esc($username_field)?>" id="Rusername" name="username" onBlur="checkAvailabilityUsername()" required/>
                            <!-- <input type="email" class="form-control" id="exampleInputUsername1" placeholder="Username"> -->
                        </div>

                        <span id="user-availability-status"><?php if($username_error != ""){ _esc($username_error) ; }?></span>

                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="<?php _e("Email Address") ?>" value="<?php _esc($email_field)?>" name="email" id="email" onBlur="checkAvailabilityEmail()" required/>
                            <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address"> -->
                        </div>

                        <span id="email-availability-status"><?php if($email_error != ""){ _esc($email_error) ; }?></span>

                        <div class="mb-4">
                            <input type="password" class="form-control" placeholder="<?php _e("Password") ?>" id="Rpassword" name="password" onBlur="checkAvailabilityPassword()" required/>
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                        </div>

                        <span id="password-availability-status"><?php if($password_error != ""){ _esc($password_error) ; }?></span>

                        <div class="form-check">
                            <input type="checkbox" id="agree_for_term" class="form-check-input" name="agree_for_term" value="1" required>
                            <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree to the terms &amp; conditions
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Sign me up for exclusive newsletter deals available to subscribers
                            </label>
                        </div>


                        <div class="d-grid gap-2 mt-5 mx-auto">
                            <button class="btn btn-primary btn_submit" name="submit" type="submit"><?php _e("Register") ?> <i class="icon-feather-arrow-right"></i></button>
                            <!-- <button class="btn btn-primary btn_submit" type="button">Register</button> -->
                        </div>

                        <div class="mt-5">

                            <a href="https://www.apple.com" target="_blank"><img src="<?php _esc(TEMPLATE_URL);?>/images-ui/Group 51.png" class="img-fluid p-3" alt="Apple Logo"></a> <a href="https://www.facebook.com" target="_blank"><img src="<?php _esc(TEMPLATE_URL);?>/images-ui/Group 50.png" class="img-fluid p-3" alt="Facebook Logo"></a> <a href="https://www.google.com" target="_blank"><img src="<?php _esc(TEMPLATE_URL);?>/images-ui/Group 49.png" class="img-fluid p-3" alt="Google Logo"></a> <a href="https://www.instagram.com" target="_blank"><img src="<?php _esc(TEMPLATE_URL);?>/images-ui/Group 48.png" class="img-fluid p-3" alt="Instagram Logo"></a>

                        </div>

                    </form>
                    <!-- Login Form Ends Here -->


                </div>

                <!-- Copyright Section Starts Here -->
                <div class="text-center">

                    <p class="copyright_text">&copy;2021 Beautassist. All Rights Reserved. | <a href="#">About Beautassist</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> </p>

                </div>
                <!-- Copyright Section Ends Here -->

            </div>



        </div>
        <!-- Login Section Ends Here -->

        <!-- Image Section Starts Here -->
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 d-none d-md-block nopadding">

            <div class="row vh-100">

                <img src="<?php _esc(TEMPLATE_URL);?>/images-ui/Rectangle -1.png" class="img-fluid img_banner" alt="banner">

            </div>

        </div>
        <!-- Image Section Ends Here -->

    </div>

</section>

<script>

    var error = "";

    function checkAvailabilityName() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'name=' + $("#name").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#name").removeClass('has-success');
                    $("#name-availability-status").html(data);
                    $("#name").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#name").removeClass('has-error mar-zero');
                    $("#name-availability-status").html("");
                    $("#name").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityUsername() {
        var $item = $("#Rusername").closest('.form-group');
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'username=' + $("#Rusername").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $item.removeClass('has-success');
                    $("#user-availability-status").html(data);
                    $item.addClass('has-error');
                }
                else {
                    error = 0;
                    $item.removeClass('has-error');
                    $("#user-availability-status").html("");
                    $item.addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityEmail() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#email").removeClass('has-success');
                    $("#email-availability-status").html(data);
                    $("#email").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#email").removeClass('has-error mar-zero');
                    $("#email-availability-status").html("");
                    $("#email").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }
    function checkAvailabilityPassword() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?php _esc($config['app_url'])?>check_availability.php",
            data: 'password=' + $("#Rpassword").val(),
            type: "POST",
            success: function (data) {
                if (data != "success") {
                    error = 1;
                    $("#Rpassword").removeClass('has-success');
                    $("#password-availability-status").html(data);
                    $("#Rpassword").addClass('has-error mar-zero');
                }
                else {
                    error = 0;
                    $("#Rpassword").removeClass('has-error mar-zero');
                    $("#password-availability-status").html("");
                    $("#Rpassword").addClass('has-success');
                }
                $("#loaderIcon").hide();
            },
            error: function () {
            }
        });
    }

</script>


</body>
</html>

