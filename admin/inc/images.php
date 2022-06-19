<?php
$del = $core->isv("del");
$level = $core->isv("level");
$blog = $core->isv("blog");
if (!$level)
  $level = $core->isv("blog");
$edit = $core->isv("edit");
$add = $core->isv("add");
$status = $core->isv("status");
$myorder = array();
if ($del)
  $core->SqlDel("product_images", "where id=" . $del);
if (!$add && !$edit) {
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;"><?= (!$level ? "الالبومات" : "الصور") ?> </h6>
      <div class="d-sm-flex align-items-center justify-content-between " style="float: left;">
        <div class="form-groupd col2">
          <a href="?app=<?= $app ?>&add=true&<?= ($blog ? "blog" : "level") ?>=<?= $level ?>" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <?php if (!$level) { ?>
              <span class="text">اضافة البوم</span>
            <?php } else { ?>
              <span class="text">اضافة صوره</span>
            <?php } ?>
          </a>
          <?php if ($blog) { ?>
            <a href="" class="btn btn-primary btn-icon-split multipleFile">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">اضافة صور</span>
            </a>
            <form style="height: 0;
    opacity: 0;
    display: none;" onsubmit="onsubmit(this); return false;" action="admin/?app=<?= $app ?>" id="product_images" method="post" enctype="multipart/form-data">
              <input multiple="multiple" name="multipleUpload" accept="image/*" id="imgInp" class="photo upload-field-1" type="file">
            </form>
          <?php } ?>
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
              <th>الصورة</th>
              <?php if (!$blog) { ?>
                <th>المنتج</th>
              <?php } ?>
              <th>الحالة</th>
              <th>الاجراء</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            $data = array();
            if ($level) {
              $data = array("product_id" => $level);
            }
            $data =  $core->getproducts_images($data);
            for ($i = 0; $i < count($data); $i++) {
              $date = $core->getDateTime($data[$i]["date"], "arabic");
              // $login = $core->getspecialized(array("id"=>$data[$i]["specialized"]));
              $login = false;
              if ($data[$i]["product_id"])
                $login = $core->getBlog(array("id" => $data[$i]["product_id"]));
              /*                     if($data[$i]["product_id"] && !$level)
                       continue;*/
            ?>
              <tr>
                <td style="vertical-align: middle;"><?= $index++ ?></td>
                <td style="vertical-align: middle;"><img style=" height:100px;  background: #36b9cc;
    border-radius: 50%;   width: 100px;" src="../images/<?= $data[$i]["image"] ? $data[$i]["image"] : "boss2.png" ?>" alt="" /></td>
                <?php if (!$blog) { ?>
                  <td style="vertical-align: middle;direction: rtl;"><?= $login ? $login[0]["name"] : "" ?></td>
                <?php } ?>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["active"] ? "مفعل" : "غير مفعل" ?></td>
                <td class="center" style=" text-align: center;vertical-align: middle;"><?php if ($glev) { ?><a href="?app=<?= $app ?>&del=<?= $data[$i]["id"] ?><?= ($blog ? "&blog=" . $blog : "") ?>" style="margin-left: 5px;" class="btn btn-danger btn-circle btn-sm">
                      <i class="fas fa-trash"></i>
                    </a><?php } ?><a href="?app=<?= $app ?>&edit=<?= $data[$i]["id"] ?>&<?= ($blog ? "blog" : "level") ?>=<?= $level ?>" class="btn btn-warning btn-circle btn-sm">
                    <i class="fas fa-edit"></i> </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php } else {
  if ($edit)  $myorder = $core->getproducts_images(array("id" => $edit));  ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;"> اضافة او تعديل</h6>
    </div>
    <div class="card-body">
      <form onsubmit="onsubmit(this); return false;" action="admin/?app=<?= $app ?>" id="product_images" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlSelect1">المنتج</label>
            <select class="form-control" name="product_id">
              <option value="0">حدد ...</option>
              <?php $data = array();
              /*if($level){
                          $data = array("id"=>$level);
                      }*/
              $count = $core->getBlog($data);
              /*  if($core->isv("blog"))
                      $count = $core->getBlog($data);*/
              for ($i = 0; $i < count($count); $i++) {
                if ($count[$i]["product_id"]  == 0) {
                  // continue;
              ?>
                  <option data="<?= $count[$i]["id"] ?>" <?php if ($myorder[0]["product_id"] == $count[$i]["id"] || $level ==  $count[$i]["id"]) {  ?> selected="selected" <?php } ?> value="<?= $count[$i]["id"] ?>"><?= $count[$i]["name"] ?></option>
              <?php }
              } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="exampleFormControlInput1">الترتيب</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" name="order" value="<?= ($myorder[0]["order"] ? $myorder[0]["order"] : 0) ?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">مفعل</label>
              <select class="form-control" name="active">
                <option value="1">نعم</option>
                <option value="0" <?php if (!$myorder[0]["active"]) {  ?> selected="selected" <?php } ?>>لا</option>
              </select>
            </div>
          </div>
          <div class="form-group bo-img col" for="exampleInputFile">
            <label for="exampleFormControlInput1" style="display: block;">الصورة</label>
            <div class="progressbar">
              <h4 class="small font-weight-bold text-right">جارى الرفع <span class="float-left">50%</span></h4>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="image-upload">
              <img id="blah" class="ulogo" src="../images/<?= $myorder[0]["image"] ? $myorder[0]["image"] : "boss2.png" ?>" />
              <div class="fileUpload2 fa fa-camera">
                <input name="fileToUpload" accept="image/*" id="imgInp" class="photo upload-field-1" type="file">
                <input type="hidden" name="image" value="<?= $myorder[0]["image"] ? $myorder[0]["image"] : "boss2.png" ?>" />
              </div>
            </div>
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