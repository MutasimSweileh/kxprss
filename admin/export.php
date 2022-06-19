<?php
include_once ("../classes/core.php");
$table = isv("table");
if(!$table)
$table = "order";
$file_ending = "xls";
$filename = "orders";
$core = new core;
$filter_date1 = $core->isv("from");
//$filter_date1 = 123344;
$filter_date2 = $core->isv("to");
//header info for browser
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
/*******Start of Formatting for Excel*******/
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
$data =  $core->getorder(array());
 if($filter_date1 || $filter_date2 ){
 // $filter_date1 = strtotime($filter_date1);
/*  echo $filter_date1;
  echo "<br>".date("Y-m-d",time());*/
  if($filter_date1){
   $dateTimeObj = DateTime::createFromFormat("Y-m-d",$filter_date1);
   $filter_date1 =   $dateTimeObj->getTimestamp();   }
    if($filter_date2){
        //$filter_date2 = strtotime($filter_date2);
         $dateTimeObj = DateTime::createFromFormat("Y-m-d",$filter_date2);
         $filter_date2 =   $dateTimeObj->getTimestamp();
        }
        //echo $filter_date1;
    foreach ($data as $v){
        $follow_date = $v["date"];
         $dateTimeObj = DateTime::createFromFormat("Y-m-d",date("Y-m-d",$follow_date));
         $follow_date =   $dateTimeObj->getTimestamp();
        if($filter_date1 && $follow_date >= $filter_date1 && !$filter_date2)
       $filter_clients[] = $v;
       else  if(!$filter_date1 && $filter_date2 &&  $follow_date <= $filter_date2)
       $filter_clients[] = $v;
       else if($filter_date1 && $filter_date2 && $follow_date <= $filter_date2 && $follow_date >= $filter_date1)
         $filter_clients[] = $v;
    }
    $data = $filter_clients;
}
/*function mysqli_field_name2($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
} */
foreach ($data[0] as $k => $v) {
echo ucfirst($k) . "\t";
}
print("\n");
//end of printing column names
//start while loop to get data
foreach ($data as $k => $v)  //fetch_table_data
{
    $schema_insert = "";
    foreach ($v as $k2 => $v2)
    {
        if($k2 == "date")
          $v2 = date("Y-m-d",$v2);
        if(!isset($v2))
            $schema_insert .= "NULL".$sep;
        elseif ($v2 != "")
            $schema_insert .= "$v2".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}
