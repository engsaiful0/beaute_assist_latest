<?php
global $config,$link;
if (!checkloggedin()) {
    headerRedirect($link['LOGIN']."?ref=post-service");
    exit();
}

if (checkloggedin()) {
    if($_SESSION['user']['user_type'] == 'user'){
        message(__("Notify"),__("Only beautician can post services."));
        exit();
    }

    if(!$config['non_active_allow']){
        $user_data = get_user_data(null,$_SESSION['user']['id']);
        if($user_data['status'] == 0){
            message(__("Notify"),__("Your email address is not verified. Please verify your email address first."));
            exit();
        }
    }
}


HtmlTemplate::display('service_post', array(
    'category' => get_maincategory('service'),
    'language_direction' => get_current_lang_direction(),
    'custom_fields' => get_customFields_by_catid('gig')
));
exit;
?>
