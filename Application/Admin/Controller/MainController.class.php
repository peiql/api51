<?php 
namespace Admin\Controller;
//use Think\Controller;
class MainController extends CommonController {
    public function index(){
        $role_id=session('role_id');
        $role_ids=D('Role')->field('role_ids')->where("role_id = $role_id")->find();
        $ids=$role_ids['role_ids'];
        $p_nodes=D('Node')->where("node_id in ($ids) and node_level = 0 and node_show = 1")->select();
        $nodes=D('Node')->where("node_id in ($ids) and node_level = 1 and node_show =1")->select();
        $this->assign('level0',$p_nodes);
        $this->assign('level1',$nodes);
        $this->display();
    }
    public function home(){
    	$this->display();
    }
}