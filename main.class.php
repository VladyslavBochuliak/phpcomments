<?php
require_once 'db.class.php';

class main
{

    public function show_comment()
    {
            $connection = new db();
            $sql = "SELECT * FROM comments";
            $res = mysqli_query($connection->connect(), $sql);
            $html = '';

            while ( $r = mysqli_fetch_assoc($res)) {
                $html .= '<div class="panel panel-default arrow left">
                        <div class="panel-body">
                            <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user"></i>'. $r['name'].' </div>
                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> '. $r['submittime'].' </time>
                            </header>
                            <div class="comment-post">
                                <p>'.$r['subject'].'</p>
                            </div>
                                
                        </div>
                    </div>';
            }
            return $html;

    }
}