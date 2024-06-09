<?php
overall_header(__("Membership Plan"));
?>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php _e("Membership Plan") ?></h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("Membership Plan") ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Content
================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <form name="form1" method="post">
                <div class="billing-cycle-radios margin-bottom-70">
                    <?php
                    if ($total_monthly) {
                    ?>
                        <div class="radio billed-monthly-radio">
                            <input id="radio-monthly" name="billed-type" type="radio" value="monthly" checked="">
                            <label for="radio-monthly"><span class="radio-label"></span> <?php _e("Monthly") ?></label>
                        </div>
                    <?php
                    }
                    if ($total_annual) {
                    ?>
                        <div class="radio billed-yearly-radio">
                            <input id="radio-yearly" name="billed-type" type="radio" value="yearly">
                            <label for="radio-yearly"><span class="radio-label"></span> <?php _e("Yearly") ?></label>
                        </div>
                    <?php
                    }
                    if ($total_lifetime) {
                    ?>
                        <div class="radio billed-lifetime-radio">
                            <input id="radio-lifetime" name="billed-type" type="radio" value="lifetime">
                            <label for="radio-lifetime"><span class="radio-label"></span> <?php _e("Lifetime") ?></label>
                        </div>
                    <?php } ?>
                </div>
                <!-- Pricing Plans Container -->
                <div class="pricing-plans-container">
                    <?php
                    foreach ($sub_types as $plan) {
                    ?>
                        <!-- Plan -->
                        <div style="background-color: white;margin-right:5px;" class='pricing-plan <?php if (isset($plan['recommended']) && $plan['recommended'] == "yes") {
                                                                                                        echo 'recommended';
                                                                                                    } ?>'>

                            <?php
                            if (isset($plan['recommended']) && $plan['recommended'] == "yes") {
                                echo '<div class="recommended-badge">' . __("Recommended") . '</div> ';
                            }
                            ?>
                            <h3><?php _esc($plan['title']) ?></h3>
                            <?php
                            if ($plan['id'] == "free" || $plan['id'] == "trial") {
                            ?>
                                <div class="pricing-plan-label"><strong>
                                        <?php
                                        if ($plan['id'] == "free")
                                            _e("Free");
                                        else
                                            _e("Trial");
                                        ?>
                                    </strong></div>
                            <?php
                            } else {
                                if ($total_monthly != 0)
                                    echo '<div class="pricing-plan-label billed-monthly-label"><strong>' . _esc($plan['monthly_price'], false) . '</strong>/ ' . __("Monthly") . '</div>';
                                if ($total_annual != 0)
                                    echo '<div class="pricing-plan-label billed-yearly-label"><strong>' . _esc($plan['annual_price'], false) . '</strong>/ ' . __("Yearly") . '</div>';
                                if ($total_lifetime != 0)
                                    echo '<div class="pricing-plan-label billed-lifetime-label"><strong>' . _esc($plan['lifetime_price'], false) . '</strong>/ ' . __("Lifetime") . '</div>';
                            }
                            ?>

                            <div class="pricing-plan-features" style="margin-top:250px">
                                <strong><?php _e("Features of") ?> <?php _esc($plan['title']) ?></strong>
                                <ul>
                                    <li><i class="fa fa-check"></i> &nbsp;<b><?php _e("Service Commission") ?></b> <?php _esc($plan['service_commission_to_admin']) ?>%</li>
                                    <li><i class="fa fa-check"></i> &nbsp;<b><?php _e("No of Skills") ?> </b><?php _esc($plan['skills_limit']) ?></li>
                                    <li><i class="fa fa-check"></i> &nbsp;<b><?php _e("No of Services") ?></b> <?php _esc($plan['service_posting_limit']) ?></li>
                                    <li><i class="fa fa-check"></i> &nbsp;<b><?php _e("Service Expiration Duration") ?></b> <?php _esc($plan['service_expire_duration']) ?></li>
                                    <li><i class="fa fa-check"></i> &nbsp;<b><?php _e("No fo Meeting Schedule") ?></b> <?php _esc($plan['number_of_meeting_schedules']) ?></li>
                                    <?php
                                    if ($plan['featured_badge_duration'] == 'No') {
                                    ?>
                                        <li><i class="fa fa-times"></i> &nbsp;<b><?php _e("Feature Badge Duration") ?></b> <?php _esc($plan['featured_badge_duration']) ?></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><i class="fa fa-check"></i> &nbsp;<b><?php _e("Feature Badge Duration") ?></b> <?php _esc($plan['featured_badge_duration']) ?></li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($plan['featured_badge_duration'] == 'No') {
                                    ?>
                                        <li><i class="fa fa-times"></i> &nbsp;<b><?php _e("Urgent Badge Duration") ?></b> <?php _esc($plan['urgent_badge_duration']) ?></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><i class="fa fa-check"></i> &nbsp;<b><?php _e("Urgent Badge Duration") ?></b> <?php _esc($plan['urgent_badge_duration']) ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                            if ($plan['Selected'] == 0) {
                                echo '<button type="submit" class="button full-width margin-top-20 ripple-effect" name="upgrade" value="' . _esc($plan['id'], false) . '">' . __("Upgrade") . '</button>';
                            }
                            if ($plan['Selected'] == 1) {
                                echo '<a href="javascript:void(0);" style="background-color:#EA4034;color:white" class="button full-width margin-top-20  ripple-effect">' . __("Current Plan") . '</a>';
                            }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="margin-top-80"></div>
<?php
overall_footer();
?>