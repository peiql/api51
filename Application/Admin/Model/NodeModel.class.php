<?php
namespace Admin\Model;
use Think\Model;
class NodeModel extends Model{
    protected $pk='node_id';
    protected $fields=array(
        'node_id','node_name','node_title','node_pid','node_module',
        'node_controller','node_action','node_path','node_level','node_sort','node_show'
    );
    protected $_map=array(
        'name'=>'node_name',
        'title'=>'node_title',
        'pid'=>'node_pid',
        'module'=>'node_module',
        'controller'=>'node_controller',
        'action'=>'node_action',
        'path'=>'node_path',
        'level'=>'node_level',
        'sort'=>'node_sort',
        'show'=>'node_show'
    );
    protected $_validate=array(
        array('node_name','require','节点名不能为空',1,'regex',3),
        array('pid','require','父级节点不能为空',1,'regex',3)
    );
    protected $_auto=array(
        
    );
}