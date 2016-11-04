<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>添加部门</h2></div>
<form method="post" action="<?php echo U('addOk');?>">
<div class="main">
    <p class="short-input ue-clear">
    	<label>部门：</label>
        <input type="text" placeholder="部门名称" name="name" />
    </p>
    <div class="short-input select ue-clear">
    	<label>上级部门：</label>
        <div class="select-wrap">
        	<select name="pid">
        			<option value="0" >顶级部门</option>
        		<?php if(is_array($dlist)): foreach($dlist as $key=>$vo): ?><option value="<?php echo ($vo["dept_id"]); ?>" ><?php echo ($vo["dept_name"]); ?></option><?php endforeach; endif; ?>
        	</select>
        </div>
    </div>
    <p class="short-input ue-clear">
    	<label>排序：</label>
        <input type="text" name="sort"/>
    </p>
    <p class="short-input ue-clear">
    	<label>备注信息：</label>
        <textarea placeholder="请输入内容" name="remark"></textarea>
    </p>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm">确定</a>
    <a href="javascript:;" class="clear">清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".confirm").click(function(){
	$('form').submit();
})
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