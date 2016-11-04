<?php
namespace Admin\Controller;
//use Think\Controller;
//use Think\Page;
class UserController extends CommonController{
    function index(){
        //$page=I('get.p');
        $page=1;
        $pagesize=2;
        $data=D('User')->alias('u')
        ->page($page,$pagesize)
        ->field('u.*,d.dept_id,d.dept_name')
        ->join('left join oa_dept d on u.user_deptid = d.dept_id')
        ->select();
        $this->assign('pagesize',$pagesize);
        $this->assign('ulist',$data);
        $count=D('User')->count();
        $this->assign('count',$count);
        $this->display();
    }
    function getContent(){
        $page=I('get.page',1);
        //echo $page;
        //exit;
        $pagesize=2;
        $data=D('User')->alias('u')
        ->page($page,$pagesize)
        ->field('u.*,d.dept_id,d.dept_name')
        ->join('left join oa_dept d on u.user_deptid = d.dept_id')
        ->select();
        //echo json_encode($data);
        $this->assign('ulist',$data);
        $this->display();
    }
    function add(){
        $data=D('Dept')
                ->field('dept_id,dept_name')
                ->select();
        $this->assign('dlist',$data);
        $this->display();
    }
    function addOk(){
        //$data=I('post.name');
        $data=D('User')->create('',1);
        //dump($data);
        if(!$data){
            echo D('User')->getError();            
        }else{
            if(D('User')->add($data)){
                //调用控制器基类的成功或失败处理方法
                $this->success('添加用户成功',U('index'),3);
            }else{
                $this->error('添加用户失败',U('add'),3);
            } 
        }  
    }
    function charts(){
        $data=D('User')->alias('u')
                ->field('d.dept_name,count(*) num')
                ->join('left join oa_dept d on u.user_deptid = d.dept_id')
                ->group('user_deptid')
                ->select();
        //dump($data);
        $result="";
        foreach($data as $value){
            $result.="['".$value['dept_name']."',".$value['num']."],";
        }
        //dump($result);
        $this->assign('data',$result);
        $this->display();
    }
}