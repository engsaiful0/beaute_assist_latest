<?php
define("ROOTPATH", dirname(dirname(dirname(__DIR__))));
define("APPPATH", ROOTPATH . "/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_' . $config['lang'] . '.php';
admin_session_start();
$pdo = ORM::get_db();

// initilize all variable
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;

//define index of column
$columns = array(
    0 => 'code',
    1 => 'type',
    2 => 'amount',
    3 => 'expire_date',
);

$where = $sqlTot = $sqlRec = "";

// check search value exist
if (!empty($params['search']['value'])) {
    $where .= " WHERE ";
    $where .= " ( code LIKE '" . $params['search']['value'] . "%' )";
}

// getting total number records without any search
$sql = "SELECT * FROM `" . $config['db']['pre'] . "promo_codes` ";
$sqlTot .= $sql;
$sqlRec .= $sql;
//concatenate search sql if value exist
if (isset($where) && $where != '') {

    $sqlTot .= $where;
    $sqlRec .= $where;
}


$sqlRec .=  " ORDER BY " . $columns[$params['order'][0]['column']] . "   " . $params['order'][0]['dir'] . "  LIMIT " . $params['start'] . " ," . $params['length'] . " ";

$queryTot = $pdo->query($sqlTot);
$totalRecords = $queryTot->rowCount();
$queryRecords = $pdo->query($sqlRec);

//iterate on results row and create new index array of data
foreach ($queryRecords as $row) {

    $id = $row['id'];
    $code = $row['code'];
    $type = $row['type'];
    $amount='';
    if($type=='Fixed')
    {
        $amount = $row['amount'];
    }else{
        $amount = $row['amount'].' %';
    }
   
    $expire_date = date('d M, Y', strtotime($row['expire_date']));

    $row0 = '<td>
                <label class="css-input css-checkbox css-checkbox-default">
                    <input type="checkbox" class="service-checker" value="' . $id . '" id="row_' . $id . '" name="row_' . $id . '"><span></span>
                </label>
            </td>';
    $row1 = '<td>' . $code . '</td>';
    $row2 = '<td>' . $type . '</td>';
    $row3 = '<td>' . $amount . '</td>';
    $row4 = '<td>' . $expire_date . '</td>';
    $row5 = '<td class="text-center">
                <div class="btn-group">
                    <a href="#" data-url="panel/promo_code_edit.php?id=' . $id . '" data-toggle="slidePanel" class="btn btn-xs btn-default"> <i class="ion-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xs btn-danger item-js-delete" data-ajax-action="deletePromoCodes"> <i class="ion-close"></i></a>
                </div>
            </td>';


    $value = array(
        "DT_RowId" => $id,
        0 => $row0,
        1 => $row1,
        2 => $row2,
        3 => $row3,
        4 => $row4,
        5 => $row5
    );
    $data[] = $value;
}

$json_data = array(
    "draw"            => intval($params['draw']),
    "recordsTotal"    => intval($totalRecords),
    "recordsFiltered" => intval($totalRecords),
    "data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format