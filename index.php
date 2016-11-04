<?php
header('Content-type:text/html;charset=utf-8');
// 定义应用目录
define('APP_PATH','./Application/');
//开启调试模式,true为调试模式，false为生产模式
define('APP_DEBUG',true);
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单