<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .num{ width:63px; text-align: center;}
	table tr .name{ width:63px; padding-left:17px;}
	table tr .nickname{ width:63px; padding-left:13px;}
	table tr .dept{ width:63px; padding-left:13px;}
	table tr .role{ width:63px; padding-left:13px;}
	table tr .sex{ width:63px; padding-left:13px;}
	table tr .birthday{ width:63px; padding-left:13px;}
	table tr .tel{ width:63px; padding-left:13px;}
	table tr .email{ width:63px; padding-left:13px;}
	table tr .ctime{ width:63px; padding-left:13px;}
	table tr .operate{ width:63px; padding-left:15px;}
	table tr .show{ width:10px; padding-left:15px;}
	table tr .operate a{ color:#2c7bbc;}
	table tr .operate a:hover{ text-decoration:underline;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">序号</th>
                <th class="name">名称</th>
                <th class="nickname">别名</th>
                <th class="dept">父节点</th>
                <th class="role">模块</th>
                <th class="sex">控制器</th>
                <th class="birthday">方法</th>
                <th class="tel">路径</th>
                <th class="email">级别</th>
                <th class="ctime">排序</th>
                <th class="show">显示</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($nlist)): foreach($nlist as $key=>$v): ?><tr>
            	<td class="num"><?php echo ($v["node_id"]); ?></th>
                <td class="name">
                	<?php echo (str_repeat('---',$v["node_level"])); echo ($v["node_name"]); ?>
                </th>
                <td class="nickname"><?php echo ($v["node_title"]); ?></th>
                <td class="dept"><?php echo ($v["node_pid"]); ?></th>
                <td class="role"><?php echo ($v["node_module"]); ?></th>
                <td class="sex"><?php echo ($v["node_controller"]); ?></th>
                <td class="birthday"><?php echo ($v["node_action"]); ?></th>
                <th class="tel"><?php echo ($v["node_path"]); ?></th>
                <th class="email"><?php echo ($v["node_level"]); ?></th>
                <th class="ctime"><?php echo ($v["node_sort"]); ?></th>
                <th class="show"><?php echo ($v["node_show"]); ?></th>
                <th class="operate">
                	<input type="checkbox" name="id" value="<?php echo ($v["node_id"]); ?>" />
                </th>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<input type="button" value="分配权限" onclick="distribute()" />
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
function distribute(){
	var checkbox=$(':checkbox:checked');
	var str="";
	checkbox.each(function(){
		str+=$(this).val()+',';
	})
		ids=str.substr(0,str.length-1);
		location.href="/oa/Admin/Role/distributeOk/ids/"+ids+"/role_id/"+<?php echo ($_GET['role_id']); ?>;	
}
/* function distribute(){
	//1. 获取所有选中的checkbox
	var list = $(':checkbox:checked');
	//2. 取出每个checkbox中的value值
	var ids = "";
	list.each(function(){
		ids += $(this).val() + ',';
	})
	//3. 将ids的最后一个 ， 去掉
	ids = ids.substr(0, ids.length - 1);
	//4. 将ids传递到后台的php程序
	location.href = "/oa/Admin/Role/distributeOk/ids/"+ids+"/rid/"+<?php echo ($_GET['id']); ?>;
} */

$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

/* $('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
}); */

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>