<!-- Dashboard Sidebar
    ================================================== -->
<div class="dashboard-sidebar">
    <div class="dashboard-sidebar-inner" data-simplebar>
        <div class="dashboard-nav-container">

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger">
                <span class="hamburger hamburger--collapse">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </span>
                <span class="trigger-title"><?php _e("Dashboard Navigation") ?></span>
            </a>
            <!-- Navigation -->
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">
                    <ul data-submenu-title="<?php _e("My Account") ?>">
                        <li class="active"><a href="<?php url("DASHBOARD") ?>"><i class="icon-material-outline-dashboard"></i> <?php _e("Dashboard") ?></a></li>
                        <li><a href="#"><i class="icon-material-outline-assignment"></i> <?php _e("General") ?></a>
                            <ul>
                                <?php
                                if ($usertype == "user") {
                                ?>
                                    <li><a href="<?php url("MEETING_SCHEDULE_USER") ?>"><i class="icon-material-outline-add-circle-outline"></i><?php _e("Schedule") ?></a></li>;
                                <?php

                                    // echo '<li><a href="' . url("MYSERVICES", false) . '">' . __("My Services") . '</a></li>';
                                } else if ($usertype == "beautician") {
                                ?>
                                    <?php if ($config['quickchat_socket_on_off'] == 'on' || $config['quickchat_ajax_on_off'] == 'on') { ?>
                                        <li><a href="<?php url("MESSAGE") ?>"><i class="icon-material-outline-question-answer"></i> <?php _e("Message") ?></a></li>
                                    <?php } ?>
                                    <li><a href="<?php url("RATING") ?>"><i class="icon-material-outline-thumb-up"></i><?php _e("Rating") ?></a></li>


                                <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <?php
                        if ($usertype == "user") {
                        } else if ($usertype == "beautician") {
                        ?>
                            <li><a href="#"><i class="icon-material-outline-access-time"></i> <?php _e("Schedule") ?></a>
                                <ul>

                                    <li><a href="<?php url("AVAILABLE_TIME") ?>"><i class="icon-material-outline-question-answer"></i><?php _e("Available Times") ?></a></li>
                                    <li><a href="<?php url("PENDING_SCHEDULE") ?>"><i class="icon-material-outline-assignment"></i> <?php _e("Pending") ?></a></li>
                                    <li><a href="<?php url("MEETING_SCHEDULE_BEAUTICIAN") ?>"><i class="icon-material-outline-access-time"></i><?php _e("Schedule") ?></a></li>
                                    <!-- <li><a href="<?php url("CURRENT_SCHEDULE") ?>"><i class="icon-material-outline-assignment"></i> <?php _e("Current Schedule") ?></a></li> -->
                                    <li><a href="<?php url("COMPLETED_SCHEDULE") ?>"><i class="icon-material-outline-check"></i> <?php _e("Completed Schedule") ?></a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>

                        <li><a href="#"><i class="icon-feather-user"></i> <?php _e("Profile") ?></a>
                            <ul>
                                <?php
                                if ($usertype == "user") {
                                ?>
                                    <li><a href="<?php url("EDITPROFILE") ?>"><i class="icon-feather-user"></i> <?php _e("Edit Profile") ?></a></li>
                                <?php
                                } else if ($usertype == "beautician") {
                                ?>
                                    <li><a target="_blank" href="<?php url("PROFILE") ?>/<?php _esc($username) ?>"><i class="icon-line-awesome-eye"></i> <?php _e("Profile Public View") ?></a></li>
                                    <li><a href="<?php url("EDITPROFILE") ?>"><i class="icon-line-awesome-pencil-square"></i> <?php _e("Edit Profile") ?></a></li>
                                    <li><a href="<?php url("GALLERY") ?>"><i class="icon-line-awesome-picture-o"></i> <?php _e("Gallery") ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-feather-user"></i> <?php _e("My Account") ?></a>
                            <ul>
                                <?php
                                if ($usertype == "user") {
                                ?>
                                    <li><a href="<?php url("ACCOUNT_SETTING") ?>"><i class="icon-material-outline-settings"></i> <?php _e("Account Setting") ?></a></li>
                                <?php
                                } else if ($usertype == "beautician") {
                                ?>
                                    <li><a href="<?php url("ACCOUNT_SETTING") ?>"><i class="icon-material-outline-settings"></i> <?php _e("Account Setting") ?></a></li>
                                    <li><a href="<?php url("MEMBERSHIP") ?>"><i class="icon-material-outline-favorite"></i> <?php _e("Membership") ?></a></li>
                                    <li><a href="<?php url("TRANSACTION") ?>"><i class="icon-feather-file-text"></i> <?php _e("Transactions") ?></a></li>
                                    <li><a href="<?php url("BILLING") ?>"><i class="icon-material-outline-local-atm"></i> <?php _e("Billing") ?></a></li>
                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                        <li><a href="<?php url("LOGOUT") ?>"><i class="icon-material-outline-power-settings-new"></i> <?php _e("Logout") ?></a></li>
                    </ul>
                    <ul>
                        <li class="hidden" <a href="<?php url("DEPOSIT") ?>"><i class="icon-feather-file-text"></i> <?php _e("Deposit") ?></a></li>
                        <li class="hidden"><a href="<?php url("TRANSFER") ?>"><i class="icon-feather-file-text"></i> <?php _e("Transfer") ?></a></li>
                        <li class="hidden"><a href="<?php url("WITHDRAW") ?>"><i class="icon-feather-file-text"></i> <?php _e("Withdraw") ?></a></li>

                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->
        </div>
    </div>
</div>
<!-- Dashboard Sidebar / End -->