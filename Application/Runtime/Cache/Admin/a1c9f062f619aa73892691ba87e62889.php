<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<form action="<?php echo U('save');?>" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<input type="submit" name="submit" />
	</form>
</body>
</html>