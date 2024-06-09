<?php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH . "/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_' . $config['lang'] . '.php';

sec_session_start();
global $config;

$promo_code = ORM::for_table($config['db']['pre'] . 'promo_codes')
    ->where('code', $_POST['promo_code'])
    ->find_one();
$total_cost = $_POST['total_cost'];
$discount_amount=0;

if ($promo_code) {
    $type = $promo_code['type'];
    if ($type == 'Fixed') {
        $total_cost = $total_cost - $promo_code['amount'];
        $discount_amount= $promo_code['amount'];
    } else if ($type == 'Percentage') {
        $total_cost = $total_cost - (($total_cost / 100) * $promo_code['amount']);
        $discount_amount= ($total_cost / 100) * $promo_code['amount'];
    }
    echo $total_cost.'_'.$discount_amount;
} else {
    echo $total_cost.'_'.$discount_amount;
}
die();
