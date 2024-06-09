<?php
overall_header(__("Message"));
?>
<div class="container margin-top-50 margin-bottom-50">
    <div class="row">
        <div class="col-md-12">
            <div class="margin-0-auto">
                <h1 class="margin-bottom-20"><?php _esc($heading)?>!</h1>
                <p><?php _esc($message) ?></p>
            </div>

        </div>

    </div>
</div>
<div class="container-fluid">
    <img style="width: 100%" src="<?php _esc(TEMPLATE_URL); ?>/images-ui/after_signup.jpg"
         class="img-fluid img_banner"
         alt="banner">
</div>
<?php
overall_footer();
?>
