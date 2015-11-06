<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台首页
 * */
class IndexController extends Controller {
    
    /**
     * 后台首页
     * */
    public function index(){
	   $this->display();
    }
    
    /**
     * 后台首页top
     * */
    public function top(){
        
        $value = '蜡笔小新';
        $this->assign('name',$value);
        $this->display();
    }
    
    /**
     * 后台首页sidebar
     * */
    public function sidebar(){
        $this->display();
    }
    
    /**
     * 后台首页main
     * */
    public function main(){
        $data['php_os'] = PHP_OS;
        $data['remote_addr'] = $_SERVER['REMOTE_ADDR'];
        $data['server_software'] = $_SERVER['SERVER_SOFTWARE'];
        $data['sql_version'] = mysql_get_server_info();
        $this->assign('data', $data);
        $this->display();
    }
    
    /**
     * 管理员管理
     * */
    public function admin(){
        $this->display();
    }
    
    /**
     * 新增管理员
     * */
    public function addAdmin(){
        $this->display();
    }
    
    /**
     * 角色管理
     * */
    public function role(){
        echo "角色管理";
    }
    
    /**
     * 分类管理
     * */
    public function category(){
        echo "分类管理";
    }
    
    
    /**
     * 注销登录
     * */
    public function logout(){
        $this->show('注销登录，跳转到登陆页','utf-8');
        
    }
    
    
}