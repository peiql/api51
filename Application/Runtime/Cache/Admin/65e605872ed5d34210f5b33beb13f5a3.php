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
    <a href="<?php echo U('charts');?>" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">序号</th>
                <th class="name">姓名</th>
                <th class="nickname">昵称</th>
                <th class="dept">部门</th>
                <th class="sex">性别</th>
                <th class="birthday">生日</th>
                <th class="tel">电话</th>
                <th class="email">邮箱</th>
                <th class="ctime">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($ulist)): foreach($ulist as $key=>$v): ?><tr>
            	<td class="num"><?php echo ($v["user_id"]); ?></td>
                <td class="name"><?php echo ($v["user_name"]); ?></td>
                <td class="nickname"><?php echo ($v["user_nickname"]); ?></td>
                <td class="dept"><?php echo ($v["dept_name"]); ?></td>
                <td class="sex"><?php echo ($v["user_sex"]); ?></td>
                <td class="birthday"><?php echo ($v["user_birthday"]); ?></td>
                <td class="tel"><?php echo ($v["user_tel"]); ?></td>
                <td class="email"><?php echo ($v["user_email"]); ?></td>
                <td class="ctime"><?php echo ($v["user_ctime"]); ?></td>
                <td class="operate">操作</td>
            </tr><?php endforeach; endif; ?>     
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

 $('.pagination').pagination(<?php echo ($count); ?>,{
	callback: function(page){
		show(page+1);
		
	},
	items_per_page : <?php echo ($pagesize); ?>, // 每页显示多少条记录
	display_msg: true,
	setPageNo: true
}); 
 function show(page){
	$.get("<?php echo U('getContent');?>",{"page":page,"_":Math.random()},function(msg){
		$('tbody').html(msg);
		//alert(msg);
	})
} 
$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>