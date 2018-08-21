<?
require_once '../db.class.php';

function add_comment($array,$file = ''){
    $connect = new db();
    $name = $array['name'];
    $email = $array['email'];
    $subject = $array['subject'];
    $status = $array['status'];
    $date = date('c');
    $id = $array['id'];

    print_r($file);

    if ($file == ''){
        $sql = "UPDATE comments SET name='$name', email='$email', subject='$subject',submittime='$date', status='$status' WHERE id=$id";
    }else{
        $sql = "UPDATE comments SET name='$name', email='$email', file='$file', subject='$subject',submittime='$date', status='$status' WHERE id=$id";
    }

    $ires = mysqli_query($connect->connect(), $sql) or die(mysqli_error($connect->connect()));

    if ($sql) {
        echo 'Good';
    } else {
        echo "Failed to Submit Your Comment";
    }
}

if(isset($_POST) & !empty($_POST)) {
    if ($_FILES['fileToUpload']['error'] == 0){
        if ($_FILES['fileToUpload']['type'] == 'image/jpg' || $_FILES['fileToUpload']['type'] == 'image/png') {

            if (0 < $_FILES['fileToUpload']['error']) {
                echo 'Error: ' . $_FILES['fileToUpload']['error'] . '<br>';
            } else {
                $temp = explode(".", $_FILES["fileToUpload"]["name"]);
                $newfilename= date('d_m_Y-H_i_s').'.'.str_replace("image/", "/.", basename($_FILES["fileToUpload"]["type"]));
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../uploads/" . $newfilename);
            }
            add_comment($_POST,$newfilename);
        }else{
            echo "Incorrect file type - chose PNG or JPG";
        }
    }else{
        add_comment($_POST);
    }
}
