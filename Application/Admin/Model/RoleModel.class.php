<?php
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model{
    protected $pk='role_id';
    protected $fields=array(
        'role_id','role_name','role_ids','role_path'
    );
    protected $_map=array(
        'id'=>'role_id',
        'name'=>'role_name',
        'ids'=>'role_ids',
        'path'=>'role_path'
    );
    protected $_validate=array(
        array('role_name','require','角色名字不能为空',1,'regex',1),
    );
}