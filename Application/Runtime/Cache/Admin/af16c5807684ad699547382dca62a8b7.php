<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style>
	.main p input {
		float:none;
	}
</style>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="<?php echo U('addOk');?>" method="post">
<div class="main">
    <p class="short-input ue-clear">
    	<label>节点名称：</label>
        <input type="text" name="name" placeholder="节点名称" />
    </p>
    <p class="short-input ue-clear">
    	<label>别名：</label>
        <input type="text" name="title" placeholder="别名" />
    </p>
    <div class="short-input select ue-clear">
    	<label>上级节点：</label>
        <select name="pid">
        	<option value="0">顶级节点</option>
        	<?php if(is_array($nlist)): foreach($nlist as $key=>$v): ?><option value="<?php echo ($v["node_id"]); ?>"><?php echo ($v["node_name"]); ?></option><?php endforeach; endif; ?>
        </select>
    </div>
    <p class="short-input ue-clear">
    	<label>模块名：</label>
        <input type="text" name="module" placeholder="模块名称" />
    </p>
    <p class="short-input ue-clear">
    	<label>控制器名：</label>
        <input type="text" name="controller" placeholder="控制器名" />
    </p>
    
    <p class="short-input ue-clear">
    	<label>方法名：</label>
        <input type="text" name="action" placeholder="方法名" />
    </p>
    <p class="short-input ue-clear">
    	<label>级别：</label>
        <input type="text" name="level" placeholder="级别" />
    </p>
    <p class="short-input ue-clear">
    	<label>排序：</label>
        <input type="text" name="sort" placeholder="排序" />
    </p>
    <p class="short-input ue-clear">
    	<label>是否显示：</label>
        <input type="text" name="show" placeholder="1/0" />
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
$('.confirm').click(function(){
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