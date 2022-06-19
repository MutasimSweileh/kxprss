<?php
@ob_start();
@session_start();
include_once("../classes/core.php");
$core = new core;
require("../class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.sherktk.net";
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Username = "mail@sherktk.net";
$mail->Password = "JCrS%^)qc!eH";
$mail->From = "mail@sherktk.net";
$getLogin = $core->getlogin(array("table" => "users", "id" => $core->Sion("admin_id")))[0];
$glev = ($getLogin["lev"] == 1);
$_lev = ($getLogin["lev"]);
//$glev = "mohtasm";
//echo $core->Sion("admin_name");
