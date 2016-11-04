<?php
namespace Admin\Controller;
class KnowledgeController extends CommonController{
    function index(){
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addOk(){
        $k=D('Knowledge');
        $data=$k->create();
        if(!$data){
            $k->getError();
        }else{
            $data['k_pic']=I('post.pic');
            //echo $data['k_pic'];die;
            $data['k_smallpic']=I('post.smallpic');
            $result=D('Knowledge')->add($data);
            if($result){
                $this->success('添加知识成功',U('index'),3);
            }else{
                $this->error('添加知识失败',U('add'),3);
            }  
        }
        
    } 
    function upfile(){
        $f=fopen('E:\c.txt','w');
        //fwrite($f,'456');
        $config = array(
            'maxSize'       =>  5242880, //上传的文件大小限制 (0-不做限制)
            'exts'          =>  array(
                'doc','docx','jpg','png','gif'
            ), //允许上传的文件后缀
            'rootPath'      =>  './Uploads/', //保存根路径
        );
        $upload=new \Think\Upload($config);
        $info=$upload->upload();
        if(!$info){
            echo $upload->getError();
           //fwrite($f,'234');
        }else{
           $path='./Uploads/'.$info['Filedata']['savepath'].$info['Filedata']['savename'];
           $t=new   \Think\Image();
           $t->open($path);
           //fwrite($f,serialize($path));
           $width=$t->width();
           $height=$t->height();
           $t->thumb($width * 0.3,$height * 0.3);
           $thumb_path='./Uploads/'.$info['Filedata']['savepath'].'small_'.$info['Filedata']['savename'];
           $t->save($thumb_path);
           $data=array();
           $data['pic']=$path;
           $data['smallpic'] =$thumb_path;
           echo json_encode($data);
        }
    }
}