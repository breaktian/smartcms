<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 登陆页
 * */
class LoginController extends Controller{
    
    
    public function index(){
//         $this->show("登陆页");

        $this->display();
        
    }
    
    /**
     * 验证码
     * */
    public function verify(){
        $config = array(  
          'fontSize'    =>    20,    // 验证码字体大小   
          'length'      =>    4,     // 验证码位数    
          'useNoise'    =>    false, // 关闭验证码杂点
          );
          
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }
    
    public function login(){
        header("Content-type:text/html;charset=utf-8");
        //验证码验证
        $code = $_POST['verify'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        if(!checkVerify($code)){
            $this->error("验证码错误");
            return;
        }
//         else{
//             $this->redirect('Index/index', array('status'=>1));
//             return;
//         }
        
        //验证用户名和密码
        $Admin = M('Admin');
        $admin = $Admin->where("username='".$name."' AND password='".md5($pass)."'")->find();
        
        if($admin){
            //更新登录时间和次数
            $Admin = M('Admin');
            $Admin->where('id='.$admin['id'])->setInc('logincount',1);
            $Admin->where('id='.$admin['id'])->setField('logintime',getTime());
            $_SESSION['login'] = $Admin->where("username='".$name."' AND password='".md5($pass)."'")->find();;
            $Role = M('Role');
            $role = $Role->where('id='.$_SESSION['login']['roleid'])->find();
            $_SESSION['login']['role'] = $role;
            $this->redirect('Index/index');
        }else{
            $this->error("账号或密码错误");
        }
        
    }
    
    
//     public function test(){
//         header("Content-type:text/html;charset=utf-8");
//         $User = M('User');
// //         $User = new \Admin\Model\UserModel();
// //         var_dump($User->select());
//         var_dump($_POST);
//         $data = $User->create();
//         var_dump($data);
       
        
//     }
    
    
}
