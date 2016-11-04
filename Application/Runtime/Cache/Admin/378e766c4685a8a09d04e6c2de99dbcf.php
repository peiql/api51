<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-reg.css" />
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
	}
	#tip {
		position:absolute;
		z-index:999;
		top:96px;
		left:114px;
		width:260px;
		height:auto;
		display:none;
		background:#fff;
		border:1px #C5D6E0 solid;
	}
	#tip div {
		padding:0 10px;
	}
</style>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="/thinkoa/index.php/Admin/Email/addOk" method="post" enctype='multipart/form-data'>
<div class="main">
	<p class="short-input ue-clear">
    	<label>收件人：</label>
        <input name="tonickname" id='tonickname' type="text" placeholder="收件人名称" autocomplete='off' />
		<div id='tip'></div>
    </p>
    <p class="short-input ue-clear">
    	<label>主题：</label>
        <input name="title" type="text" placeholder="邮件主题" />
    </p>
	<p class="short-input ue-clear">
    	<label>附件：</label>
        <input type="file" name="file" />
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
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$("#tonickname").keyup(function(){
	var key_words=$(this).val();
	$.get("<?php echo U('getNames');?>",{'key_words':key_words},function(data){
		//alert(data);
		data=JSON.parse(data);
		//alert(data[0].user_nickname);
		//获取id=tip的标签对象
		var tip=$("#tip");
		//将该标签对象清空
		tip.empty();
		for(i=0;i<data.length;i++){
			//创建<div>标签对象
			var div=$("<div>");
			//将获取的昵称放到<div></div>标签里面
			div.html(data[i].user_nickname);
			div.mouseover(function(){
				$(this).attr({'style':'background:red'});
			})
			div.mouseout(function(){
				$(this).attr({'style':'background:white'});
			})
			div.click(function(){
				$("#tonickname").val($(this).html());
				tip.hide();
			})
			tip.append(div);
		}
		tip.show();
	})
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