<?php
@ob_start();
@session_start();
include "inc.php";
$action =  $core->isv("action");
$id =  $core->isv("id");
$multi =  $core->isv("multiple");
$mydata = $core->isv("mydata");
$option = $core->isv("option");
$select = $core->isv("select");
$get = $core->isv("get");
if ($action == "upload" && !$get) {
  $temp = current($_FILES);
  $fileCount = count($temp["tmp_name"]);
  $ismulti = is_array($temp["tmp_name"]);
  if (!$ismulti) {
    $fileCount = 1;
  }
  $ar = array();
  for ($i = 0; $i < $fileCount; $i++) {
    $file_name = $temp['name'];
    $file_tmp = $temp['tmp_name'];
    if ($ismulti) {
      $file_name = $temp['name'][$i];
      $file_tmp = $temp['tmp_name'][$i];
    }
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION);
    //$file_name = time().".jpg";
    if (move_uploaded_file($file_tmp, "../images/" . $file_name)) {
      if (in_array(strtolower($file_type), ['jpeg', 'jpg', 'png', 'gif'])) {
        $core->compress("../images/" . $file_name, "../images/" . $file_name, 70);
      }
      $ar[] =  $file_name;
      if ($multi) {
        $core->SqlIn("product_images", array("image" => $file_name, "product_id" => $multi, "active" => 1));
      }
      //echo json_encode(array("st"=>"ok","file"=>$file_name,'location' =>"".$file_name,"msg"=>"تم رفع الملف بنجاح"));
    } else
      $error = 'حدث خطأ اثناء رفع الملف';  //echo json_encode(array("st"=>"error","msg"=>'حدث خطأ اثناء رفع الملف'));*/
  }
  if (!$error)
    echo json_encode(array("st" => "ok", "file" => $file_name, "ar" => $ar, "temp" => $temp, 'location' => "" . $file_name, "msg" => "تم رفع الملف بنجاح"));
  else
    echo json_encode(array("st" => "error", "msg" => 'حدث خطأ اثناء رفع الملف'));
} else if ($action == "login" && !$get) {
  $username = $core->isv("username");
  $email = $core->isv("email");
  $code = $core->isv("code");
  $password = $core->isv("password");
  if ($email)
    $login = $core->getlogin(array("table" => "users", "email" => $email));
  elseif ($code)
    $login = $core->getlogin(array("table" => "users", "code" => $code));
  else if ($username && $password)
    $login = $core->getlogin(array("table" => "users", "username" => $username, "password" => $password));
  if ($login) {
    if (!$email) {
      if ($code)
        $core->UpDate("users", "password", $password, "where code='" . $code . "'");
      $core->Sion("admin_name", $login[0]["name"]);
      $core->Sion("admin_id", $login[0]["id"]);
      echo json_encode(array("st" => "ok", "msg" => "تم تسجيل الدخول بنجاح"));
      //echo json_encode(array("st"=>"error","msg"=>$core->DQuery));
    } else {
      $mail->AddAddress($email);
      $rand = md5($email) . rand(3333, 9999);
      $mail->IsHTML(true);
      $mail->Subject = "استعادة كلمة المرور الخاصه بك";
      $mail->Body = "<p style='text-align: right;direction: rtl;'>كود استعادة كلمة المور  هو  : <strong>" . $rand . "</strong></p><br><p style='text-align: right;direction: rtl;'> قم بالرجوع الى الموقع مرة اخرى وادخل الكود</p>";
      if (!$mail->Send()) {
        echo json_encode(array("st" => "error", "msg2" => $core->DQuery, "msg" => "تعذر ارسال الكود من فضلك حاول مره اخرى"));
      } else
        $core->UpDate("users", "code", $rand, "where email='" . $email . "'");
      echo json_encode(array("st" => "ok", "red" => "&forgot=true", "msg" => "تم ارسال كود تعيين كلمة المرور على البريد"));
    }
    die();
  }
  echo json_encode(array("st" => "error", "msg2" => $core->DQuery, "msg" => "المعلومات المدخلة غير صحيحة"));
} else if ($action == "users" && !$get && !$core->isv("admin") && $core->isv("backuppassword")) {
  unset($_POST["mydata"]);
  $_POST["password"] = $_POST["backuppassword"];
  if ($mydata) {
    $id = $mydata;
    $core->UpDate("login", $_POST, "", "where id=" . $id);
  } else
    $id =  $core->SqlIn("login", $_POST);
  echo json_encode(array("st" => "ok", "id" => $id, "msg" => "تم الحفظ بنجاح"));
} else if ($action == "related") {
  $level = $core->isv("level");
  $myorder = $core->isv("myorder");
?>
  <?php $sar = array();
  for ($i = 0; $i < 6; $i++) {
    $data =  $core->getBlog(array("level" => $level));
    $isDone = false;
  ?>
    <div class="form-group col">
      <select class="form-control" name="related[]">
        <option value=""></option>
        <?php foreach ($data as $row) { ?>
          <option value="<?= $row["id"] ?>" <?php if (in_array($row["id"], explode(",", $myorder)) && !in_array($row["id"], $sar) && !$isDone) {
                                              $isDone = true;
                                              $sar[] = $row["id"];  ?> selected="selected" <?php } ?>><?= $row["name"] ?></option>
        <?php } ?>
      </select>
    </div>
  <?php  } ?>
<?php
} else if (!$get) {
  $coupon_code =   $core->isv("coupon_code");
  $admin =   $core->isv("admin");
  $email =   $core->isv("email");
  unset($_POST["mydata"]);
  unset($_POST["admin"]);
  if (isset($_POST["password"]) && $core->isv("password"))
    $_POST["backuppassword"] = $core->isv("password");
  if (isset($_POST["password"]) && !$core->isv("password"))
    unset($_POST["password"]);
  /*  if ($glev != "mohtasm") {
    echo json_encode(array("st" => "error", "msg" => 'عذرا حدث خطأ ما اثناء التعامل مع الجدول ' . $action . '<br>' . join("-", $_POST)));
    die();
  } */
  $isNull = true;
  foreach ($_POST as $k => $v) {
    if ($core->isv($k))
      $isNull = false;
    $_POST[$k] = str_replace('"', '\"', $_POST[$k]);
    if (is_array($_POST[$k]))
      $_POST[$k] = join(",", array_filter($_POST[$k]));
  }
  if ($action == "posts") {
    $_POST["date"] = strtotime($_POST["date"] . " " . date('h:i a', time()));
  }
  if (!$isNull)
    if ($mydata) {
      $id = $mydata;
      if ($coupon_code) {
        $sel = $core->Sel("users", "where coupon_code='" . $coupon_code . "'");
        if ($sel) {
          echo json_encode(array("st" => "error", "id" => $id, "msg" => "عذرا كود الترويج مسجل من قبل جرب ادخال كود اخر"));
          die();
        }
      }
      $core->UpDate($action, $_POST, "", "where id=" . $id);
      if ($coupon_code) {
        $Purl = $core->getPageUrl("affiliates", "", true);
        $mail->AddAddress($email);
        $mail->IsHTML(true);
        $title = $core->getEngines(array("page" => "info" . $plang))[0]["title"];
        $mail->Subject = "تفعيل حسابك فى موقع '" . $title . "' وكود الترويج";
        $mail->Body = "<p style='text-align: right;direction: rtl;'>كود الترويج الخاص بك هو   : <span>" . $coupon_code . "</span></p><br><p style='text-align: right;direction: rtl;'> وتم تفعيل حسابك يمكنك الان تسجيل الدخول  وتتبع ارباحك</p>";
        $mail->Body .= '<a href="' . $Purl . '">' . $Purl . '</a>';
        $mail->Send();
      }
    } else
      $id =  $core->SqlIn($action, $_POST);
  if ($isNull)
    echo json_encode(array("st" => "error", "id" => $id, "msg" => "الحقول مطلوبة "));
  else if ($id)
    echo json_encode(array("st" => "ok", "id" => $id, "msg" => "تم الحفظ بنجاح"));
  else
    echo json_encode(array("st" => "error", "msg2" => $core->DQuery, "msg" => "حدث خطأ ما <br>" . $core->DBgetError()));
}  ?>