<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH."/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_'.$config['lang'].'.php';

sec_session_start();
global $config;
$beautician_id=$_SESSION['beautician_id'];
$schedules = ORM::for_table($config['db']['pre'] . 'meeting_schedule')
    ->select_many('id', 'user_id', 'title', 'description', 'start_datetime','end_datetime')
    ->where('beautician_id', $beautician_id)
    ->find_many();
$sched_res = [];
//echo '<pre>';
//print_r($beautician_id);
//die;
foreach ($schedules as $row) {
//    echo '<pre>';
//print_r($row['description']);
//die;
    $data['title'] =$row['title'];
    $data['id'] =$row['id'];
    $data['description'] =$row['description'];
    $data['start_datetime'] =$row['start_datetime'];
    $data['end_datetime'] =$row['end_datetime'];
    $data['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $data['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $data;
}
//echo '<pre>';
//print_r($sched_res);
echo json_encode($sched_res);