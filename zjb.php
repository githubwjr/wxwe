<?php
if($_GET['pwd']!="168"){
	header("Location:http://www.029gc.cn");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>文件上传</title>

<!--可无视-->
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />

<!--必要样式-->
<link rel="stylesheet" type="text/css" href="css/component.css" />
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- remove this if you use Modernizr -->
<script>(function(e,t,n)
{
	var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
</script>
<style>
#testButton { 
color:rgb(255, 255, 255);font-size:25px;padding-top:9px;padding-bottom:9px;padding-left:44px;padding-right:44px;border-width:0px;border-color:rgb(243, 245, 240);border-style:solid;border-radius:31px;background-color:rgb(194, 29, 0);}#testButton:hover{color:#ffffff;background-color:#78c300;border-color:#c5e591;}
</style>
</head>
<body>
		<div class="container">

			<div class="content">
				<form action="upload.php" method="post" enctype="multipart/form-data">
				
				<div class="box">
					<input type="file" name="file" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					<label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>选择一个文件上传</span></label>

										<br>
					<input type="submit" name="submit" id="testButton"  value="点我上传">
				</div>


</form>
			</div>

		</div><!-- /container -->

		<script src="css/custom-file-input.js"></script>

		<!-- jQuery版本
		<script src="js/jquery-v1.min.js"></script>
		<script src="js/jquery.custom-file-input.js"></script>
		-->

<div style="text-align:center;margin:10px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。技术支持QQ:85068276</p>
</div>
</body>
</html>
