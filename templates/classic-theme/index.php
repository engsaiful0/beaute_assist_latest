<?php
overall_header();
global $config;
?>
<style>
    body {
        width: 100%;
        font-family: 'Sumptuous Light', sans-serif;
        align-items: center;
        background-color: rgb(250, 241, 233) !important;
    }

    input[type="text"] {
        border: 1px solid #E5998C;
        background-color: #FFFFFF;
        color: #E5998C;
        font-size: 1em;
    }

    .btn_submit:hover {
        border: thin solid #E5998C;
        background-color: rgb(230 180 180);
        color: #666;
    }

    .btn_submit {
        /* border: thin solid #E5998C; */
        background-color: rgb(230 180 171);
        color: #666;
        font-size: 1em;
        padding: 10px;
        display: inline-block;
        height: 45px;
        width: 130px;
        text-align: center;
    }

    .form-control1 {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: .25rem;
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .input-group>.form-control1,
    .input-group>.form-select {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
    }

    @media only screen and (max-width: 500px) {
        .landing-page {
            height: 800px;
            width: 100% !important;
            background-image: url('<?php _esc($config['site_url']) ?>storage/products/background_image_mobile.png');
            background-repeat: no-repeat;
        }

        .landing-page-right {
            width: 100%;
            margin-top: 185px !important;
        }

        .landing-page-left {
            width: 100%;
            height: 280px;
        }

        .form-inner-div {
            margin-top: 50px !important;
            width: 80%;
            margin: 0 auto;
        }

        .becoming-professional {
            text-align: jestify !important;
            color: red !important;
            font-size: 20px;
            margin-top: 20px;
            color: white
        }
    }

    @media only screen and (min-width: 501px) and (max-width: 2200px) {
        .landing-page {
            height: 449px;
            width: 100% !important;
            background-image: url('<?php _esc($config['site_url']) ?>storage/products/background_image.png');
            background-repeat: no-repeat;
        }

        .landing-page-right {
            width: 50%;
            float: right;
        }

        .landing-page-left {
            width: 50%;
            float: left;
        }

        .form-inner-div {
            margin-top: 50px !important;
            width: 80%;
            margin: 0 auto;
        }

        .becoming-professional {
            text-align: jestify;
            font-size: 20px;
            margin-top: 20px;
            color: white
        }
    }
</style>
<link type="text/css" href="<?php _esc(TEMPLATE_URL); ?>/service_fragments/css/gig_detail.css" rel="stylesheet" />
<!-- Intro Banner
        ================================================== -->
<div class="landing-page">
    <div class="landing-page-left">

    </div>
    <div class="landing-page-right" style="height: 449px;">
        <div class="header-logo" style="width: 90%;margin: 0 auto;margin-top: 50px;">
            <p style="text-align: left;color: #666;font-size: 20px;">All World Class Beauty Assists are
                here!!!</p>
            <p style="text-align: left;color: #666;font-size: 30px;font-weight:bold;margin-top:30px;color:#E5998C ">
                Students and teachers save over 80% </p>
            <p style="color: #666;" class="becoming-professional">Becoming a professional in the beauty industry is a rewarding career
                that can bring you joy and satisfaction.</p>
        </div>
        <div class="form-inner-div">
            <div style="width: 50%;float: left">
                <div style="width: 70%;margin:0 auto;" class="right-button-container">
                    <a href="<?php url("SIGNUP") ?>" style="border-radius:5px;color:#666;" class="btn  btn_submit" type="button" id="button-addon2">Get Started</a>
                </div>
            </div>
            <div style="width: 50%;float: right;">
                <div style="width: 50%;margin:0 auto;" class="right-button-container">
                    <!-- <a href="<?php url("SEARCH_SERVICES") ?>" style="border-radius:5px;color:black" class="btn  btn_submit btn-circle-30" type="button" id="button-addon2">Services</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Image Section Starts Here -->
</div>
<div style="clear: left"></div>
<style>
    @media screen and (min-width: 480px) {
        .text-description {
            width: 100%;
            height: 220px;
        }
    }

    @media screen and (max-width: 479px) {
        .text-description {
            width: 100%;
            height: 300px;
        }
    }
</style>
<div class="footer-content text-description">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div style="padding:40px; " class="col-md-8">
            <p style="font-size: 20px; font-weight:bold;text-align:center">World's Best Beautassists are here!!!!</p>
            <p style="text-align: justify;">There is no greater sense of dread and panic than waking up and
                realizing you overslept. It happens to the best of us. Despite this, you don’t want to look like
                you’ve thrown yourself together in less than ten minutes.</p>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
<!-- Highest Rated Beautassists -->
<?php
                                if ($is_login) {
                                ?>
<div class="section full-width-carousel-fix">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline margin-top-0 margin-bottom-25">
                    <h3><?php _e('Top Beautassits') ?></h3>
                    <a style="color: #666;" href="<?php url("BEAUTASSISTS") ?>" class="headline-link"><?php _e('Browse All Beautassits') ?></a>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="default-slick-carousel freelancers-container freelancers-grid-layout">
                    <!--Freelancer -->
                    <?php
                    foreach ($freelancers as $freelancer) {
                    ?>
                        <div class="freelancer">
                            <!-- Overview -->
                            <div class="freelancer-overview" style="height:300px">
                                <div class="freelancer-overview-inner">
                                    <!-- Avatar -->
                                    <div class="freelancer-avatar">
                                        <div class="verified-badge"></div>
                                        <a href="<?php url("PROFILE") ?>/<?php _esc($freelancer['username']) ?>">
                                            <img src="<?php _esc($config['site_url']); ?>storage/profile/<?php _esc($freelancer['image']) ?>" alt="<?php _esc($freelancer['name']) ?>">
                                        </a>
                                    </div>
                                    <!-- Name -->
                                    <div class="freelancer-name">
                                        <h4>
                                            <a href="<?php url("PROFILE") ?>/<?php _esc($freelancer['username']) ?>"><?php _esc($freelancer['name']) ?>
                                                <div class="flag flag-<?php _esc($freelancer['country_code']) ?>">
                                            </a>
                                        </h4>
                                        <?php
                                        if ($freelancer['category'] != "") {
                                            echo "<span>";
                                            _esc($freelancer['category']);
                                            if ($freelancer['subcategory'] != "") {
                                                echo " / ";
                                                _esc($freelancer['subcategory']);
                                            }
                                            echo "</span>";
                                        }
                                        ?>
                                    </div>
                                    <!-- Rating -->
                                    <div class="freelancer-rating">
                                        <div class="star-rating" data-rating="<?php _esc($freelancer['rating']) ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Details -->
                            <div class="freelancer-details">
                                <div class="freelancer-details-list">
                                    <ul>
                                        <li><?php _e("Hourly Rate") ?><strong><?php _esc($freelancer['hourly_rate']) ?></strong></li>
                                        <li>Location <strong><i class="la la-map-marker"></i> <?php _esc($freelancer['address']) ?></strong></li>
                                    </ul>
                                </div>
                                <a href="<?php url("PROFILE") ?>/<?php _esc($freelancer['username']) ?>" class="button button-sliding-icon ripple-effect"><?php _e("View Profile") ?> <i class="icon-material-outline-arrow-right-alt"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Freelancer / End -->
                </div>
            </div>

        </div>
    </div>
</div>
<?php } ?>
<!-- Highest Rated Beautassists / End-->
<?php
overall_footer();
?>