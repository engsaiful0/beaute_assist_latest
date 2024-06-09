<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH . "/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_' . $config['lang'] . '.php';

sec_session_start();
global $config;

$delete_result = ORM::for_table($config['db']['pre'] . 'gallery')
    ->where('id', $_POST['id'])
    ->delete_many();

if ($delete_result)
    echo 1;
else
    echo 0;
