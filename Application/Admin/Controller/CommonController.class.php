<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    /*public function _initialize(){
        if(!session('?id')){
            //echo "ok";die();
            $this->error('请先登录，再进行操作',U('Index/login'),3);
        }
        $role_path=session('role_path');
        //echo $role_path;die;
        $path_arr=explode(',', $role_path);
        $now_path=MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME;
         //echo $now_path."<br />";
         //echo $role_path;
        //echo "<pre>";
        //dump($path_arr);die;  
        if(!in_array($now_path,$path_arr)){
            //echo "不在";die;
            $this->error('当前账号没有权限访问该处，请重新登录后访问',U('Index/login'),3);
        }   
    }*/
}