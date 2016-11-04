<?php
//声明命名空间
namespace Admin\Model;
//引入Think核心model基类
use Think\Model;
//声明DeptModel类
class DeptModel extends Model{
    // 主键名称
    protected $pk               =   'dept_id';
    // 字段信息
    protected $fields           =   array('dept_id','dept_name','dept_pid','dept_sort','dept_remark','dept_ctime');
    // 字段映射定义
    protected $_map             =   array(
        //'id'=>'dept_id',
        'name'=>'dept_name',
        'pid'=>'dept_pid',
        'sort'=>'dept_sort',
        'remark'=>'dept_remark',
        //'ctime'=>'dept_ctime'
    );
    // 自动完成定义
    protected $_auto            =   array(
        //setNow为在function.php中定义好的设置现在时间的方法
        // 1 为只在新增数据时自动添加
        array('dept_ctime','setNow',1,'function')
    ); 
}