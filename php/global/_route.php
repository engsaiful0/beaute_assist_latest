<?php
$app_dir = basename(dirname(__FILE__)).'/';

$router->map('GET|POST','/signup/?', $app_dir.'signup.php');
$router->map('GET|POST','/index1/?', $app_dir.'index1.php');
$router->map('GET|POST','/index2/?', $app_dir.'index2.php');
$router->map('GET|POST','/login/?', $app_dir.'login.php');
$router->map('GET|POST','/logout/?', $app_dir.'logout.php');
$router->map('GET|POST','/message/?', $app_dir.'message.php');
$router->map('GET|POST','/forgot/?', $app_dir.'forgot.php');
$router->map('GET|POST','/transaction/?', $app_dir.'transaction.php');
$router->map('GET|POST','/account-setting/?', $app_dir.'account-setting.php');
$router->map('GET|POST','/available-time/?', $app_dir.'available-time.php');

$router->map('GET|POST','/current-schedule/?', $app_dir.'current-schedule.php');
$router->map('GET|POST','/pending-schedule/?', $app_dir.'pending-schedule.php');

$router->map('GET|POST','/completed-schedule/?', $app_dir.'completed-schedule.php');
$router->map('GET|POST','/gallery/?', $app_dir.'gallery.php');


$router->map('GET|POST','/rating/?', $app_dir.'rating.php');
$router->map('GET|POST','/billing/?', $app_dir.'billing.php');
$router->map('GET|POST','/report/?', $app_dir.'report.php');
$router->map('GET|POST','/contact/?', $app_dir.'contact.php');
$router->map('GET|POST','/sitemap/?', $app_dir.'sitemap.php');
$router->map('GET|POST','/countries/?', $app_dir.'countries.php');
$router->map('GET|POST','/faq/?', $app_dir.'faq.php');
$router->map('GET|POST','/feedback/?', $app_dir.'feedback.php');
$router->map('GET|POST','/advertise-here/?', $app_dir.'advertise.php');
$router->map('GET|POST','/test/?', $app_dir.'test.php');
$router->map('GET|POST','/page/[*:id]?/?', $app_dir.'html.php');
$router->map('GET|POST','/membership/[a:change_plan]?/?', $app_dir.'membership.php');
$router->map('GET|POST','/ipn/[a:i]?/[*:id]?/?', $app_dir.'ipn.php');
$router->map('GET|POST','/payment/[*:access_token]?/[a:status]?/[*:message]?/?', $app_dir.'payment.php');
$router->map('GET|POST','/testimonials/?', $app_dir.'testimonials.php');
$router->map('GET|POST','/blog/?', $app_dir.'blog.php');
$router->map('GET|POST','/blog/category/[*:keyword]/?', $app_dir.'blog-category.php');
$router->map('GET|POST','/blog/author/[*:keyword]/?', $app_dir.'blog-author.php');
$router->map('GET|POST','/blog/[i:id]?/[*:slug]?/?', $app_dir.'blog-single.php');
$router->map('GET|POST','/invoice/[i:id]?/?', $app_dir.'invoice.php');
$router->map('GET','/sitemap.xml/?', $app_dir.'xml.php');
