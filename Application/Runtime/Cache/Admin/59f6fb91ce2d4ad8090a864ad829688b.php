<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-reg.css" />
<script src="/oa/Public/Admin/js/jquery-1.10.1.js" type="text/javascript"></script>
<script src="/oa/Public/Common/Uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/oa/Public/Common/Uploadify/uploadify.css">

<title>移动办公自动化系统</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("../images/inputbg.png") repeat-x scroll 0 0;
	    border: 1px solid #c5d6e0;
	    height: 28px;
	    outline: medium none;
	    padding: 0 10px;
	    width: 240px;
	}
	textarea {
		width:800px;
		font-size:12px;
		font-family:'Microsoft YaHei';
	}
	textarea#description { width:472px; padding:10px; height:84px; resize:none; outline:none; border:1px solid #c5d6e0; background:url(../images/inputbg.png) repeat-x left top;overflow:auto; float:left;}
	#showPic {width:145px; height:120px; position:absolute; left:400px; top:65px; background:#f00;}
	#showPic img {width:145px; height:120px;}
</style>

</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="<?php echo U('addOk');?>" method="post" id="form" enctype='multipart/form-data'>
<input type="hidden" name="pic" id="pic" />
<input type="hidden" name="smallpic" id="smallpic" />
<div class="main">
	<div id='showPic'></div>
    <p class="short-input ue-clear">
    	<label>标题：</label>
        <input name="title" type="text" placeholder="标题" />
    </p>
	<p class="short-input ue-clear" style='float:left;'>
    	<label>缩略图：</label>
    </p>
	<br />
	<div style='float:left;'><input type="file" name="file" id="file" multiple="true" /></div>
	<div style='clear:both;'></div>
	<p class="short-input ue-clear">
    	<label>作者：</label>
        <input name="nickname" type="text" value="<?php echo (session('nickName')); ?>" readonly />
    </p>
	<p class="short-input ue-clear">
    	<label>描述：</label>
        <textarea name="desc" id="desc" placeholder='描述'></textarea>
    </p>
    <p class="short-input ue-clear" style="float:left;">
    	<label>内容：</label>
    </p>
	<p style='width:900px; padding-left:0; float:left;'>
		<textarea name="content" id="content"></textarea>
	</p>
	<div style='clear:both;'></div>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm" id='btnSubmit'>确定</a>
    <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$("#btnSubmit").click(function(){
	$('#form').submit();
}); 
$("#file").uploadify({
	'swf'      : '/oa/Public/Common/Uploadify/uploadify.swf',
	'uploader' : "/oa/Admin/Knowledge/upfile",
	'onUploadSuccess' : function(file,data,response){
		//alert(data);
		data=JSON.parse(data);
		//alert(data.pic);
		$('#pic').val(data.pic);
		$('#smallpic').val(data.smallpic);
		path='/oa/'+data.smallpic;
		//alert(path);
		img=$("<img>").attr({'src':path});
		//alert(img)
		$("#showPic").html(img);
	}
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