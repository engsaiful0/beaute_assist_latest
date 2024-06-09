<?php
overall_header(__("Meeting Schedule"));
?>
    <!-- Dashboard Container -->
    <div class="dashboard-container">

<?php include_once TEMPLATE_PATH.'/dashboard_sidebar.php'; ?>


    <!-- Dashboard Content
    ================================================== -->
    <div class="dashboard-content-container" data-simplebar>
    <div class="dashboard-content-inner" >

    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3><?php _e("My Meeting Schedule") ?></h3>
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
                        <th>User</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Meeting Date</th>
                        <th>Accept</th>
                        <th>Decline</th>

                    </tr>
                    <?php
                    $serial=1;

                    foreach ($items as $item){ ?>
                        <tr>
                            <td><?php echo $serial++?></td>
                            <td><?php _esc('<b>Name:</b> '.$item['name'].' <b>Email:</b> '.$item['email'])?></td>
                            <td><?php _esc($item['title'])?></td>
                            <td><?php _esc($item['description'])?></td>
                            <td><?php _esc($item['start_datetime'])?></td>
                            <?php if ($item['withdraw_status'] == '') {
                                ?>
                                <td>
                                    <?php
                                    if($item['accept_status']==''&& $item['decline_status']=='')
                                    {
                                        ?>
                                        <form id="meeting_accept_form" method="post">
                                            <input name="id" value="<?php echo $item['id'] ?>" type="hidden">
                                            <button type="button" onclick="accept_status_save()" href="" class="button ripple-effect">Accept</button>
                                        </form>

                                        <?php
                                    }else{
                                        ?>
                                        <?php echo $item['accept_status'] ?>
                                        <?php
                                    }
                                    ?>

                                </td>
                                <td> <?php
                                    if($item['decline_status']=='' && $item['accept_status']=='')
                                    {
                                        ?>

                                        <form id="meeting_decline_form" method="post">
                                            <input name="id" value="<?php echo $item['id'] ?>" type="hidden">
                                            <button type="button" onclick="decline_status_save()" href="" class="button ripple-effect">Decline</button>
                                        </form>
                                        <?php
                                    }else{
                                        ?>
                                        <?php echo $item['decline_status'] ?>
                                        <?php
                                    }
                                    ?></td>
                                <?php
                            } else if ($item['withdraw_status'] == 'Withdrawn') {
                                ?>
                                <td colspan="2">
                                    <div class="" style="background-color:#7D5C39;color: white">
                                        <p style="text-align: center"><?php echo $item['withdraw_status'] ?></p>
                                    </div>
                                </td>
                                <?php
                            }

                            ?>

                        </tr>

                    <?php } ?>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <script>
        function accept_status_save() {
            $("#loaderIcon").show();
            if (confirm('Are you sure to accept the meeting?')) {
                var data = $('#meeting_accept_form').serialize();
                jQuery.ajax({
                    url: "<?php _esc($config['app_url'])?>meeting_schedule_beautician_accept_datasave.php",
                    data: data,
                    type: "POST",
                    success: function (data) {
                        if (data != 0) {
                            Snackbar.show({text: 'Meeting has been accepted successfully.'});
                            $("#title").val('');
                            $("#description").val('');
                            $("#start_datetime").val('');
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
        function decline_status_save() {
            $("#loaderIcon").show();
            if (confirm('Are you sure to decline the meeting?')) {
                var data = $('#meeting_accept_form').serialize();
                jQuery.ajax({
                    url: "<?php _esc($config['app_url'])?>meeting_schedule_beautician_decline_datasave.php",
                    data: data,
                    type: "POST",
                    success: function (data) {
                        if (data != 0) {
                            Snackbar.show({text: 'Meeting has been declined successfully.'});
                            $("#title").val('');
                            $("#description").val('');
                            $("#start_datetime").val('');
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
<?php include_once TEMPLATE_PATH.'/overall_footer_dashboard.php'; ?>