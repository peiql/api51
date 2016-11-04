<?php
namespace Admin\Controller;
class RoleController extends CommonController{
    function index(){
        $role_data=D('Role')->select();
        $this->assign('rlist',$role_data);
        $this->display();
    }
    function distribute(){
        $node_data=D('Node')->select();
        $node_data=getTree($node_data);
        $this->assign('nlist',$node_data);
        $this->display();
    }
    function distributeOk(){
        $ids=I('get.ids');
        $role_id=I('get.role_id');
        $data=D('Node')->field('node_path')->where("node_id in ($ids)")->select();
        $str='Admin-Main-home,Admin-Main-index,';
        foreach($data as $value){
            if($value['node_path']!='kong'){
                $str.=$value['node_path'].',';
            }
        }
        
        $str=substr($str,0,strlen($str)-1);
        //$a= explode(',',$str);
        //dump($a);die;
        $result=array(
            'role_id'=>$role_id,
            'role_ids'=>$ids,
            'role_path'=>$str,
        );
        if(D('Role')->save($result)){
            $this->success('分配权限成功',U('index'),3);
        }else{
            $this->error('分配权限失败',U('index'),3);
        }
    }
}