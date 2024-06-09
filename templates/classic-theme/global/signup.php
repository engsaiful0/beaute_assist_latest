<?php
overall_header_signup(__("Login"));
?>
<!-- Titlebar
================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="login-register-page" style="margin-top: 30px;">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <img src="<?php _esc(TEMPLATE_URL); ?>/images-ui/Beautassist_Logo_Color_Logotype_300dpiRGB.png"
                         class="img-fluid img_logo" alt="logo">
                    <p style="color: #E5998C;margin-top: 20px;font-size:22px" class="m-5"><?php _e("Register") ?></password>
                    <span style="margin-top: 20px"><?php _e("Already have an account?") ?> <br><a
                                href="<?php url("LOGIN") ?>"><?php _e("Login Now") ?></a></span>
                </div>
                <?php if ($config['facebook_app_id'] != "" && $config['google_app_id'] != "") { ?>
                    <div class="social-login-buttons">
                        <?php if ($config['facebook_app_id'] != "") { ?>
                            <button class="facebook-login ripple-effect" onclick="fblogin()"><i
                                        class="fa fa-facebook"></i> <?php _e("Log In via Facebook") ?>
                            </button>
                        <?php } ?>

                        <?php if ($config['google_app_id'] != "") { ?>
                            <button class="google-login ripple-effect" onclick="gmlogin()"><i
                                        class="fa fa-google"></i> <?php _e("Log In via Google") ?>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="social-login-separator"><span><?php _e("or") ?></span></div>
                <?php } ?>
                <!-- Form -->
                <?php
                if ($error != '') {
                    echo '<span class="status-not-available">' . $error . '</span>';
                }
                ?>
                <form method="post" id="register-account-form" action="#" accept-charset="UTF-8"
                      class="form_ctr m-auto">
                    <div class="row" style="margin-left: 10px;">
                        <div class="type-container" style="width: 100%;margin: 0 auto">
                            <div class="left-radio" style="width: 100%;float: left">
                                <div class="radio-lavel" style="float: left;">
                                    <input style="margin-top: 6px;" type="radio" name="user-type" id="freelancer-radio"
                                           class="account-type-radio"
                                           value="1"
                                           checked/>
                                </div>
                                <div class="radio-lavel" style="float: left">
                                    <label for="freelancer-radio" class="ripple-effect-dark">&nbsp;&nbsp;Apply to be Beautassist consultant
                                        </label>
                                </div>
                            </div>
                            <div class="right-radio" style="width: 100%;float: right">
                                <div class="radio-lavel" style="float: left;">
                                    <input style="margin-top: 6px;" type="radio" name="user-type" id="employer-radio"
                                           class="account-type-radio"
                                           value="2"/>
                                </div>
                                <div class="radio-lavel" style="float: left">
                                    <label for="employer-radio" class="ripple-effect-dark">&nbsp;&nbsp;
                                    I'm looking for beauty consultations</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="input-with-icon-left">
                        <i class="la la-list"></i>
                        <input type="text" class="form-control" placeholder="<?php _e("Full Name") ?>"
                               value="<?php _esc($name_field) ?>" id="name" name="name" aria-describedby="NameHelp"
                               onBlur="checkAvailabilityName()" required/>
                        <span id="name-availability-status"><?php if ($name_error != "") {
                                _esc($name_error);
                            } ?></span>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="la la-user"></i>
                        <input type="text" class="form-control" placeholder="<?php _e("Username") ?>"
                               value="<?php _esc($username_field) ?>" id="Rusername" name="username"
                               onBlur="checkAvailabilityUsername()" required/>
                        <span id="user-availability-status"><?php if ($username_error != "") {
                                _esc($username_error);
                            } ?></span>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="la la-envelope"></i>
                        <input type="text" class="form-control" placeholder="<?php _e("Email Address") ?>"
                               value="<?php _esc($email_field) ?>" name="email" id="email"
                               onBlur="checkAvailabilityEmail()" required/>
                        <span id="email-availability-status"><?php if ($email_error != "") {
                                _esc($email_error);
                            } ?></span>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="la la-unlock"></i>
                        <input type="password" class="form-control" placeholder="<?php _e("Password") ?>" id="Rpassword"
                               name="password" onBlur="checkAvailabilityPassword()" required/>
                        <span id="password-availability-status"><?php if ($password_error != "") {
                                _esc($password_error);
                            } ?></span>
                    </div>
                    <div class="input-with-icon-left">
                        <div class="text-center">
                            <?php
                            if($config['recaptcha_mode'] == '1'){
                                echo '<div class="g-recaptcha" data-sitekey="'._esc($config['recaptcha_public_key'],false).'"></div>';
                            }
                            ?>
                        </div>
                        <span><?php if($recaptcha_error != ""){ _esc($recaptcha_error) ; }?></span>
                    </div>

                    <input type="hidden" name="ref" value="{REF}"/>
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" name="submit" type="submit"><?php _e("Register") ?> <i class="icon-feather-arrow-right"></i></button>
                </form>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <img style="width: 100%" src="<?php _esc(TEMPLATE_URL); ?>/images-ui/Rectangle -1.png"
                 class="img-fluid img_banner"
                 alt="banner">
        </div>
    </div>
</div>
<div class="margin-top-70"></div>
<div class="margin-top-70"></div>
<script src='https://www.google.com/recaptcha/api.js'></script>
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
<?php
overall_footer();
?>
