<?php
overall_header(__("Meeting Schedule"));
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
        <h3>Meeting Schedule</h3>
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="dark">
            <ul>
                <li><a href="<?php url("INDEX") ?>"><?php _e("Home") ?></a></li>
                <li><?php _e("Meeting Schedule") ?></li>
            </ul>
        </nav>
    </div>
    <!-- Row -->
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="listings-container margin-top-35">
                <table id="js-table-list" class="basic-table dashboard-box-list">
                    <tr>
                        <th>#</th>
                        <th>Beautician</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Meeting Date</th>
                        <th>Withdraw</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $serial = 1;

                    foreach ($items as $item) {

                        ?>
                        <tr>
                            <td><?php echo $serial++ ?></td>
                            <td><?php _esc('<b>Name:</b> ' . $item['username'] . ' <b>Email:</b> ' . $item['email'] . ' <b>Hourly Rate:</b> ' . $item['hourly_rate']) ?></td>
                            <td><?php _esc($item['title']) ?></td>
                            <td><?php _esc($item['description']) ?></td>
                            <td><?php _esc($item['start_datetime']) ?></td>
                            <td>
                                <?php if ($item['withdraw_status'] == '') {
                                    ?>
                                    <form id="meeting_withdraw_form" method="post">
                                        <input name="id" value="<?php echo $item['id'] ?>" type="hidden">
                                        <button type="button" onclick="meeting_withdraw_save()" href=""
                                                class="button ripple-effect">Withdraw
                                        </button>
                                    </form>
                                    <?php
                                } else if ($item['withdraw_status'] == 'Withdrawn') {
                                    ?>
                                    <div class="" style="background-color:#7D5C39;color: white">
                                        <p style="text-align: center"><?php echo $item['withdraw_status'] ?></p>
                                    </div>
                                    <?php
                                }

                                ?>

                            </td>
                            <td>
                                <?php if ($item['accept_status'] == '' && $item['decline_status'] == '') {
                                    ?>
                                    <div class="" style="background-color:#7D5C39;color: white">
                                        <p style="text-align: center">Pending</p>
                                    </div>
                                    <?php
                                } else if ($item['accept_status'] == '' && $item['decline_status'] != '') {
                                    ?>
                                    <div class="" style="background-color:#7D5C39;color: white">
                                        <p style="text-align: center"><?php echo $item['decline_status'] ?></p>
                                    </div>
                                    <?php
                                } else if ($item['accept_status'] != '' && $item['decline_status'] == '') {
                                    ?>
                                    <div class="" style="background-color:#7D5C39;color: white">
                                        <p style="text-align: center"><?php echo $item['accept_status'] ?></p>
                                    </div>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>

                    <?php } ?>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <script>
        function meeting_withdraw_save() {
            $("#loaderIcon").show();
            if (confirm('Are you sure to withdraw the meeting?')) {
                var data = $('#meeting_withdraw_form').serialize();
                jQuery.ajax({
                    url: "<?php _esc($config['app_url'])?>meeting_schedule_withdraw_datasave.php",
                    data: data,
                    type: "POST",
                    success: function (data) {
                        if (data != 0) {
                            Snackbar.show({text: 'Meeting has been withdrawn successfully.'});
                            location.reload();
                        } else {
                            Snackbar.show({text: LANG_ERROR_TRY_AGAIN});
                        }
                        $("#loaderIcon").hide();
                    },
                    error: function () {
                    }
                });
            }

        }
    </script>
    <!-- Row / End -->
<?php include_once TEMPLATE_PATH . '/overall_footer_dashboard.php'; ?>