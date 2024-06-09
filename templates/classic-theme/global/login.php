<?php
overall_header(__("Login"));
?>
<!-- Titlebar
================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="login-register-page" style="margin-top: 100px;">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3><?php _e("Login") ?></h3>
                    <span><?php _e("Don't have an account?") ?> <a
                                href="<?php url("SIGNUP") ?>"><?php _e("Sign Up Now!") ?></a></span>
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
                <form method="post">
                    <div class="input-with-icon-left">
                        <i class="la la-user"></i>
                        <input type="text" class="input-text with-border" name="username" id="username"
                               placeholder="<?php _e("Username") ?> / <?php _e("Email Address") ?>" required/>
                    </div>

                    <div class="input-with-icon-left">
                        <i class="la la-unlock"></i>
                        <input type="password" class="input-text with-border" name="password" id="password"
                               placeholder="<?php _e("Password") ?>" required/>
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
                    <a href="<?php url("LOGIN") ?>?fstart=1" class="forgot-password"><?php _e("Forgot Password?") ?></a>
                    <input type="hidden" name="ref" value="{REF}"/>
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" name="submit"
                            type="submit"><?php _e("Login") ?> <i class="icon-feather-arrow-right"></i></button>
                </form>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <img style="width: 100%" src="<?php _esc(TEMPLATE_URL); ?>/images-ui/Rectangle -1.png" class="img-fluid img_banner"
                 alt="banner">
        </div>
    </div>
</div>
<div class="margin-top-70"></div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
overall_footer();
?>
