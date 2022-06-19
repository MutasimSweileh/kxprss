<?php
include "inc.php";
if(!$core->isv("export"))
include "inc/header.php";
$app = $core->isv("app");
 //die(md5("admin"));
if($app  == "logout"){
$core->Sion("admin_name","false");
$core->Sion("admin_id","false");
 header("Location: ?app=login");
}else if($core->Sion("admin_name") && $app != "login" || !$core->Sion("admin_name") && $app == "login"){
/*if($getLogin["username"] != "mohtasm")
die();*/
 if(!$app){
  include "inc/home.php";
 }else
 include "inc/".$app.".php";
}else if($core->Sion("admin_name") && $app == "login")
    header("Location: ?app=home");
else
   header("Location: ?app=login");
 include "inc/footer.php";
