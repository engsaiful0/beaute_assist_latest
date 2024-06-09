<?php
define("ROOTPATH", dirname(dirname(dirname(__DIR__))));
define("APPPATH", ROOTPATH."/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_'.$config['lang'].'.php';
admin_session_start();
$pdo = ORM::get_db();

// initilize all variable
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;

//define index of column
$columns = array(
    0 =>'beautician_id',
    1 =>'user_id',
    2 =>'title',
    3 =>'description',
    4 =>'accept_status',
    5 =>'decline_status',
    6 =>'withdraw_status',
);

$where = $sqlTot = $sqlRec = "";

// check search value exist
if( !empty($params['search']['value']) ) {
    $where .=" WHERE ";
    $where .=" ( title LIKE '".$params['search']['value']."%' )";
}

// getting total number records without any search
$sql = "SELECT * FROM `".$config['db']['pre']."meeting_schedule` ";
$sqlTot .= $sql;
$sqlRec .= $sql;
//concatenate search sql if value exist
if(isset($where) && $where != '') {

    $sqlTot .= $where;
    $sqlRec .= $where;
}


$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

$queryTot = $pdo->query($sqlTot);
$totalRecords = $queryTot->rowCount();
$queryRecords = $pdo->query($sqlRec);

//iterate on results row and create new index array of data
foreach ($queryRecords as $row) {
    $beautician = ORM::for_table($config['db']['pre'].'user')
        ->where('id' , $row['beautician_id'])->findOne();

    $user = ORM::for_table($config['db']['pre'].'user')
        ->where('id' , $row['user_id'])->findOne();

    $beautician_data='<b>Beautician Name:</b> ' . $beautician['username'] . ' <b>Email:</b> ' . $beautician['email'] . ' <b>Hourly Rate:</b> ' . $beautician['hourly_rate'] ;
    $user_data='<b>User Name:</b> ' . $user['username'] . ' <b>Email:</b> ' . $user['email'] . ' <b>Hourly Rate:</b> ' . $user['hourly_rate'] ;
    //$data[] = $row;
    $id = $row['id'];
    $accept_status = $row['accept_status'];
    $withdraw_status = $row['withdraw_status'];
    $decline_status = $row['decline_status'];
    $title = $row['title'];
    $description = $row['description'];
    $start_datetime = date('d M, Y h:i:s a', strtotime($row['start_datetime']));

    $row0 = '<td>
                <label class="css-input css-checkbox css-checkbox-default">
                    <input type="checkbox" class="service-checker" value="'.$id.'" id="row_'.$id.'" name="row_'.$id.'"><span></span>
                </label>
            </td>';
    $row1 = '<td>'.$beautician_data.'</td>';
    $row2 = '<td>'.$user_data.'</td>';
    $row3 = '<td>'.$title.'</td>';
    $row4 = '<td>'. $description.'</td>';
    $row5 = '<td>'. $start_datetime.'</td>';
    $row6 = '<td style="background-color: #0ba212;color: white">'.$accept_status.'</td>';
    $row7 = '<td style="background-color: red;color: white">'. $decline_status.'</td>';
    $row8 = '<td style="background-color: rebeccapurple;color: white">'.$withdraw_status.'</td>';


//    $row9 = '<td class="text-center">
//                <div class="btn-group">
//                    <a href="#" data-url="panel/tax_edit.php?id='.$id.'" data-toggle="slidePanel" class="btn btn-xs btn-default"> <i class="ion-edit"></i> Edit</a>
//                    <a href="#" class="btn btn-xs btn-danger item-js-delete" data-ajax-action="deleteTaxes"> <i class="ion-close"></i></a>
//                </div>
//            </td>';

    $value = array(
        "DT_RowId" => $id,
        0 => $row0,
        1 => $row1,
        2 => $row2,
        3 => $row3,
        4 => $row4,
        5 => $row5,
        6 => $row6,
        7 => $row7,
        8 => $row8
    );
    $data[] = $value;
}

$json_data = array(
    "draw"            => intval( $params['draw'] ),
    "recordsTotal"    => intval( $totalRecords ),
    "recordsFiltered" => intval($totalRecords),
    "data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format