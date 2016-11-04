<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>部门信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="dels">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
        		<th class="num"></th>        		
            	<th class="num">序号</th>
                <th class="name">部门名称</th>
                <th class="process">上级部门</th>
                <th class="node">排序</th>
                <th class="time">备注信息</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($dlist)): $i = 0; $__LIST__ = $dlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        		<td style="width:30px"><input type="checkbox" name="ids" value="<?php echo ($vo["dept_id"]); ?>"></td>
            	<td class="dept_id"><?php echo ($vo["dept_id"]); ?></td>
                <td class="dept_name"><?php echo (str_repeat('---',$vo["dept_level"])); echo ($vo["dept_name"]); ?></td>
                <td class="dept_pid"><?php echo ((isset($vo["dept_pname"]) && ($vo["dept_pname"] !== ""))?($vo["dept_pname"]):"顶级部门"); ?></td>
                <td class="dept_sort"><?php echo ($vo["dept_sort"]); ?></td>
                <td class="dept_remark"><?php echo ($vo["dept_remark"]); ?></td>
                <td class="operate">
                	<a href="<?php echo U('Dept/dshow');?>?dept_id=<?php echo ($vo["dept_id"]); ?>" class="modify">编辑</a>
                	<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                	<a href="<?php echo U('Dept/ddelete');?>?dept_id=<?php echo ($vo["dept_id"]); ?>" class="delete">删除</a>			
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
	<input type="button" name="selectAll" value="全部选中" onclick="selectAll()"/>
	<input type="button" name="reverseAll" value="全部反选" onclick="reverseAll()"/>
	<input type="button" name="cancellAll" value="全部取消" onclick="cancellAll()"/>
</body>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
function selectAll(){
	var obj_list=document.getElementsByName('ids');
	for(var i=0;i<obj_list.length;i++){
		obj_list[i].checked=true;
	}
}
function reverseAll(){
	var obj_list=document.getElementsByName('ids');
	for(var i=0;i<obj_list.length;i++){
		if(obj_list[i].checked==true){
			obj_list[i].checked=false;
		}else{
			obj_list[i].checked=true;
		}
	}
}
function cancellAll(){
	var obj_list=document.getElementsByName('ids');
	for(var i=0;i<obj_list.length;i++){
		obj_list[i].checked=false;
	}
}
$('.dels').click(function(){
		var obj_list=$(':checkbox:checked');
		var ids='';
		obj_list.each(function(){
			ids += $(this).val() + ',';
		})
		ids = ids.substr(0,ids.length-1);
		//alert(ids);
		if(window.confirm('确定要删除所选吗？')){
			location.href="/oa/Admin/Dept/dels/ids/"+ids;
		}
	}			
)
$('.modify').click(function(){
	//$(this).href=;
})
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