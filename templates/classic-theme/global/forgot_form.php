<?php
overall_header(__("Forgot Password?"));
?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="login-register-page" style="margin-top: 50px;">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3><?php _e("Forgot Password?") ?></h3>
                </div>
                <?php
                if ($success != '') {
                    echo '<span class="status-available">' . __("Confirmation mail sent.") . '<br>
                        ' . _esc($success, false) . '
                    </span>';
                }
                if ($login_error != '') {
                    echo '<span class="status-not-available">' . _esc($login_error, false) . '</span>';
                }
                ?>
                <form method="post">
                    <div class="input-with-icon-left">
                        <i class="la la-envelope"></i>
                        <input type="email" class="input-text with-border" name="email" id="email"
                               placeholder="<?php _e("Email Address") ?>" required/>
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
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" name="submit"
                            type="submit"><?php _e("Request Password") ?> <i class="icon-feather-arrow-right"></i>
                    </button>
                   
                </form>
            </div>
            <div class="already-have-an-account">
                 <span style="margin-top: 20px"><?php _e("Already have an account?") ?> <a
                             href="<?php url("LOGIN") ?>"><?php _e("Login Now!") ?></a></span>
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
