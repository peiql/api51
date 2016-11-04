<?php
namespace Admin\model;
use Think\Model;
class EmailModel extends Model{
    protected $pk='email_id';
    protected $fields=array('email_id','email_tonickname','email_title',
        'email_content','email_file','email_fromnickname','email_ctime');
    protected $_map=array(
        'tonickname'=>'eamil_tonickname',
        'title'=>'email_title',
        'content'=>'email_content',
        'file'=>'email_file',
    );
    protected $_validate=array(
        array('email_tonickname','require','收件人不能为空',1,'regex',3),
        array('email_title','require','邮件标题不能为空',1,'regex',3),
        array('email_content','require','邮件内容不能为空',1,'regex',3),
    );
    protected $_auto=array(
        array('email_fromnicname','nickname',1,'function'),
        array('email_ctime','setNowTime',1,'function')  
    );
}