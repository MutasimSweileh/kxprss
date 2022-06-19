<?php
$del = $core->isv("del");
$edit = $core->isv("edit");
$add = $core->isv("add");
$status = $core->isv("status");
$myorder = array();
if ($del)
  $core->SqlDel("coupons", "where id=" . $del);
if (!$add && !$edit) {
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;">الكوبونات </h6>
      <div class="clear"></div>
    </div>
    <div class="card-body" style="    padding: 0;">
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>نوع الكوبون</th>
              <th>الكوبون</th>
              <th>القيمة</th>
              <th>عدد المرات</th>
              <th>تاريخ الانتهاء</th>
              <th>الحالة</th>
              <th>الاجراء</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            $data =  $core->getlogin(array("table" => "coupons"), "coupons");
            for ($i = 0; $i < count($data); $i++) {
              //$login = $core->getspecialized(array("id"=>$data[$i]["specialized"]));
            ?>
              <tr>
                <td style="vertical-align: middle;"><?= $index++ ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= !$data[$i]["coupon_type"] ? "الطلب" : " الشحن" ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["coupon"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["value"] ?> %</td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["count"] ?></td>
                <td style="vertical-align: middle;"><?= ($data[$i]["expiry_date"] ? $data[$i]["expiry_date"] : "لايوجد") ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["active"] ? "مفعل" : "غير مفعل" ?></td>
                <td class="center" style=" text-align: center;vertical-align: middle;"><a href="?app=<?= $app ?>&edit=<?= $data[$i]["id"] ?>" class="btn btn-warning btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                  </a> <a href="?app=<?= $app ?>&del=<?= $data[$i]["id"] ?>" style="margin-left: 5px;" class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                  </a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php } else {
  if ($edit)  $myorder = $core->getlogin(array("table" => "coupons", "id" => $edit), "coupons");  ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;"> تعديل</h6>
    </div>
    <div class="card-body">
      <form onsubmit="onsubmit(this); return false;" action="admin/?app=<?= $app ?>" id="<?= $app ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">نوع الكوبون</label>
            <select class="form-control" name="coupon_type">
              <option value="0">الطلب</option>
              <option value="1" <?php if ($myorder[0]["coupon_type"]) {  ?> selected="selected" <?php } ?>>الشحن</option>
            </select>
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الكوبون</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="coupon" value="<?= $myorder[0]["coupon"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">عدد المرات </label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="count" value="<?= $myorder[0]["count"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">القيمة</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="value" value="<?= $myorder[0]["value"] ?>">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">تاريخ الانتهاء</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="expiry_date" value="<?= $myorder[0]["expiry_date"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">مفعل</label>
            <select class="form-control" name="active">
              <option value="1">نعم</option>
              <option value="0" <?php if (!$myorder[0]["active"]) {  ?> selected="selected" <?php } ?>>لا</option>
            </select>
          </div>
        </div>
        <input type="hidden" name="mydata" value="<?= $edit ?>" />
        <input type="hidden" name="admin" value="<?= $edit ?>" />
        <button type="submit" name="next" class="btn btn-outline-success" style="    float: left;" value="تم"> حفظ </button>
      </form>
      <div class="form-group">
      </div>
    </div>
  </div>
<?php } ?>