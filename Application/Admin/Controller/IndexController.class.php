<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function login(){        
        $this->display();
    }
    public function verify(){
        //构建Verify对象
         $config =	array(            
            'fontSize'  =>  14,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'imageH'    =>  38,               // 验证码图片高度
            'imageW'    =>  70,               // 验证码图片宽度
            'length'    =>  5,               // 验证码位数
            'fontttf'   =>  '1.ttf',              // 验证码字体，不设置随机获取
            'bg'        =>  array(93, 202, 27),  // 背景颜色
            'reset'     =>  true,           // 验证成功后是否重置
        );
        $v=new \Think\Verify($config);
        $v->entry();        
    }
    public function checkLogin(){
        $code=I('post.code');
        //echo $code;die();        
        $v=new \Think\Verify();
        if(!$v->check($code)){
            $this->error('验证码不正确',U('login'),3);
        }
        $name=I('post.name');
        $passwd=I('post.passwd');
        if(D('User')->checkLogin($name,$passwd)){            
            $this->success('登陆成功',U('Main/index'),3);
        }else{
            $this->error('用户名或密码错误',U('login'),3);
        }
    }
}