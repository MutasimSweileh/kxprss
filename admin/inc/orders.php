<?php
$del = $core->isv("del");
$level = $core->isv("level");
$edit = $core->isv("edit");
$add = $core->isv("add");
$filter_date1 = $core->isv("from");
$filter_date2 = $core->isv("to");
$message = "";
$er = 1;
$status = $core->isv("status");
$myorder = array();
if ($del)
  $core->SqlDel("order", "where id=" . $del);
if (!$add && !$edit) {
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3 py-2 d-flex flex-row align-items-center justify-content-between">
      <?php if (!$level) {  ?>
        <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;">الطلبات</h6>
        <div class="d-sm-flex align-items-center justify-content-between ">
          <div class="form-groupd col2 d-flex">
            <form class="form-inline" name="filter" id="filter" method="post">
              <div class="form-group row ml-2">
                <label for="staticEmail" class="col-sm-2 col-form-label">من</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="from" value="<?= isv("from") ?>">
                </div>
              </div>
              <div class="form-group row ml-1">
                <label for="staticEmail" class="col-sm-2 col-form-label">الى</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="to" value="<?= isv("to") ?>">
                </div>
              </div>
              <button type="submit" class="btn btn-primary ml-3"><i class="fa fa-filter" aria-hidden="true"></i>
                تصفيه</button>
              <?php if (isv("from") || isv("to")) { ?>
                <a href="<?= $PUr ?>/admin/?app=<?= $app ?>" class="btn btn-danger ml-3"><i class="fa fa-times" aria-hidden="true"></i>
                  حذف</a> <?php } ?>
            </form>
            <div class="add-click text-nowrap ml-3">
              <a href="export.php?to=<?= isv("to") ?>&from=<?= isv("from") ?>" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                  <i class="far fa-file-excel"></i>
                </span>
                <span class="text">تحميل</span>
              </a>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;">الطلب رقم #<?= $level ?></h6> <?php } ?>
    </div>
    <?php
    $index = 1;
    if (!$level) {
      $data =  $core->getorder(array());
      if ($filter_date1 || $filter_date2) {
        // $filter_date1 = strtotime($filter_date1);
        /*  echo $filter_date1;
  echo "<br>".date("Y-m-d",time());*/
        if ($filter_date1) {
          $dateTimeObj = DateTime::createFromFormat("Y-m-d", $filter_date1);
          $filter_date1 =   $dateTimeObj->getTimestamp();
        }
        if ($filter_date2) {
          //$filter_date2 = strtotime($filter_date2);
          $dateTimeObj = DateTime::createFromFormat("Y-m-d", $filter_date2);
          $filter_date2 =   $dateTimeObj->getTimestamp();
        }
        //echo $filter_date1;
        foreach ($data as $v) {
          $follow_date = $v["date"];
          $dateTimeObj = DateTime::createFromFormat("Y-m-d", date("Y-m-d", $follow_date));
          $follow_date =   $dateTimeObj->getTimestamp();
          if ($filter_date1 && $follow_date >= $filter_date1 && !$filter_date2)
            $filter_clients[] = $v;
          else  if (!$filter_date1 && $filter_date2 &&  $follow_date <= $filter_date2)
            $filter_clients[] = $v;
          else if ($filter_date1 && $filter_date2 && $follow_date <= $filter_date2 && $follow_date >= $filter_date1)
            $filter_clients[] = $v;
        }
        $data = $filter_clients;
        if ($filter_date2 && $filter_date1 > $filter_date2) {
          $message = "عذرًا ، لا يمكن أن يكون تاريخ بدء الفلتر أكبر من تاريخ الانتهاء.";
          $data = [];
        } else {
          $message = "تم تطبيق الفلتر بنجاح من الفترة " . $_POST["from"] . ($filter_date2 ? "  لفترة " . $_POST["to"] : "") . " وعدد النتائج [" . (count($data)) . "].";
          $er = 0;
        }
      }
    }
    ?>
    <div class="card-body" style="    padding: 0;">
      <?php if ($message) { ?>
        <div style="    border-radius: 0;" class="alert alert-<?= ($er ? "danger" : "success") ?>" role="alert">
          <?= $message ?>
          <button type="button" style="float: left;" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> <?php } ?>
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <?php if ($level) { ?>
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>الصورة</th>
                <th>الاسم</th>
                <th>الكمية</th>
                <th>السعر</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $data  = $core->getData("order_products", "where order_id=" . $level);
              if ($data)
                for ($i = 0; $i < count($data); $i++) {
                  $d = $core->getBlog(array("id" => $data[$i]["product_id"]))[0];
                  $data[$i]["image"] = $d["image"];
                  $data[$i]["name"] = $d["name"];
              ?>
                <tr>
                  <td style="vertical-align: middle;"><?= $index++ ?></td>
                  <td style="vertical-align: middle;"><img style=" height:100px;  background: #36b9cc;
    border-radius: 50%;   width: 100px;" src="../images/<?= $data[$i]["image"] ? $data[$i]["image"] : "boss2.png" ?>" alt="" /></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["name"] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["quantity"] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["price"] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          <?php } else { ?>
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>البريد</th>
                <th>الموبيل</th>
                <!-- <th>العنوان</th>
                      <th>الدولة</th>
                      <th>المدينة</th>-->
                <th>المجموع</th>
                <th>تعليمات التسليم</th>
                <th>الكود الترويجى</th>
                <th>التاريخ</th>
                <th>الحالة</th>
                <th>الاجراء</th>
              </tr>
            </thead>
            <tbody>
              <?php
              for ($i = 0; $i < count($data); $i++) {
                //$login = $core->getspecialized(array("id"=>$data[$i]["specialized"]));
                $date = $core->getDateTime($data[$i]["date"], "arabic");
                $login = false;
                if ($data[$i]["level"])
                  $login = $core->getCat(array("id" => $data[$i]["level"]));
              ?>
                <tr>
                  <td style="vertical-align: middle;"><?= $index++ ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["name"] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["email"] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["mobile"] ?></td>
                  <!--                      <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["address"] ?></td>
                      <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["country"] ?></td>
                      <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["city"] ?></td>-->
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["total"] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["message"] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["coupon_code"] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $date[0] ?>, <?= $date[1] ?> <?= $date[2] ?></td>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["done"] ? "تم التسليم" : "لم يتم التسليم" ?></td>
                  <td class="center" style=" text-align: center;vertical-align: middle;">
                    <?php if ($glev) { ?>
                      <a href="?app=<?= $app ?>&del=<?= $data[$i]["id"] ?>" style="margin-left: 5px;" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                    <?php } ?>
                    <a style="margin-left: 5px;" href="?app=<?= $app ?>&edit=<?= $data[$i]["id"] ?>" class="btn btn-warning btn-circle btn-sm">
                      <i class="fas fa-edit"></i>
                    </a><a href="?app=orders&level=<?= $data[$i]["id"] ?>" class="btn btn-primary btn-circle btn-sm">
                      <i class="fas fa-fw fa-table"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
<?php } else {
  if ($edit)  $myorder = $core->getorder(array("id" => $edit));  ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;"> اضافة او تعديل</h6>
    </div>
    <div class="card-body">
      <form onsubmit="onsubmit(this); return false;" action="admin/?app=<?= $app ?>" id="order" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">الاسم</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?= $myorder[0]["name"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">البريد</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="email" value="<?= $myorder[0]["email"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الموبيل</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="mobile" value="<?= $myorder[0]["mobile"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">المنطقه</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="zone" value="<?= $myorder[0]["zone"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">المدينة</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="city" value="<?= $myorder[0]["city"] ?>">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">العنوان</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="address" value="<?= $myorder[0]["address"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">المجموع</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="total" value="<?= $myorder[0]["total"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الكود الترويجى</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="coupon_code" value="<?= $myorder[0]["coupon_code"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">تم التسليم</label>
            <select class="form-control" name="done">
              <option value="1">نعم</option>
              <option value="0" <?php if (!$myorder[0]["done"]) {  ?> selected="selected" <?php } ?>>لا</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlTextarea1">تعليمات التسليم</label>
            <textarea class="form-control" name="message" rows="6"><?= str_replace(array("<br>", "</br>", "<br />"), PHP_EOL, $myorder[0]["message"]) ?></textarea>
          </div>
        </div>
        <?php if (!$edit) { ?>
          <input type="hidden" name="date" value="<?= time() ?>" />
        <?php } ?>
        <input type="hidden" name="mydata" value="<?= $edit ?>" />
        <button type="submit" name="next" class="btn btn-outline-success" style="    float: left;" value="تم"> حفظ </button>
      </form>
      <div class="form-group">
      </div>
    </div>
  </div>
<?php } ?>