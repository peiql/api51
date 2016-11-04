<?php
namespace Admin\Controller;
class NodeController extends CommonController{
    function index(){
        $node_data=D('Node')->select();
        $node_data=getTree($node_data);
        $this->assign('nlist',$node_data);
        $this->display();
    }
    function add(){
        $node_data=D('Node')->field('node_id,node_name')->select();
        $this->assign('nlist',$node_data);
        $this->display();
    }
    function addOk(){
        $data=D('Node')->create();
        $result=D('Node')->add($data);
        if(!$result){
            echo D('Node')->getError();
        }else{
            $this->success('添加节点成功',U('index'),3);
        }
    }
}