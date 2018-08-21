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

                switch ($r['status']) {
                    case 'draft':
                        $show_btn = '<a href="/status/publishcomment.php?id='.$r['id'].'">Publish</a>
                                     <a href="/status/rejectcomment.php?id='.$r['id'].'">Reject</a>
                                     <a href="/status/delcomment.php?id='.$r['id'].'">Del</a>';
                        break;
                    case 'rejected':
                        $show_btn = '<a href="/status/publishcomment.php?id='.$r['id'].'">Publish</a>
                                     <a href="/status/draftcomment.php?id='.$r['id'].'">Draft</a>
                                     <a href="/status/delcomment.php?id='.$r['id'].'">Del</a>';
                        break;
                    case 'published':
                        $show_btn = '<a href="/status/rejectcomment.php?id='.$r['id'].'">Reject</a>
                                     <a href="/status/draftcomment.php?id='.$r['id'].'">Draft</a>
                                     <a href="/status/delcomment.php?id='.$r['id'].'">Del</a>';
                        break;
                }

            $html .='</td> 
                <td>
                   '.$show_btn.'
                </td>
            </tr>';
         }

         return $html;
    }
}