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
 echo "�ļ�����: " . $_FILES["file"]["name"] . "<br>";

 if (file_exists("./" . $_FILES["file"]["name"]))
 {
  echo "<script language=\"javascript\">alert('���ļ��Ѿ�����!');history.go(-1)</script>";
 }
 else
 {
 move_uploaded_file($_FILES["file"]["tmp_name"],
 "./" . $_FILES["file"]["name"]);
 echo "����·��: " . "./" . $_FILES["file"]["name"];
  echo "<script language=\"javascript\">alert('�ϴ��ɹ�!');history.go(-1)</script>";
 }
 }
 }
 else
 {
 echo "<script language=\"javascript\">alert('��Ч�ļ�,�������ϴ�!');history.go(-1)</script>";
 }
 ?> 