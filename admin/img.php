<?php
$file = "height: 213px; width: 327px; background: #fff; border: 0px solid #FF99FF; border-radius: 1px; float: left; position: relative; padding: 6px 6px 6px 20px; margin: 0px 0px 0px 50px; background-image: url('img/like-50.jpg?g'); background-repeat: no-repeat; background-position: 0px 0px;";
preg_match('/like-(.*?).jpg/', $file, $match);
echo $match[1];
//var_dump();
