<?php

if(checkloggedin())
{

    update_lastactive();
    $result = '';
    $ses_userdata = get_user_data($_SESSION['user']['username']);

    $result = ORM::for_table($config['db']['pre'].'meeting_schedule')
        ->where('user_id' , $_SESSION['user']['id'])->order_by_desc('id')->find_many();
   // die($_SESSION['user']['id']);


    $items = array();
    if ($result) {
        foreach ($result as $info)
        {
            $beautician = ORM::for_table($config['db']['pre'].'user')
                ->where('id' , $info['beautician_id'])->findOne();
            $items[$info['id']]['id'] = $info['id'];
            $items[$info['id']]['beautician_id'] = $info['beautician_id'];
            $items[$info['id']]['user_id'] = $info['user_id'];
            $items[$info['id']]['email'] = $beautician['email'];
            $items[$info['id']]['hourly_rate'] = $beautician['hourly_rate'];
            $items[$info['id']]['username'] = $beautician['username'];
            $items[$info['id']]['accept_status'] = $info['accept_status'];
            $items[$info['id']]['withdraw_status'] = $info['withdraw_status'];
            $items[$info['id']]['decline_status'] = $info['decline_status'];
            $items[$info['id']]['title'] = $info['title'];
            $items[$info['id']]['description'] = $info['description'];
            $items[$info['id']]['start_datetime'] = date('d M, Y h:i:s a', strtotime($info['start_datetime']));

        }
    }

       //Print Template
    HtmlTemplate::display('meeting_schedule_user', array(
        'items' => $items,
        'totalitem' => count($result)
    ));
    exit;
}else{
    headerRedirect($link['LOGIN']);
}