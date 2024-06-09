<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH . "/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_' . $config['lang'] . '.php';

sec_session_start();
global $config;

$num_rows = ORM::for_table($config['db']['pre'] . 'meeting_schedule')
    ->where(array(
        'user_id' => $_POST['beautician_id'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'start_datetime' => $_POST['start_datetime'],
    ))
    ->count(); //It is for beautician to avoid duplicate shcedule at the same time.

if ($num_rows == 0) {
    $insert_meeting_schedule = ORM::for_table($config['db']['pre'] . 'meeting_schedule')->create();
    $insert_meeting_schedule->user_id = $_POST['user_id'];
    $insert_meeting_schedule->beautician_id = $_POST['beautician_id'];
    $insert_meeting_schedule->title = $_POST['title'];
    $insert_meeting_schedule->description = $_POST['description'];
    $insert_meeting_schedule->start_datetime = $_POST['start_datetime'];
    // $insert_meeting_schedule->end_datetime = $_POST['end_datetime'];
    $timeSplite = explode("T", $_POST['start_datetime']);
    $timeSpliteHourMinute = explode(":", $timeSplite[1]);
    $insert_meeting_schedule->start_date = $timeSplite[0];
    $insert_meeting_schedule->start_time_hour = $timeSpliteHourMinute[0];
    $insert_meeting_schedule->start_time_minute = $timeSpliteHourMinute[1];
    $result = $insert_meeting_schedule->save();
    print_r($timeSplite);
  

    if ($insert_meeting_schedule->id())
        echo 1;
    else
        echo 0;
}
die();
