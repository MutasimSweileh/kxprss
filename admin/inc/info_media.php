<?php
$del = $core->isv("del");
$edit = $core->isv("edit");
$add = $core->isv("add");
$status = $core->isv("status");
$myorder = array();
if ($del)
  $core->SqlDel("info_media", "where id=" . $del);
if (!$add && !$edit) {
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;">السوشيال ميديا</h6>
      <div class="clear"></div>
    </div>
    <div class="card-body" style="    padding: 0;">
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>الاسم</th>
              <th>القيمة</th>
              <th>الاجراء</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            $data =  $core->getlogin(array("table" => "info_media"), "info_media");
            for ($i = 0; $i < count($data); $i++) {
              //$login = $core->getspecialized(array("id"=>$data[$i]["specialized"]));
            ?>
              <tr>
                <td style="vertical-align: middle;"><?= $index++ ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["code"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["link"] ?></td>
                <td class="center" style=" text-align: center;vertical-align: middle;"><a href="?app=<?= $app ?>&edit=<?= $data[$i]["id"] ?>" class="btn btn-warning btn-circle btn-sm">
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
  if ($edit)  $myorder = $core->getlogin(array("table" => "info_media", "id" => $edit), "info_media");  ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;"> تعديل</h6>
    </div>
    <div class="card-body">
      <form onsubmit="onsubmit(this); return false;" action="admin/?app=<?= $app ?>" id="<?= $app ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlInput1">الاسم</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="code" value="<?= $myorder[0]["code"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">القيمة</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="link" value="<?= $myorder[0]["link"] ?>">
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