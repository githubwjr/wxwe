<?php
 $allowedExts = array("txt");
 $temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
 if ((($_FILES["file"]["type"] == "text/plain"))
 && ($_FILES["file"]["size"] < 17)
 && in_array($extension, $allowedExts))
 {
 if ($_FILES["file"]["error"] > 0)
 {
 echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
 }
 else
 {
 echo "文件名称: " . $_FILES["file"]["name"] . "<br>";

 if (file_exists("./" . $_FILES["file"]["name"]))
 {
  echo "<script language=\"javascript\">alert('该文件已经存在!');history.go(-1)</script>";
 }
 else
 {
 move_uploaded_file($_FILES["file"]["tmp_name"],
 "./" . $_FILES["file"]["name"]);
 echo "保存路径: " . "./" . $_FILES["file"]["name"];
  echo "<script language=\"javascript\">alert('上传成功!');history.go(-1)</script>";
 }
 }
 }
 else
 {
 echo "<script language=\"javascript\">alert('无效文件,请重新上传!');history.go(-1)</script>";
 }
 ?> 