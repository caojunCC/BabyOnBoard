<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/jquery-1.4.4.min.js"></script>
<script charset="UTF-8" src="/iwebshop/runtime/systemjs/artdialog/artDialog.min.js"></script>
</head>
<body style='width:450px'>
	<div class="content">
		<form action='<?php echo IUrl::creatUrl("/block/user_ico_upload");?>' method='post' enctype='multipart/form-data'>
			<table class='border_table'>
				<col width="150px" />
				<col width="300px" />
				<tr>
					<th>上传头像：</th>
					<td><input type='file' class='file' name='user_ico' /></td>
				</tr>
				<tr>
					<th></th>
					<td><button type='submit' class='submit'><span>确 定</span></button></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>