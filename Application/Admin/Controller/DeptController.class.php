<?php
namespace Admin\Controller;
//use Think\Controller;
class DeptController extends CommonController {
    //显示部门列表的方法
    public function dlist(){
        $data=D('Dept')->select();
        $data=tree($data);
        $this->assign('dlist',$data);
        $this->display();
    }
    //将获取的部门信息处理成树状数组    
    //部门信息的添加
    public function add(){
        $data=D('Dept')->select();
        $this->assign('dlist',$data);
        $this->display();
    }
    //处理添加部门信息的方法
    public function addOk(){
        $data=D('Dept')->create('',1);
        //print_r($data);
        //exit;
        if(!$data){
            D('Dept')->getError();
        }else{
            if(D('Dept')->add($data)){
                //调用控制器基类的成功或失败处理方法
                $this->success('添加部门成功',U('Main/home'),3);
            }else{
                $this->error('添加部门失败',U('add'),3);
            } 
        }  
    }
    //批量删除的方法
    public function dels(){
        $ids=I('get.ids');
        //dump($ids);
        if(D('Dept')->delete($ids)){
            $this->success('批量删除成功',U('Main/home'),3);
        }else{
            $this->error('批量输出失败',U('dlist'),3);
        }
    }
    //修改部门信息时先进行展示的方法
    public function dshow(){
        $d_id=I('get.dept_id');
        $data=D('Dept')->find($d_id);
        $this->assign('dshow',$data);
        $all_data=D('Dept')->select();
        $this->assign('dlist',$all_data);
        $this->display();
    }
    //删除某个部门信息的方法
    public function ddelete(){
        $d_id=I('get.dept_id');
        //echo "$d_id";exit;
        if(D('Dept')->delete($d_id)){
            $this->success('删除部门成功',U('Main/home'),3);
        }else{
            $this->error('删除部门失败',U('Dept/dlist'),3);
        }
    }
    //处理修改部门所提交的新信息
    public function update(){
        $data=array(
            'dept_id'=>I('post.dept_id',addslashes),
            'dept_name'=>I('post.dept_name',addslashes),//I()方法用来处理前台页面提交的form表单数据
            'dept_pid'=> I('post.dept_pid',addslashes),
            'dept_sort'=>I('post.dept_sort',addslashes),
            'dept_remark'=>I('post.dept_remark',addslashes),
            'dept_ctime'=>date('Y-m-d')
        );
        if(D('Dept')->save($data)!=false){
            $this->success('修改部门信息成功',U('Main/home'),3);
        }else{
            $this->error('修改部门信息失败',U('Dept/dshow','dept_id='.$data['dept_id']),3);
        }
    }
}