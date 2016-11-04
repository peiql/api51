<?php
namespace Admin\Model;
use Think\Model;
class DocModel extends Model{
    protected $pk ='doc_id';
    protected $fields =array('doc_id','doc_title','doc_content','doc_nickname','doc_filepath','doc_ctime');
    protected $_map =array(
        'title' => 'doc_title',
        'content' => 'doc_content',
        'nickname' => 'doc_nickname',
        //'filepath'=>'doc_filepath'        
    );
    protected $_validate =array(
        array('doc_title','require','公文标题不能为空',1,'regex',3),
        array('doc_content','require','公文正文不能为空',1,'regex',3)
    );
    protected $_auto =array(
        array('doc_ctime','doc_ctime',1,'callback'),
        array('doc_nickname','nickname',1,'callback')
    );
    function doc_ctime(){
        return date('Y-m-d H:i:s');
    }
    function nickname(){
        return session('nickName');
    }
}