<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH . "/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_' . $config['lang'] . '.php';

sec_session_start();
global $config;

$insert_subscriber = ORM::for_table($config['db']['pre'] . 'subscribers')->create();
$insert_subscriber->email = $_POST['email'];
$result = $insert_subscriber->save();
//echo $result;
//die('hi');
subscriber_email($_POST['email']);
if ($insert_subscriber->id())
    echo 1;
else
    echo 0;
die();
