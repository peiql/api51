<?php
namespace Admin\Model;
use Think\Model;
class KnowledgeModel extends Model{
    protected $pk='k_id';
    protected $fields=array(
        'k_id','k_title','k_desc','k_content','k_pic','k_smallpic',
        'k_nickname','k_ctime'
    );
    protected $_map=array(
        'title'=>'k_title',
        'desc'=>'k_desc',
        'content'=>'k_content',
        //'nickname'=>'k_nickname'
    );
    protected $_validate=array(
        array('k_title','require','标题不能为空',1,'regex',3),
        array('k_content','require','内容不能为空',1,'regex',3),
    );
    protected $_auto=array(
        array('k_nickname','getNickname',1,'callback'),
        array('k_ctime','ctime',1,'callback')
    );
    function getNickname(){
        return session('nickName');
    }
    function ctime(){
        return date('Y-m-d H:i:s');
    }
    
    
}