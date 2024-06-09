<?php
overall_header(__("Account Setting"));
?>
<!-- Dashboard Container -->
<div class="dashboard-container">

    <?php include_once TEMPLATE_PATH . '/dashboard_sidebar.php'; ?>

    <!-- Dashboard Content
        ================================================== -->
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3><?php _e("My Rating") ?></h3>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                        <li><?php _e("My Rating") ?></li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">
                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-feather-settings"></i> <?php _e("My Rating") ?></h3>
                        </div>
                        <div class="content with-padding">
                            <table id="datatable">
                                <thead>
                                    <tr>
                                        <th class="small-width"></th>
                                        <th><?php _e("Review") ?></th>

                                        <th><?php _e("Date") ?></th>

                                    </tr>
                                </thead>
                                <?php if ($total_item == "0") { ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="text-center"><?php _e("No result found.") ?></td>
                                        </tr>
                                    </tbody>
                                <?php
                                } else { ?>
                                    <tbody>
                                        <?php foreach ($ratings as $rating) { ?>
                                            <tr>
                                                <td></td>
                                                <td><?php _esc($rating['comments']) ?></td>
                                                <td><?php _esc($rating['created_at']) ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Row / End -->

            <?php include_once TEMPLATE_PATH . '/overall_footer_dashboard.php'; ?>