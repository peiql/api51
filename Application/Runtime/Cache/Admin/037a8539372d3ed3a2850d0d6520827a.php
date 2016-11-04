<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/oa/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/oa/Public/Admin/css/WdatePicker.css" />
<script src="/oa/Public/Common/iDialog/jquery-1.8.3.min.js"></script>
<script src="/oa/Public/Common/iDialog/jquery.iDialog.js" dialog-theme="default"></script>
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .num {width:50px;}
	table tr .name {width:320px;}
	table tr .process {width:80px;}
	table tr .file {width:80px; padding-left:13px;}
	table tr .node {width:80px;}
	table tr .addtime {width:80px;}
	.i-content {height:400px; overflow:auto;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="/thinkoa/index.php/admin/doc/add" class="add">添加</a>
    <a href="javascript:;" class="del" id='btnDel'>删除</a>
    <a href="javascript:;" class="edit" id='btnEdit'>编辑</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">序号</th>
                <th class="name">标题</th>
                <th class="process">内容</th>
				<th class="file">附件下载</th>
                <th class="node">作者</th>
                <th class="time">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            	<td class="num"><?php echo ($v["doc_id"]); ?></td>
                <td class="name"><?php echo ($v["doc_title"]); ?></td>
                <td class="process">
                	<a class='show' onclick="show(<?php echo ($v["doc_id"]); ?>)">查看全文</a>
                </td>
				<td class="file">
					<a href="<?php echo U('download','id='.$v['doc_id']);?>">附件下载</a>
				</td>
                <td class="node"><?php echo ($v["doc_nickname"]); ?></td>
                <td class="time"><?php echo ($v["doc_ctime"]); ?></td>
                <td class="operate">
                	<a href="<?php echo U('del','id='.$v['doc_id']);?>" >删除</a>
                	<!-- <input type='checkbox' name='checkbox' value='2' /> -->
                </td>
            </tr><?php endforeach; endif; ?>       </tbody>
    </table>
</div>
</body>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery-1.10.1.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/oa/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
//定义页面载入事件
/* function show(id){
	alert(12);
} */

  function show(id){
	//调用$.get方法，来访问后台程序，获取公文信息
	//alert(id);
	$.get("<?php echo U('getContent');?>", {"id":id, "_":Math.random()}, function(msg){
		//alert(msg);
		// msg是字符串类型的数据，内容跟json格式一模一样。 将字符串转为json对象
		msg = JSON.parse(msg);
		iDialog({
		    title: msg.doc_title,
		    //id:'DemoDialog  ',
		    content: msg.doc_content,
		    lock: true,
		    width:500,
		    fixed: true,
		    height:300
		});
	});
}  
/* $(function(){
	iDialog({
	    title:'Hello World',
	    id:'DemoDialog  ',
	    content:'<p>大家好：<br> 我是minDialog</p>',
	    lock: true,
	    width:500,
	    fixed: true,
	    height:300
	}); 
}) */
	
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>