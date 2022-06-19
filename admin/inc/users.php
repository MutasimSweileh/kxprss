<?php
$del = $core->isv("del");
$edit = $core->isv("edit");
$add = $core->isv("add");
$status = $core->isv("status");
$myorder = array();
if ($del)
  $core->SqlDel("users", "where id=" . $del);
if (!$add && !$edit) {
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;">الادمن</h6>
      <div class="d-sm-flex align-items-center justify-content-between " style="float: left;">
        <div class="form-groupd col2">
          <a href="?app=<?= $app ?>&add=true" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">اضافة مستخدم</span>
          </a>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="card-body" style="    padding: 0;">
      <div class="table-responsive">
        <table class="table table-striped nowrap" id="dataTable" width="100%">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>الاسم</th>
              <th>البريد</th>
              <th>الموبيل</th>
              <th>الصلاحيات</th>

              <!--<th>كود الترويج</th>   -->
              <th>الحالة</th>
              <th>الاجراء</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            $data =  $core->getlogin(array("table" => "users"), "users");
            for ($i = 0; $i < count($data); $i++) {
              //$login = $core->getspecialized(array("id"=>$data[$i]["specialized"]));
            ?>
              <tr>
                <td style="vertical-align: middle;"><?= $index++ ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["name"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["email"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["mobile"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $core->getLev($data[$i]["lev"]) ?></td>

                <!-- <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["coupon_code"] ?></td>  -->
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["active"] ? "مفعل" : "غير مفعل" ?></td>
                <td class="center" style=" text-align: center;vertical-align: middle;"><a href="?app=<?= $app ?>&del=<?= $data[$i]["id"] ?>" style="margin-left: 5px;" class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                  </a><a href="?app=<?= $app ?>&edit=<?= $data[$i]["id"] ?>" class="btn btn-warning btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                  </a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php } else {
  if ($edit)  $myorder = $core->getlogin(array("table" => "users", "id" => $edit), "users");  ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;"> اضافة او تعديل</h6>
    </div>
    <div class="card-body">
      <form onsubmit="onsubmit(this); return false;" action="admin/?app=<?= $app ?>" id="<?= $app ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">الاسم الكامل</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?= $myorder[0]["name"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">اسم المستخدم</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="username" value="<?= $myorder[0]["username"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">البريد</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?= $myorder[0]["email"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الموبيل</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="mobile" value="<?= $myorder[0]["mobile"] ?>">
          </div>
        </div>
        <div class="row">
          <!--     <div class="form-group col">
    <label for="exampleFormControlInput1">كود الترويج</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"  name="coupon_code" value="<?= $myorder[0]["coupon_code"] ?>">
  </div>-->
        </div>
        <div class="row">

          <div class="form-group col">
            <label for="exampleFormControlInput1">كلمة المرور</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="password" value="">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الصلاحيات</label>
            <select class="form-control" name="lev">
              <option value="1">مدير</option>
              <option value="2" <?php if ($myorder[0]["lev"] == 2) {  ?> selected="selected" <?php } ?>>محرر</option>
              <option value="3" <?php if ($myorder[0]["lev"] == 3) {  ?> selected="selected" <?php } ?>>مبيعات</option>
              <option value="0" <?php if (!$myorder[0]["lev"]) {  ?> selected="selected" <?php } ?>>مستخدم</option>
            </select>
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