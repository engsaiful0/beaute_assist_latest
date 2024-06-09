<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH."/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_'.$config['lang'].'.php';
sec_session_start();
global $config;
$con = db_connect($config);
$id=$_POST['id'];
$query = "UPDATE `" . $config['db']['pre'] . "meeting_schedule` SET `accept_status` = 'Accepted',`status` = 'Completed' WHERE id = '".$id."'";
echo $query;
$result=$con->query($query);


    if ($result)
        echo 1;
    else
        echo 0;

?>