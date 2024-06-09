<?php
overall_header(__("Account Setting"));
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    .booked {
        background-color: #ffcccc;
    }

    .free {
        background-color: #ccffcc;
    }
</style>
<!-- Dashboard Container -->
<div class="dashboard-container">

    <?php include_once TEMPLATE_PATH . '/dashboard_sidebar.php'; ?>

    <!-- Dashboard Content
        ================================================== -->
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">
            <!-- Row -->
            <div class="row">
                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">
                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-assignment"></i> <?php _e("Current Schedule") ?></h3>
                        </div>
                        <div class="content with-padding">
                            <table id="js-table-list" class="basic-table dashboard-box-list">
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Meeting Date</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                $serial = 1;

                                foreach ($items as $item) { ?>
                                    <tr>
                                        <td><?php echo $serial++ ?></td>
                                        <td><?php _esc('<b>Name:</b> ' . $item['name'] . ' <b>Email:</b> ' . $item['email']) ?></td>
                                        <td><?php _esc($item['title']) ?></td>
                                        <td><?php _esc($item['description']) ?></td>
                                        <td><?php _esc($item['start_datetime']) ?></td>
                                        <td>
                                            <?php echo $item['status'] ?>
                                           
                                        </td>
                                    </tr>

                                <?php } ?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Row / End -->

            <?php include_once TEMPLATE_PATH . '/overall_footer_dashboard.php'; ?>