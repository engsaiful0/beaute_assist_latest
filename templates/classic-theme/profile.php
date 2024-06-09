<style>
    :root {
        --bs-success-rgb: 71, 222, 152 !important;
    }

    html,
    body {
        height: 100%;
        width: 100%;
        font-family: Apple Chancery, cursive;
    }

    .btn-info.text-light:hover,
    .btn-info.text-light:focus {
        background: #000;
    }

    table,
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: #ededed !important;
        border-style: solid;
        border-width: 1px !important;
    }
</style>
<style>
    * {
        box-sizing: border-box
    }



    .mySlides {
        display: none;
        transition: transform 1s ease;
    }

    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
        overflow: hidden;
        /* Added overflow hidden */
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white!important;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    /* @keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
} */

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

        .prev,
        .next,
        .text {
            font-size: 11px
        }
    }
</style>
<?php overall_header($pagetitle) ?>
<!-- Titlebar
================================================== -->
<div class="single-page-header freelancer-header" data-background-image="<?php _esc(TEMPLATE_URL); ?>/images/single-freelancer.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-page-header-inner">
                    <div class="left-side">
                        <div class="header-image freelancer-avatar"><img src="<?php _esc($config['site_url']); ?>storage/profile/<?php _esc($userimage); ?>" alt="<?php _esc($fullname); ?>"></div>
                        <div class="header-details">
                            <h3><?php
                                $_SESSION['beautician_id'] = $userid;
                                _esc($fullname); ?> @ <?php _esc($profileusername); ?>
                                <span><?php _e("Member Since:") ?><?php _esc($created); ?></span>
                            </h3>
                            <ul>
                                <li>
                                    <div class="star-rating" data-rating="<?php _esc($average_rating); ?>"></div>
                                </li>
                                <li class="hidden"><img class="flag" src="<?php _esc($config['site_url']); ?>includes/assets/plugins/flags/images/<?php _esc($user_country_code); ?>.png" alt=""> <?php _esc($user_country); ?></li>
                                <?php if ($userstatus == "1") {
                                    echo '<li><div class="verified-badge-with-title">' . __("Verified") . '</div></li>';
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
    <div class="row">
        <!-- Content -->
        <div class="col-xl-8 col-lg-8 content-right-offset">

            <!-- Page Content -->
            <div class="single-page-section">
                <h3 class="margin-bottom-25"><?php _e("About Me") ?></h3>
                <p style="text-align: justify">
                    <?php _esc($about); ?>
                </p>
            </div>
            <div style="background-color:#E6B4AB ;" class=" col-md-12">
                <h3 style="padding:10px"><?php _e("Gallery") ?></h3>

            </div>

            <div class="slideshow-container">
                <?php
                foreach ($gallery_images as $file) {
                ?>
                    <div class="mySlides">
                        <img style="width:100%;height: 400px;" src="<?php _esc($config['site_url']) ?>includes/assets/upload/<?php echo $file['image'] ?>" class="img-thumbnail" style="width:100%;margin-bottom: 10px;" />
                    </div>
                <?php
                }
                ?>



                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <?php
                for ($i = 1; $i <= count($gallery_images); $i++) {

                ?>
                    <span class="dot" onclick="currentSlide(<?php echo $i ?>)"></span>
                <?php
                }
                ?>

            </div>
            <script>
                let slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";

                    // Auto play functionality
                    // Comment out this block if you don't want auto play
                    setTimeout(function() {
                        plusSlides(1);
                    }, 4000); // Change slide every 4 seconds

                    // Slide from left to right
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.transform = "translateX(-100%)";
                    }
                    slides[slideIndex - 1].style.transform = "translateX(0)";
                }
            </script>
            <?php

            if ($total_experiences) { ?>
                <div class="boxed-list margin-bottom-60" id="all-jobs">
                    <div class="boxed-list-headline">
                        <h3><i class="icon-feather-award"></i> <?php _e("Experiences") ?></h3>
                    </div>
                    <div class="listings-container compact-list-layout">
                        <?php foreach ($experiences as $experience) { ?>
                            <div class="job-listing">
                                <div class="job-listing-details">
                                    <div class="job-listing-description">
                                        <h4 class="job-listing-company"><?php _esc($experience['company']); ?></h4>
                                        <h3 class="job-listing-title"><?php _esc($experience['title']); ?></h3>
                                        <p class="job-listing-text read-more-toggle" data-read-more="<?php _e("Read more") ?>" data-read-less="<?php _e("Read less") ?>"><?php _esc($experience['description']); ?></p>
                                    </div>
                                </div>
                                <div class="job-listing-footer margin-top-10">
                                    <ul>
                                        <li><i class="la la-clock-o"></i> <?php _esc($experience['start_date']); ?>
                                            - <?php _esc($experience['end_date']); ?></li>
                                        <li><i class="la la-map-marker"></i> <?php _esc($experience['city']); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="sidebar-container">
                <?php if ($profile_usertype == "beautician") { ?>
                    <!-- Profile Overview -->
                    <div class="profile-overview">
                        <div class="overview-item">
                            <strong><?php _esc($hourly_rate) ?></strong><span><?php _e("Hourly Rate") ?></span>
                        </div>
                        <div class="overview-item">
                            <strong><?php _esc($rehired) ?></strong><span><?php _e("Rehired") ?></span>
                        </div>
                    </div>

                    <!-- Freelancer Indicators -->
                    <div class="sidebar-widget">
                        <div class="freelancer-indicators">

                            <!-- Indicator -->
                            <div class="indicator">
                                <strong><?php _esc($project_completed) ?>%</strong>
                                <div class="indicator-bar" data-indicator-percentage="<?php _esc($project_completed) ?>"><span></span>
                                </div>
                                <span><?php _e("Project Completed") ?></span>
                            </div>

                            <!-- Indicator -->
                            <div class="indicator">
                                <strong><?php _esc($recommendation_percentage) ?>%</strong>
                                <div class="indicator-bar" data-indicator-percentage="<?php _esc($recommendation_percentage) ?>">
                                    <span></span>
                                </div>
                                <span><?php _e("Recommendation") ?></span>
                            </div>

                            <!-- Indicator -->
                            <div class="indicator">
                                <strong><?php _esc($on_budget_percentage) ?>%</strong>
                                <div class="indicator-bar" data-indicator-percentage="<?php _esc($on_budget_percentage) ?>"><span></span>
                                </div>
                                <span><?php _e("On Time") ?></span>
                            </div>

                            <!-- Indicator -->
                            <div class="indicator">
                                <strong><?php _esc($on_time_percentage) ?>%</strong>
                                <div class="indicator-bar" data-indicator-percentage="<?php _esc($on_time_percentage) ?>"><span></span>
                                </div>
                                <span><?php _e("On Budget") ?></span>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="sidebar-widget">
                        <div class="profile-overview">
                            <div class="overview-item">
                                <strong><?php _esc($open_projects) ?></strong><span><?php _e("Open Projects") ?></span>
                            </div>
                            <div class="overview-item">
                                <strong><?php _esc($completed_projects) ?></strong><span><?php _e("Completed Projects") ?></span>
                            </div>
                        </div>
                        <div class="profile-overview">
                            <div class="overview-item">
                                <strong><?php _esc($total_projects) ?></strong><span><?php _e("Total Projects") ?></span>
                            </div>
                            <div class="overview-item">
                                <strong><?php _esc($posted_jobs) ?></strong><span><?php _e("Active Jobs") ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php
                if ($is_login) {
                    if ($config['quickchat_socket_on_off'] == 'on' || $config['quickchat_ajax_on_off'] == 'on') {
                        echo '<button type="button" 
                                        class="button ripple-effect full-width margin-top-10 margin-bottom-50 start_zechat zechat-hide-under-768px"
                                    data-chatid="' . _esc($userid, false) . '_' . _esc($userid, false) . '_profile"
                                    data-userid="' . _esc($userid, false) . '"
                                    data-username="' . _esc($profileusername, false) . '"
                                    data-fullname="' . _esc($fullname, false) . '"
                                    data-userimage="' . _esc($userimage, false) . '"
                                    data-userstatus="offline"
                                    data-postid="' . _esc($userid, false) . '"
                                    data-posttype="profile"
                                    data-posttitle="' . __("Direct message") . '"
                                    data-postlink="' . _esc($item_link, false) . '">' . __("Chat now") . '  
                                    <i class="icon-feather-message-circle"></i></button>';

                        echo '<a href="' . _esc($quickchat_url, false) . '" 
                                        class="button ripple-effect full-width margin-top-10 margin-bottom-50 zechat-show-under-768px">
                                        ' . __("Chat now") . ' <i class="icon-feather-message-circle"></i></a>';
                    }
                }
                ?>
                <!-- Widget -->
                <div class="sidebar-widget">
                    <h3><?php _e("Social Profiles") ?></h3>
                    <div class="freelancer-socials margin-top-25">
                        <ul>
                            <?php
                            if ($facebook != "") {
                                echo '<li><a href="' . _esc($facebook, false) . '" data-button-color="#3b5998" title="' . __("Facebook") . '" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="icon-brand-facebook"></i></a></li>';
                            }
                            if ($twitter != "") {
                                echo '<li><a href="' . _esc($twitter, false) . '" data-button-color="#1da1f2" title="' . __("Twitter") . '" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="icon-brand-twitter"></i></a></li>';
                            }
                            if ($linkedin != "") {
                                echo '<li><a href="' . _esc($linkedin, false) . '" data-button-color="#0077b5" title="' . __("Linkedin") . '" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="icon-brand-linkedin"></i></a></li>';
                            }
                            if ($youtube != "") {
                                echo '<li><a href="' . _esc($youtube, false) . '" data-button-color="#ff0000" title="' . __("Youtube") . '" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="icon-brand-youtube"></i></a></li>';
                            }
                            if ($instagram != "") {
                                echo '<li><a href="' . _esc($instagram, false) . '" data-button-color="#e1306c" title="' . __("Instagram") . '" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="icon-brand-instagram"></i></a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <?php if (!$usertype == "beautician") { ?>
                    <!-- Widget -->
                    <div class="sidebar-widget">
                        <h3><?php _e("Skills") ?></h3>
                        <div class="task-tags">
                            <?php _esc($skills) ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- Sidebar Widget -->
                <div class="sidebar-widget">
                    <h3><?php _e("Bookmark share") ?></h3>

                    <?php if ($usertype == 'beautician') { ?>
                        <!-- Bookmark Button -->
                        <button class="bookmark-button fav-button margin-bottom-25 set-user-fav <?php if ($user_favorite == '1') {
                                                                                                    echo 'added';
                                                                                                } ?>" data-favuser-id="<?php _esc($userid) ?>" data-userid="<?php _esc($user_id) ?>" data-action="setFavUser">
                            <span class="bookmark-icon"></span>
                            <span class="fav-text"><?php _e("Bookmark") ?></span>
                            <span class="added-text"><?php _e("Saved") ?></span>
                        </button>
                    <?php } ?>
                    <!-- Copy URL -->
                    <div class="copy-url">
                        <input id="copy-url" type="text" value="" class="with-border">
                        <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="<?php _e("Copy to Clipboard") ?>" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
                    </div>

                    <!-- Share Buttons -->
                    <div class="share-buttons margin-top-25">
                        <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                        <div class="share-buttons-content">
                            <span><?php _e("Interesting?") ?> <strong><?php _e("Share It!") ?></strong></span>
                            <ul class="share-buttons-icons">
                                <li>
                                    <a href="mailto:?subject=<?php _esc($username) ?>&body=<?php _esc($item_link) ?>" data-button-color="#dd4b39" title="<?php _e("Share on Email") ?>" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="fa fa-envelope"></i></a>
                                </li>
                                <li><a href="https://facebook.com/sharer/sharer.php?u=<?php _esc($item_link) ?>" data-button-color="#3b5998" title="<?php _e("Share on Facebook") ?>" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="icon-brand-facebook-f"></i></a></li>
                                <li>
                                    <a href="https://twitter.com/share?url=<?php _esc($item_link) ?>&text=<?php _esc($item_title) ?>" data-button-color="#1da1f2" title="<?php _e("Share on Twitter") ?>" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php _esc($item_link) ?>" data-button-color="#0077b5" title="<?php _e("Share on LinkedIn") ?>" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="https://pinterest.com/pin/create/bookmarklet/?&url=<?php _esc($item_link) ?>&description=<?php _esc($item_title) ?>" data-button-color="#bd081c" title="<?php _e("Share on Pinterest") ?>" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                </li>
                                <li><a href="https://web.whatsapp.com/send?text=<?php _esc($item_link) ?>" data-button-color="#25d366" title="<?php _e("Share on WhatsApp") ?>" data-tippy-placement="top" rel="nofollow" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="<?php _esc($config['site_url']); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php _esc($config['site_url']); ?>fullcalendar/lib/main.min.css">
<script src="<?php _esc($config['site_url']); ?>js/jquery-3.6.0.min.js"></script>
<script src="<?php _esc($config['site_url']); ?>js/bootstrap.min.js"></script>
<script src="<?php _esc($config['site_url']); ?>fullcalendar/lib/main.min.js"></script>
<div class="container py-5" id="page-container" style="background-color:white">
    <div class="boxed-list margin-bottom-60">
        <div class="boxed-list-headline">
            <h2 style="text-align: center"><i class="icon-feather-calendar"></i> Booking Schedule</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div id="calendar"></div>
        </div>
        <?php
        if ($_SESSION['user']['user_type'] == "user") { ?>
            <div class="col-md-4">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header">
                        Book Now
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form id="meeting_schedule_form" action="#" method="post">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                    <input id="beautician_id" type="hidden" class="form-control form-control-sm rounded-0" name="beautician_id" value="<?php echo $userid ?>">


                                    <input id="user_id" type="hidden" class="form-control form-control-sm rounded-0" name="user_id" value="<?php echo $user_id ?>">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">meeting Date & Time</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime1" required>
                                </div>
                                <!-- <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End Date & Time</label>
                                    <input type="datetime-local"
                                           class="form-control form-control-sm rounded-0"
                                           name="end_datetime" id="start_datetime1" required>
                                </div> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button onclick="meetingScheduleDataSave()" class=" btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save
                            </button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        <?php
        } else if ($_SESSION['user']['user_type'] == "") {
        ?>
            <div class="col-md-4">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header">
                        <a style="text-decoration: none" href="<?php url("LOGIN") ?>"><?php _e("To book a meeting, please login Now!") ?></a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<!-- Event Details Modal -->
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title">Schedule Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body rounded-0">
                <div class="container-fluid">
                    <dl>
                        <dt class="text-muted">Title</dt>
                        <dd id="title" class="fw-bold fs-4"></dd>
                        <dt class="text-muted">Description</dt>
                        <dd id="description" class=""></dd>
                        <dt class="text-muted">Start</dt>
                        <dd id="start" class=""></dd>
                        <dt class="text-muted">End</dt>
                        <dd id="end" class=""></dd>
                    </dl>
                </div>
            </div>
            <?php if ($_SESSION['user']['user_type'] == "user") { ?>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script>
    var scheds;
    $(function() {
        var form_data = {
            user_id: $("#user_id").val(),
        };
        jQuery.ajax({
            url: "<?php _esc($config['app_url']) ?>json_meeting.php",
            data: form_data,
            type: "POST",
            success: function(data) {
                scheds = $.parseJSON(data)
            },
            error: function() {}
        });
    });
</script>
<script>
    function meetingScheduleDataSave() {
        $("#loaderIcon").show();
        if ($("#title").val() != '' && $("#description").val() != '' && $("#start_datetime").val() != '') {
            var data = $('#meeting_schedule_form').serialize();
            jQuery.ajax({
                url: "<?php _esc($config['app_url']) ?>meeting_schedule_datasave.php",
                data: data,
                type: "POST",
                success: function(data) {
                    if (data != 0) {
                        Snackbar.show({
                            text: 'Data has been saved successfully.'
                        });
                        $("#title").val('');
                        $("#description").val('');
                        $("#start_datetime").val('');
                        //location.reload();
                    } else {
                        Snackbar.show({
                            text: LANG_ERROR_TRY_AGAIN
                        });
                    }
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        } else {
            Snackbar.show({
                text: 'Please fill the form, then submit'
            });
            $("#title").focus();
        }
    }
</script>
<!-- Event Details Modal -->
<!--<script src="--><?php //_esc($config['site_url']); 
                    ?><!--js/script.js"></script>-->


<div class="container">
    <div class="row">
        <!-- Content -->
        <div class="col-xl-8 col-lg-8 content-right-offset">
            <!-- Boxed List -->
            <div class="boxed-list margin-bottom-60">
                <div class="boxed-list-headline">
                    <h3><i class="icon-material-outline-thumb-up"></i> <?php _e("Rating") ?></h3>
                </div>
                <!-- **** Start reviews **** -->
                <div class="listings-container compact-list-layout starReviews">
                    <!-- Show current reviews -->
                    <ul class="show-reviews boxed-list-ul rating-list">
                        <div class="loader" style="margin: 0 auto;"></div>
                    </ul>
                    <!-- This is where your product ID goes -->
                    <div id="review-productId" class="review-productId" style="display: none" data-review-type="project"><?php _esc($userid); ?></div>

                    <script type="text/javascript">
                        var LANG_ADDREVIEWS = "{LANG_ADDREVIEWS}";
                        var LANG_SUBMITREVIEWS = "{LANG_SUBMITREVIEWS}";
                        var LANG_HOW_WOULD_RATE = "{LANG_HOW_WOULD_RATE}";
                        var LANG_REVIEWS = "<?php _e("Reviews") ?>";
                        var LANG_YOURREVIEWS = "{LANG_YOURREVIEWS}";
                        var LANG_ENTER_REVIEW = "{LANG_ENTER_REVIEW}";
                        var LANG_STAR = "{LANG_STAR}";
                    </script>

                </div>
                <!-- **** End reviews **** -->

                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="pagination-container margin-top-40 margin-bottom-10 d-none">
                    <nav class="pagination">
                        <ul>
                            <li><a href="#" class="ripple-effect current-page">1</a></li>
                            <li><a href="#" class="ripple-effect">2</a></li>
                            <li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="clearfix"></div>
                <!-- Pagination / End -->
            </div>
            <!-- Boxed List / End -->

            <?php if ($totalitem) { ?>
                <div class="boxed-list margin-bottom-60" id="all-jobs">
                    <div class="boxed-list-headline">
                        <h3><i class="icon-feather-briefcase"></i> <?php _e("All Jobs") ?></h3>
                    </div>
                    <div class="listings-container compact-list-layout margin-top-30">
                        <?php foreach ($items as $item) { ?>
                            <a href="<?php _esc($item['link']) ?>" class="job-listing">
                                <div class="job-listing-details">
                                    <div class="job-listing-description">
                                        <h3 class="job-listing-title"><?php _esc($item['name']) ?>
                                            <?php
                                            if ($item['featured'] == "1") {
                                                echo '<div class="dashboard-status-button blue">' . __("Featured") . '</div>';
                                            }
                                            if ($item['urgent'] == "1") {
                                                echo '<div class="dashboard-status-button yellow">' . __("Urgent") . '</div>';
                                            }
                                            if ($item['highlight'] == "1") {
                                                echo '<div class="dashboard-status-button red">' . __("Highlight") . '</div>';
                                            }
                                            ?>
                                        </h3>
                                        <div class="job-listing-footer">
                                            <ul>
                                                <li><i class="la la-map-marker"></i> <?php _esc($item['city']) ?>
                                                </li>
                                                <?php if ($item['salary_min'] != "0") { ?>
                                                    <li>
                                                        <i class="la la-credit-card"></i> <?php _esc($item['salary_min']) ?>
                                                        - <?php _esc($item['salary_max']) ?> <?php _e("Per") ?> <?php _esc($item['salary_type']) ?>
                                                    </li>
                                                <?php } ?>
                                                <li><i class="la la-clock-o"></i> <?php _esc($item['created_at']) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="job-type"><?php _esc($item['product_type']) ?></span>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                    <?php if ($show_paging) { ?>
                        <!-- Pagination -->
                        <div class="pagination-container margin-top-20">
                            <nav class="pagination">
                                <ul>
                                    <?php
                                    foreach ($pages as $page) {
                                        if ($page['current'] == 0) {
                                    ?>
                                            <li>
                                                <a href="<?php _esc($page['link']) ?>"><?php _esc($page['title']) ?></a>
                                            </li>
                                        <?php } else {
                                        ?>
                                            <li><a href="#" class="current-page"><?php _esc($page['title']) ?></a>
                                            </li>
                                    <?php }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>


        <!-- Sidebar -->


    </div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->

<?php overall_footer(); ?>

<!-- jQuery Form Validator -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.34/jquery.form-validator.min.js"></script>
<!-- jQuery Barrating plugin -->
<script src="<?php _esc($config['site_url']); ?>plugins/starreviews/assets/js/jquery.barrating.js"></script>
<!-- jQuery starReviews -->
<script src="<?php _esc($config['site_url']); ?>plugins/starreviews/assets/js/starReviews.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        /* Activate our reviews */
        $().reviews('.starReviews');

    });
    var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(document).ready(function() {
        // window.alert = function(){
        //     return true;
        // }
        //alert();
        //   console.log('here');
        //   console.log(scheds);
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({
                    id: row.id,
                    title: row.title,
                    start: row.start_datetime,
                    end: row.end_datetime
                });
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        calendar = new Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            //Random default events
            events: events,
            eventClick: function(info) {
                var _details = $('#event-details-modal')
                var id = info.event.id
                if (!!scheds[id]) {
                    _details.find('#title').text(scheds[id].title)
                    _details.find('#description').text(scheds[id].description)
                    _details.find('#start').text(scheds[id].sdate)
                    _details.find('#end').text(scheds[id].edate)
                    _details.find('#edit,#delete').attr('data-id', id)
                    _details.modal('show')
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: true
        });

        calendar.render();

        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="title"]').val(scheds[id].title)
                _form.find('[name="description"]').val(scheds[id].description)
                _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
                _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
                $('#event-details-modal').modal('hide')
                _form.find('[name="title"]').focus()
            } else {
                alert("Event is undefined");
            }
        })

        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _conf = confirm("Are you sure to delete this scheduled event?");
                if (_conf === true) {
                    location.href = "./delete_schedule.php?id=" + id;
                }
            } else {
                alert("Event is undefined");
            }
        })
    });
</script>