<?php
$del = $core->isv("del");
$level = $core->isv("level");
$company = $core->isv("company");
$deal = $core->isv("deal");
$edit = $core->isv("edit");
$add = $core->isv("add");
$status = $core->isv("status");
$myorder = array();
if ($del)
  $core->SqlDel("products", "where id=" . $del);
if (!$add && !$edit) {
?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;float: right;"> <?= ($deal ? "العروض الخاصة" : "المنتجات") ?></h6>
      <div class="d-sm-flex align-items-center justify-content-between " style="float: left;">
        <div class="form-groupd col2">
          <a href="?app=<?= $app ?>&add=true&deal=<?= $deal ?>" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">اضافة منتج</span>
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
              <th>الصورة</th>
              <th>الوصف</th>
              <th>التصنيف</th>
              <th>العلامة التجارية</th>
              <th>السعر</th>
              <th>الخصم</th>
              <th>متوفر</th>
              <?php if ($deal) { ?>
                <th>تاريخ الانتهاء</th>
              <?php } ?>
              <th>الحالة</th>
              <th>الاجراء</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            $level = ($level ? $level : 0);
            if ($level)
              $data =  $core->getBlog(array("level" => $level));
            else  if ($company)
              $data =  $core->getBlog(array("company" => $company));
            else
              $data =  $core->getBlog(array());
            for ($i = 0; $i < count($data); $i++) {
              if (!$deal && $data[$i]["deal"] || $deal && !$data[$i]["deal"])
                continue;
              $date = $core->getDateTime($data[$i]["date"], "arabic");
              // $login = $core->getspecialized(array("id"=>$data[$i]["specialized"]));
              $gLogin = $core->getlogin(array("table" => "users", "id" => $data[$i]["user"]))[0];
              $login = $core->getCat(array("id" => $data[$i]["level"]));
              $company = $core->getcompanies(array("id" => $data[$i]["company"]));
            ?>
              <tr>
                <td style="vertical-align: middle;"><?= $data[$i]["id"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["name_arabic"] ?></td>
                <td style="vertical-align: middle;direction: ltr;"><?= $data[$i]["name"] ?></td>
                <td style="vertical-align: middle;"><img style=" height:100px;  background: #36b9cc;
    border-radius: 50%;   width: 100px;" src="../images/<?= $data[$i]["image"] ? $data[$i]["image"] : "boss2.png" ?>" alt="" /></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $core->limit_str($data[$i]["description"], 10) ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $login[0]["name"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $company[0]["name"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["price"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["discount"] ?></td>
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["stock"] ? "نعم" : "لا" ?></td> <?php if ($deal) { ?>
                  <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["expiry_date"] ?></td> <?php } ?>
                <!-- <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["deal"] ? "نعم" : "لا" ?></td>                       -->
                <td style="vertical-align: middle;direction: rtl;"><?= $data[$i]["active"] ? "مفعل" : "غير مفعل" ?></td>
                <td class="center" style=" text-align: center;vertical-align: middle;">
                  <?php if ($glev) { ?>
                    <a href="?app=<?= $app ?>&del=<?= $data[$i]["id"] ?>&deal=<?= $deal ?>" style="margin-left: 5px;" class="btn btn-danger btn-circle btn-sm">
                      <i class="fas fa-trash"></i>
                    </a>
                  <?php } ?>
                  <a href="?app=<?= $app ?>&edit=<?= $data[$i]["id"] ?>&deal=<?= $deal ?>" class="btn btn-warning btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="?app=images&amp;blog=<?= $data[$i]["id"] ?>" class="btn btn-primary btn-circle btn-sm">
                    <i class="fas fa-fw fa-table"></i>
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
  if ($edit)  $myorder = $core->getBlog(array("id" => $edit));  ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;"> اضافة او تعديل</h6>
    </div>
    <div class="card-body">
      <form onsubmit="onsubmit(this); return false;" data-red="&deal=<?= $deal ?>" action="admin/?app=<?= $app ?>" id="<?= $app ?>" method="post" enctype="multipart/form-data">
        <div class="row">

          <div class="form-group col">
            <label for="exampleFormControlInput1">الاسم</label>
            <input type="text" class="form-control" dir="ltr" id="exampleFormControlInput1" name="name" value="<?= str_replace('"', "'", $myorder[0]["name"]) ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الاسم العربى</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name_arabic" value="<?= str_replace('"', "'", $myorder[0]["name_arabic"]) ?>">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlSelect1">التصنيف</label>
            <select class="form-control" onload="getRelated(this);" onchange="getRelated(this);" name="level">
              <option value="0">حدد ...</option>
              <?php $count = $core->getCat(($getLogin["level"] ? array("id" => $getLogin["level"]) : array()));
              for ($i = 0; $i < count($count); $i++) { ?>
                <option data="<?= $count[$i]["id"] ?>" <?php if ($myorder[0]["level"] == $count[$i]["id"]) {  ?> selected="selected" <?php } ?> value="<?= $count[$i]["id"] ?>"><?= $count[$i]["name"] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col">
            <label for="exampleFormControlSelect1">العلامة التجارية</label>
            <select class="form-control" onload="getRelated(this);" onchange="getRelated(this);" name="company">
              <option value="0">حدد ...</option>
              <?php $count = $core->getcompanies(array());
              for ($i = 0; $i < count($count); $i++) { ?>
                <option data="<?= $count[$i]["id"] ?>" <?php if ($myorder[0]["company"] == $count[$i]["id"]) {  ?> selected="selected" <?php } ?> value="<?= $count[$i]["id"] ?>"><?= $count[$i]["name"] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">السعر</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="price" value="<?= $myorder[0]["price"] ?>">
          </div>
          <div class="form-group col">
            <label for="exampleFormControlInput1">الخصم</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="discount" value="<?= $myorder[0]["discount"] ?>">
          </div>

        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="exampleFormControlInput1">جديد</label>
              <select class="form-control" name="new">
                <option value="1">نعم</option>
                <option value="0" <?php if (!$myorder[0]["new"]) {  ?> selected="selected" <?php } ?>>لا</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">متوفر</label>
              <select class="form-control" name="stock">
                <option value="1">نعم</option>
                <option value="0" <?php if (!$myorder[0]["stock"]) {  ?> selected="selected" <?php } ?>>لا</option>
              </select>
            </div>
            <?php if ($deal) { ?>
              <div class="form-group">
                <label for="exampleFormControlInput1">تاريخ الانتهاء</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" name="expiry_date" value="<?= $myorder[0]["expiry_date"] ?>">
              </div> <?php } else { ?>
              <div class="form-group">
                <label for="exampleFormControlInput1">الاكثر مبيعا</label>
                <select class="form-control" name="best">
                  <option value="1">نعم</option>
                  <option value="0" <?php if (!$myorder[0]["best"]) {  ?> selected="selected" <?php } ?>>لا</option>
                </select>
              </div>
            <?php } ?>
            <div class="form-group">
              <label for="exampleFormControlInput1">مميز</label>
              <select class="form-control" name="special">
                <option value="1">نعم</option>
                <option value="0" <?php if (!$myorder[0]["special"]) {  ?> selected="selected" <?php } ?>>لا</option>
              </select>
            </div>
            <!--<div class="form-group">
    <label for="exampleFormControlInput1">عرض اليوم</label>
      <select class="form-control" name="deal" >
          <option value="1">نعم</option>
          <option value="0" <?php if (!$myorder[0]["deal"]) {  ?> selected="selected" <?php } ?> >لا</option>
    </select>
  </div>-->
            <!-- <div class="form-group">
    <label for="exampleFormControlInput1">جديد</label>
      <select class="form-control" name="new" >
          <option value="1">نعم</option>
          <option value="0" <?php if (!$myorder[0]["new"]) {  ?> selected="selected" <?php } ?> >لا</option>
    </select>
  </div>-->
            <div class="form-group">
              <label for="exampleFormControlInput1">الحالة</label>
              <select class="form-control" name="active">
                <option value="1">مفعل</option>
                <option value="0" <?php if (!$myorder[0]["active"]) {  ?> selected="selected" <?php } ?>>غير مفعل</option>
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
        <div class="row">
          <div class="form-group col">
            <label for="exampleFormControlTextarea1">الوصف العربى</label>
            <textarea class="form-control" name="description_arabic" id="extra" rows="6"><?= str_replace(array("<br>", "</br>", "<br />"), PHP_EOL, $myorder[0]["description_arabic"]) ?></textarea>
          </div>
          <div class="form-group col">
            <label for="exampleFormControlTextarea1">الوصف</label>
            <textarea class="form-control" dir="ltr" name="description" id="extra2" rows="6"><?= str_replace(array("<br>", "</br>", "<br />"), PHP_EOL, $myorder[0]["description"]) ?></textarea>
          </div>
        </div>
        <input type="hidden" name="deal" value="<?= ($deal ? 1 : 0) ?>" />
        <input type="hidden" name="date" value="<?= time() ?>" />
        <input type="hidden" name="mydata" value="<?= $edit ?>" />
        <!--  <input type="hidden" name="date" value="<?= time() ?>" />-->
        <button type="submit" name="next" class="btn btn-outline-success" style="    float: left;" value="تم"> حفظ </button>
      </form>
      <div class="form-group">
      </div>
    </div>
  </div>
<?php } ?>
<script>
  function ke(a) {
    return c = a.toLowerCase(),
      c = (c + "").replace(/^(\S)|\s+(\S)/g, function(a) {
        return a.toUpperCase()
      }),
      c = _(c),
      c = c.replace(/\(([A-Za-z])/g, function(a) {
        return a.toUpperCase()
      }),
      c
  }

  function _(c) {
    return c = c.replace(/\"([A-Za-z])/g, function(a) {
      return a.toUpperCase()
    })
  }

  function Se(a) {
    a = a.toLowerCase();
    for (var b = "", c = 0; c < a.length; c++) {
      var d = a.charAt(c);
      b += c % 2 ? d.toUpperCase() : d
    }
    return b
  }

  function Ie(a) {
    for (var s = "", i = 0; i < a.length; i++) {
      var n = a.charAt(i);
      s += n == n.toUpperCase() ? n.toLowerCase() : n.toUpperCase()
    }
    return s
  }

  function Be(a) {
    return a = (a = (a = ke(a)).replace(/\b(A|An|And|As|At|But|By|En|For|If|In|Is|Of|On|Or|The|To|Vs?\\.?|Via)\b/g, function(_) {
      return _.toLowerCase()
    })).replace(/(?:([\.\?!] |\n|^))(a|an|and|as|at|but|by|en|for|if|in|is|of|on|or|the|to|vs?\\.?|via)/g, function(_) {
      return ke(_)
    })
  }
  console.log(Be("10 best epilators for face and body get silky skin of 2020"));
</script>