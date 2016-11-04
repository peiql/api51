<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-reg.css" />
<link href="/oa/Public/Common/Ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/oa/Public/Common/Ueditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/oa/Public/Common/Ueditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/oa/Public/Common/Ueditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/oa/Public/Common/Ueditor/lang/zh-cn/zh-cn.js"></script>
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="/oa/Admin/Doc/addOk" method="post" enctype='multipart/form-data' id="f">
<div class="main">
    <p class="short-input ue-clear">
    	<label>角色名称：</label>
    </p>
	<p class="short-input ue-clear">
    	<label>角色权限id：</label>
    </p>
    <p class="short-input ue-clear" style="float:left;">
    	<label>角色操作权限：</label>
    </p>	
	<div style='clear:both;'></div>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm" id='btnSubmit'>分配角色权限</a>
</div>
</form>
</body>
<!-- <script type="text/javascript" src="/oa/Public/Admin/js/jquery.js"></script> -->
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(function(){
	$('#btnSubmit').bind('click',function(){
		$("#f").submit();
	});
	var um = UM.getEditor('content',
			//为编辑器实例添加一个路径，这个不能被注释
	        {UEDITOR_HOME_URL :' /oa/Public/Common/Ueditor'

	        //图片上传配置区
	        ,imageUrl:"<?php echo U('upfile');?>"             //图片上传提交地址
	        ,imagePath: "/oa/Uploads/images/"}                     //图片修正地址，引用了fixedImagePath,如有特殊需求，可自行配置	
	);	
	$('#btnReset').bind('click',function(){
		$('form')[0].reset();
	});
});	

$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});

showRemind('input[type=text], textarea','placeholder');
</script>
</html>