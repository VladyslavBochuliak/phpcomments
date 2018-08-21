<?
require_once '../db.class.php';

function add_comment($array,$file = ''){
    $connect = new db();
    $name = $array['name'];
    $email = $array['email'];
    $subject = $array['subject'];
    $date = date('c');

    $isql = "INSERT INTO comments (name, email,file, subject,submittime, status) VALUES ('$name', '$email','$file', '$subject','$date', 'draft')";
    $ires = mysqli_query($connect->connect(), $isql) or die(mysqli_error($connect->connect()));
    if ($ires) {
        echo '<div class="panel panel-default arrow left">
                <div class="panel-body">
                    <header class="text-left">
                        <div class="comment-user"><i class="fa fa-user"></i>' . $name . '</div>
                        <time class="comment-date" datetime="' . $date . '"><i class="fa fa-clock-o"></i>' . $date . '</time>
                    </header>
                    <div class="comment-post">
                        <p>' . $subject . '</p>
                    </div>
                </div>
            </div>';
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
