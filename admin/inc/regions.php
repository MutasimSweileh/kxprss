<?php
$del = $core->isv("del");
$edit = $core->isv("edit");
$add = $core->isv("add");
$status = $core->isv("status");
$myorder = array();
if ($del)
  $core->SqlDel("locations", "where id=" . $del);
if (!$add && !$edit) {
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;">المناطق</h6>
      <div class="d-sm-flex align-items-center justify-content-between " style="float: left;">
        <div class="form-groupd col2">
          <a href="?app=<?= $app ?>&add=true" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">اضافة منطقة</span>
          </a>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="card-body" style="    padding: 0;">
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>الاسم العربى</th>
              <th>الاسم</th>
              <th>المدينة</th>
              <th>السعر</th>
              <th>الحالة</th>
              <th>الاجراء</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            $data =  $core->getData("locations");
            if ($core->isv("level"))
              $data =  $core->getData("locations", "where region=" . $core->isv("level"));
            if ($data)
              for ($i = 0; $i < count($data); $i++) {
                //$login = $core->getspecialized(array("id"=>$data[$i]["specialized"]));
                $login = false;
                if ($data[$i]["region"])
                  $login = $core->getData("regions", "where id=" . $data[$i]["region"]);
            ?>
              <tr>
                <td style="vertical-align: middle;"><?= $index++ ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["text_arabic"] ?></td>
                <td style="vertical-align: middle;direction: ltr;"><?= $data[$i]["text"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $login[0]["text_arabic"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["price"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["active"] ? "مفعل" : "غير مفعل" ?></td>
                <td class="center" style=" text-align: center;vertical-align: middle;">
                  <?php if ($glev) { ?>
                    <a href="?app=<?= $app ?>&del=<?= $data[$i]["id"] ?>" style="margin-left: 5px;" class="btn btn-danger btn-circle btn-sm">
                      <i class="fas fa-trash"></i>
                    </a>
                  <?php } ?>
                  <a style="margin-left: 5px;" href="?app=<?= $app ?>&edit=<?= $data[$i]["id"] ?>" class="btn btn-warning btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php } else {
  if ($edit)  $myorder = $core->getData("locations", "where id=" . $edit);  ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;"> اضافة او تعديل</h6>
    </div>
    <div class="card-body">
      <form onsubmit="onsubmit(this); return false;" action="admin/?app=<?= $app ?>" id="locations" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlSelect1">المدينة</label>
            <select class="form-control" name="region">
              <option value="0">حدد ...</option>
              <?php $count = $core->getData("regions");
              for ($i = 0; $i < count($count); $i++) {
                if ($count[$i]["active"]  == 1) {
                  // continue;
              ?>
                  <option data="<?= $count[$i]["id"] ?>" <?php if ($myorder[0]["region"] == $count[$i]["id"]) {  ?> selected="selected" <?php } ?> value="<?= $count[$i]["id"] ?>"><?= $count[$i]["text_arabic"] ?></option>
              <?php }
              } ?>
            </select>
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">السعر</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="price" value="<?= $myorder[0]["price"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">مفعل</label>
            <select class="form-control" name="active">
              <option value="1">نعم</option>
              <option value="0" <?php if (!$myorder[0]["active"]) {  ?> selected="selected" <?php } ?>>لا</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">الاسم</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="text" value="<?= $myorder[0]["text"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الاسم العربى</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="text_arabic" value="<?= str_replace('"', "'", $myorder[0]["text_arabic"]) ?>">
          </div>
        </div>
        <input type="hidden" name="mydata" value="<?= $edit ?>" />
        <button type="submit" name="next" class="btn btn-outline-success" style="    float: left;" value="تم"> حفظ </button>
      </form>
      <div class="form-group">
      </div>
    </div>
  </div>
<?php } ?>