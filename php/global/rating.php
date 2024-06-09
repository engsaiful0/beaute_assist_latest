<?php
if(!isset($_GET['page']))
    $_GET['page'] = 1;

$limit = 4;

if(checkloggedin()) {
    $ratings = array();
    $count = 0;

    $rows = ORM::for_table($config['db']['pre'].'reviews')
        ->where('user_id',$_SESSION['user']['id'])
        ->order_by_desc('id')
        ->find_many();
    $total_item = count($rows);
    foreach ($rows as $row)
    {
        $ratings[$count]['id'] = $row['id'];
        $ratings[$count]['user_id'] = $row['user_id'];
        $ratings[$count]['comments'] = $row['comments'];
        $ratings[$count]['created_at'] = date('d M Y h:i A', $row['created_at']);
        $count++;
    }

    //Print Template
    HtmlTemplate::display('global/rating', array(
        'ratings' => $ratings,
        'pages' => pagenav($total_item,$_GET['page'],20,$link['ratings'] ,0),
        'total_item' => $total_item
    ));
    exit;
}
else{
    error(__("Page Not Found"), __LINE__, __FILE__, 1);
    exit();
}
?>
