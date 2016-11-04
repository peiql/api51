<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    // 主键名称
    protected $pk               =   'user_id';
    // 字段信息
    protected $fields           =   array('user_id','user_name','user_nickname','user_passwd','user_deptid','user_sex','user_email','user_tel','user_birthday','user_ctime');
    // 字段映射定义
    protected $_map             =   array(
        //'id'=>'user_id',
        'name'=>'user_name',
        'nickname'=>'user_nickname',
        'passwd'=>'user_passwd',
        'deptid'=>'user_deptid',
        'sex'=>'user_sex',
        'email'=>'user_email',
        'tel'=>'user_tel',
        'birthday'=>'user_birthday'
    );
    // 自动验证定义
    protected $_validate        =   array(
        array('user_name','checkname','用户名不符合规范',1,'regex',3),        
        array('user_passwd','pwd','密码不符合规范，必须为以小写字母开头包含数字的8-12位',2,'regex',3),
        array('re_passwd','user_passwd','与输入的密码不一致',2,'confirm',3),
        array('user_nickname','require','昵称不符合规范',1,'regex',3),        
        array('user_deptid','checkDeptid','无该部门',1,'callback',3),
        array('user_sex','checkSex','所选性别不是人类的性别',1,'callback',3),
        array('user_tel','checktel','手机号不符合规范',1,'regex',3),
        array('user_email','email','邮箱不符合规范',1,'regex',3)
        //array('user_birthday','checkname','用户名不符合规范',1,'regex',3),
    );
    //检查所选学院是否为该学校拥有的
    function checkDeptid($deptid){
        $data=D('Dept')->field('dept_id')->select();
        //echo $deptid;
        $arr=array();
        foreach($data as $value){
            $arr[]=$value['dept_id'];
        }
        //dump($arr);
        return in_array($deptid,$arr);
    }
    //检查所选性别是否符合规范
    function checkSex($sex){
        $arr=array('男','女');
        return in_array($sex,$arr);
    }  
    // 自动完成定义
    protected $_auto            =   array(
        //setNow为在function.php中定义好的设置现在时间的方法
        // 1 为只在新增数据时自动添加
        array('user_ctime','setNow',1,'function'),
        array('user_passwd','md5',3,'function')
    );
    function checkLogin($name,$passwd){
        $data=$this->where("user_name='$name'")
                    ->find();
        if(!empty($data)){
            if($data['user_passwd']==md5($passwd)){
                session('id',$data['user_id']);
                session('name',$data['user_name']);
                session('nickName',$data['user_nickname']);
                session('deptid',$data['user_deptid']);
                session('role_id',$data['user_roleid']);
                $role_data=D('Role')->field('role_path')->find($data['user_roleid']);
                $role_path=$role_data['role_path'];
                session('role_path',$role_path);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}