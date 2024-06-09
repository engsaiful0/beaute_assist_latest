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
<link rel="stylesheet" href="<?php _esc($config['site_url']); ?>datepicker/css/jquery-ui.css">
<script src="<?php _esc($config['site_url']); ?>datepicker/js/jquery-3.6.4.min.js"></script>
<script src="<?php _esc($config['site_url']); ?>datepicker/js/jquery-ui.js"></script>

<!-- Dashboard Container -->
<div class="dashboard-container">
    <?php include_once TEMPLATE_PATH . '/dashboard_sidebar.php'; ?>

    <!-- Dashboard Content -->
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">
            <div class="dashboard-box margin-top-0">
                <div class="headline js-accordion-header">
                    <h3><i class="icon-material-outline-access-time"></i> <?php _e("Available Time") ?></h3>
                </div>
                <div class="content with-padding js-accordion-body">
                    <!-- Row -->
                    <div class="row">
                        <!-- Dashboard Box -->
                        <div class="col-xl-12">
                            <div class="dashboard-box margin-top-0">
                                <!-- Headline -->
                                <form id="nextFreeOrBookSchedule_form" method="post">
                                    <div class="container">
                                        <div class="row">

                                            <!-- Your input field -->

                                            <div class="col-xl-4" style="margin-right:20px">
                                                <input style="display: none;" name="nextDate" type="text" id="datepicker">
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="row" id="meeting_scedule_container">
                                                    <!-- Dashboard Box -->
                                                    <div class="col-xl-6">
                                                        <?php
                                                        // Simulated booked slots (you should fetch this from a database)
                                                        $bookedSlots = [
                                                            '01:00 AM', '02:00 AM', '03:00 AM', '04:00 AM', '05:00 AM', '06:00 AM',
                                                            '07:00 AM', '08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM'
                                                        ];

                                                        // Generate time slots for the day
                                                        $startTime = strtotime('1');
                                                        $endTime = strtotime('24');
                                                        $interval = 60 * 60; // 1 hour in seconds

                                                        echo '<table>';
                                                        echo '<tr><th>Time[1:00-12:00]</th><th>Status</th></tr>';

                                                        for ($time = 1; $time <= 12; $time += 1) {
                                                            $currentTime = date('h:i A', $time);
                                                            $status = in_array($time, $scheduleTimeInHoure) ? 'Booked' : 'Free';
                                                            $cssClass = in_array($time, $scheduleTimeInHoure) ? 'booked' : 'free';

                                                            echo '<tr class="' . $cssClass . '"><td>' . $time . '</td><td>' . $status . '</td></tr>';
                                                        }

                                                        echo '</table>';
                                                        ?>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <?php
                                                        // Simulated booked slots (you should fetch this from a database)
                                                        $bookedSlots = [
                                                            '01:00 AM', '02:00 AM', '03:00 AM', '04:00 AM', '05:00 AM', '06:00 AM',
                                                            '07:00 AM', '08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM'
                                                        ];

                                                        // Generate time slots for the day
                                                        $startTime = strtotime('13');
                                                        $endTime = strtotime('24');
                                                        $interval = 60 * 60; // 1 hour in seconds

                                                        echo '<table>';
                                                        echo '<tr><th>Time[13:00-24:00]</th><th>Status</th></tr>';

                                                        for ($time = 13; $time <= 24; $time += 1) {
                                                            $currentTime = date('h:i A', $time);
                                                            $status = in_array($time, $scheduleTimeInHoure) ? 'Booked' : 'Free';
                                                            $cssClass = in_array($time, $scheduleTimeInHoure) ? 'booked' : 'free';

                                                            echo '<tr class="' . $cssClass . '"><td>' . $time . '</td><td>' . $status . '</td></tr>';
                                                        }

                                                        echo '</table>';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once TEMPLATE_PATH . '/overall_footer_dashboard.php'; ?>
<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            onSelect: function(dateText, inst) {
                nextFreeOrBookSchedule(dateText);
                // Keep the datepicker open after selection
                setTimeout(function() {
                    $("#datepicker").datepicker("show");
                }, 0);
            },
            showOn: "both",
            buttonText: '',
            dateFormat: "yy-mm-dd",
            beforeShow: function(input, inst) {
                setTimeout(function() {
                    inst.dpDiv.addClass('show');
                }, 0);
            }
        });

        // Open the datepicker automatically
        $("#datepicker").datepicker("show");
    });

    function nextFreeOrBookSchedule(selectedDate) {
        $("#loaderIcon").show();
        var data = {
            nextDate: selectedDate,
            // Add other data if needed
        };

        $.ajax({
            url: "<?php _esc($config['app_url']) ?>next_free_or_book_schedule.php",
            data: data,
            type: "POST",
            success: function(data) {
                $("#meeting_scedule_container").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>