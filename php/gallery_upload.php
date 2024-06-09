<?php

//upload.php
define("ROOTPATH", dirname(__DIR__));
define("APPPATH", ROOTPATH . "/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_' . $config['lang'] . '.php';

sec_session_start();
global $config;
$folder_name = '../includes/assets/upload/';

if (!empty($_FILES)) {
    $temp_file = $_FILES['file']['tmp_name'];

    // Get the original file name
    $original_filename = $_FILES['file']['name'];

    // Generate a timestamp for renaming the file
    $timestamp = time();

    // Create a new file name with the timestamp
    $new_filename = $timestamp . '_' . $original_filename;

    // Specify the folder location where the file will be moved
    $location = $folder_name . $new_filename;

    // Move the uploaded file to the new location with the new filename
    move_uploaded_file($temp_file, $location);

    // Create a new gallery entry and set the values
    $gallery = ORM::for_table($config['db']['pre'] . 'gallery')->create();
    $gallery->beautician_id = $_SESSION['user']['id'];
    $gallery->image = $new_filename; // Save the new filename with timestamp
    $result = $gallery->save();
}

if (isset($_POST["name"])) {
    $filename = $folder_name . $_POST["name"];
    unlink($filename);
}

$rows = ORM::for_table($config['db']['pre'] . 'gallery')
    ->where('beautician_id', $_SESSION['user']['id'])
    ->order_by_desc('id')
    ->find_many();


$result = array();



foreach ($rows as $file) {
?>
    <div class="col-md-2" style="margin-bottom: 20px;">
        <img src="<?php _esc($config['site_url']) ?>includes/assets/upload/<?php echo $file['image'] ?>" class="img-thumbnail" width="175" height="175" style="height:175px;" />
        <button style="margin-top: 5px;" type="button" class="btn btn-success remove_image" id="<?php echo $file['id'] ?>">Remove</button>
    </div>
<?php
}

