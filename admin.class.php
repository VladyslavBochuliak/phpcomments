<?php
require_once 'db.class.php';

class admin
{

    public function show_comment()
    {
        $connection = new db();
        $sql = "SELECT * FROM comments";
        $res = mysqli_query($connection->connect(), $sql);
        $html = '';

        while ( $r = mysqli_fetch_assoc($res)) {
            $html .= '<tr>
                <td>'.$r['id'].'</td>
                <td>'.$r['name'].'</td>
                <td>'.$r['subject'].'</td>
                <td>'.$r['file'].'</td>
                <td>'.$r['submittime'].'</td>
                <td>';
            if(isset($r['status']) & !empty($r['status'])){ $html .= $r['status'];}else{$html .= "NA";}
            $html .='</td> 
                <td>
                    <a href="/editcomment.php?id='.$r['id'].'">Edit</a>
                    <a href="/delcomment.php?id='.$r['id'].'">Del</a>
                </td>
            </tr>';
         }

         return $html;
    }
}