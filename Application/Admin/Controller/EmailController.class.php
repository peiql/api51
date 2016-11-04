<?php
namespace Admin\Controller;
class EmailController extends CommonController{
    function index(){
        $this->display();
    }
    function add(){        
        $this->display();
    }
    function getNames(){
        $key_words=I('get.key_words');
        if(!empty($key_words)){
            //$f=fopen('E:\c.txt','w');
            $names=D('User')->where("user_nickname like '%$key_words%'")->select();
            //fwrite($f,$names);
            echo json_encode($names);
        }        
    }
    function addOk(){
        function addOk(){
            $config = array(
                'maxSize'       =>  5242880, //上传的文件大小限制 (0-不做限制)
                'exts'          =>  array(
                    'doc','docx','jpg','png','gif','zip'
                ), //允许上传的文件后缀
                'rootPath'      =>  './Uploads/Email/', //保存根路径
            );
            $upload=new \Think\Upload($config);
            $info=$upload->upload();
            //dump($info);
            if(!$info){
                echo $upload->getError();
            }else{
                $file_path=$config['rootPath'].$info['file']['savepath'].$info['file']['savename'];
            }
            $data=D('Email')->create('',1);
            $data['email_file']=$file_path;
            //dump($data);
            if(D('Doc')->add($data)){
                $this->success('添加公文成功',U('index'),3);
            }else{
                $this->error('添加公文失败',U('index'),3);
            }
        }
    }
}