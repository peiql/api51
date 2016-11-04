<?php
namespace Admin\Controller;
use Think\Controller;
class DocController extends Controller{
    //上传页面展示
    function add(){
        $this->display();
    }
    //主页面展示
    function index(){
        $data=D('Doc')->select();
        $this->assign('data',$data);
        $this->display();
    }
    //添加数据的处理程序    
    function addOk(){
        $config = array(
            'maxSize'       =>  5242880, //上传的文件大小限制 (0-不做限制)
            'exts'          =>  array(
                'doc','docx','jpg','png','gif'
            ), //允许上传的文件后缀
            'rootPath'      =>  './Uploads/', //保存根路径
        );
        $upload=new \Think\Upload($config);
        $info=$upload->upload();
        //dump($info);
        if(!$info){
            echo $upload->getError();
        }else{
            $file_path=$config['rootPath'].$info['file']['savepath'].$info['file']['savename'];
        }
        $data=D('Doc')->create('',1);        
        $data['doc_filepath']=$file_path;
        //dump($data);
        if(D('Doc')->add($data)){
            $this->success('添加公文成功',U('index'),3);
        }else{
            $this->error('添加公文失败',U('index'),3);
        }
    }
    //文本域上传图片的处理程序
    function upfile(){
        //$f=fopen('E:\a.txt','w');
        $config = array(
            'maxSize'       =>  5242880, //上传的文件大小限制 (0-不做限制)
            'exts'          =>  array(
                'doc','docx','jpg','png','gif'
            ), //允许上传的文件后缀
            'rootPath'      =>  './Uploads/images/', //保存根路径
        );
        $upload=new \Think\Upload($config);
        $info=$upload->upload();
        //dump($info);
        if(!$info){
            echo $upload->getError();
        }else{
            //fwrite($f,serialize($info));
            $result = array();
            $result['url'] = $info['upfile']['savepath'].$info['upfile']['savename'];
            $result['state'] = "SUCCESS";
            echo json_encode($result);
        }                
    }
    //前台点击下载附件后触发的后台处理程序
    function download(){
        $id=I('get.id');
        $data=D('doc')->field('doc_filepath')->find($id);
        $filepath=$data['doc_filepath'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header("Content-Length: ". filesize($filepath));
        readfile($filepath);        
    }
    //前台点击查看全文，触发的后台处理程序
    function getContent(){
        $id=I('get.id');
        $data=D('doc')->field('doc_title,doc_content')->find($id);
        $data['doc_content']=htmlspecialchars_decode($data['doc_content']);
        echo json_encode($data);
    }
    //点击删除，执行的后台操作
    function del(){
        $id=I('get.id');
        //echo $id;die();
        $data=D('doc')->field('doc_filepath')->find($id);
        $filepath=$data['doc_filepath'];
        if(!empty($filepath)){
            unlink($filepath);
        }
        $result=D('doc')->delete($id);
        if($result){
            $this->success('删除公文成功',U('index'),3);
        }else{
            $this->error('删除公文失败',U('index'),3);
        }
    }
}