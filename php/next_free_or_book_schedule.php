<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH . "/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_' . $config['lang'] . '.php';
sec_session_start();
global $config;
$con = db_connect($config);
$nextDate = $_POST['nextDate'];

$resultMeetingSchedule = ORM::for_table($config['db']['pre'] . 'meeting_schedule')
    ->where('beautician_id', $_SESSION['user']['id'])->where('start_date', $nextDate)->find_many();
$scheduleTimeInHoure = array();
$scheduleTimeInMinute = array();

foreach ($resultMeetingSchedule as $row) {
    array_push($scheduleTimeInHoure, $row['start_time_hour']);
    array_push($scheduleTimeInMinute, $row['start_time_minute']);
}

?>
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

    // echo '<pre>';
    // print_r($scheduleTimeInHoure);
    //die;
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
    $startTime = strtotime('1');
    $endTime = strtotime('24');
    $interval = 60 * 60; // 1 hour in seconds

    echo '<table>';
    echo '<tr><th>Time[13:00-24:00]</th><th>Status</th></tr>';

    // echo '<pre>';
    // print_r($scheduleTimeInHoure);
    //die;
    for ($time = 13; $time <= 24; $time += 1) {
        $currentTime = date('h:i A', $time);
        $status = in_array($time, $scheduleTimeInHoure) ? 'Booked' : 'Free';
        $cssClass = in_array($time, $scheduleTimeInHoure) ? 'booked' : 'free';

        echo '<tr class="' . $cssClass . '"><td>' . $time . '</td><td>' . $status . '</td></tr>';
    }

    echo '</table>';
    ?>
</div>