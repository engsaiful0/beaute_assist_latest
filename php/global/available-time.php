<?php
if (!isset($_GET['page']))
    $_GET['page'] = 1;

$limit = 4;

if (checkloggedin()) {
    $ratings = array();
    $count = 0;

    $rows = ORM::for_table($config['db']['pre'] . 'reviews')
        ->where('user_id', $_SESSION['user']['id'])
        ->order_by_desc('id')
        ->find_many();
    $resultMeetingSchedule = ORM::for_table($config['db']['pre'] . 'meeting_schedule')
        ->where('beautician_id', $_SESSION['user']['id'])->where('start_date', date('Y-m-d'))->find_many();
    $scheduleTimeInHoure = array();
    $scheduleTimeInMinute = array();
    // print_r($_SESSION['user']['id']);
    // print_r($_SESSION['user']['id']);
    // print_r($resultMeetingSchedule);
    // die;
    foreach ($resultMeetingSchedule as $row) {
        array_push($scheduleTimeInHoure, $row['start_time_hour']);
        array_push($scheduleTimeInMinute, $row['start_time_minute']);
    }


    $total_item = count($rows);
    foreach ($rows as $row) {
        $ratings[$count]['id'] = $row['id'];
        $ratings[$count]['user_id'] = $row['user_id'];
        $ratings[$count]['comments'] = $row['comments'];
        $ratings[$count]['created_at'] = date('d M Y h:i A', $row['created_at']);
        $count++;
    }

    //Print Template
    HtmlTemplate::display('global/available-time', array(
        'ratings' => $ratings,
        'pages' => pagenav($total_item, $_GET['page'], 20, $link['ratings'], 0),
        'total_item' => $total_item,
        'scheduleTimeInHoure' => $scheduleTimeInHoure,
        'scheduleTimeInMinute' => $scheduleTimeInMinute,
    ));
    exit;
} else {
    error(__("Page Not Found"), __LINE__, __FILE__, 1);
    exit();
}
