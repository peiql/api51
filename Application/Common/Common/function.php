<?php
//use Admin\Model;
    //将当前的无限分类数据处理成梳妆结构
 function tree($arr,$param=0,$level=0){
    static $result=array();
    foreach($arr as $value){
        if($value['dept_pid']==$param){
            //根据当前的dept_id查询其对应的dept_name
            $arr1=D('Dept')->select($value['dept_pid']);
            //dump($arr1[0]);
            //将查询到的dept_name压入$value数组中
            $value['dept_pname']=$arr1[0]['dept_name'];
            $value['dept_level']=$level;
            $result[]=$value;
            tree($arr,$value['dept_id'],$level+1);
        }
    }
    return $result;
}
function getTree($arr,$param=0){
    static $result=array();
    foreach($arr as $value){
        if($value['node_pid']==$param){
            //根据当前的dept_id查询其对应的dept_name
            $arr1=D('Node')->select($value['node_pid']);
            //dump($arr1[0]);
            //将查询到的dept_name压入$value数组中
            /* $value['dept_pname']=$arr1[0]['dept_name'];
            $value['dept_level']=$level; */
            $result[]=$value;
            getTree($arr,$value['node_id']);
        }
    }
    return $result;
}
    //设置当前时间，格式为：2016-10-16
    function setNow(){
        return date('Y-m-d');
    }
    //获取当前登录用户的昵称
    function nickname(){
        return session('nickName');
    }
    //设置当前时间，格式为：2016-10-16 13:20:30
    function setNowTime(){
        return date('Y-m-d H:i:s');
    }
  