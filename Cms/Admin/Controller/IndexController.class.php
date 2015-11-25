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
        if(!access()){
            $this->error(C('access_error'));
            return;
        }
        
	   $this->display();
    }
    
    /**
     * 后台首页top
     * 
     * 4   内容                  content
     * */
    public function top(){
        if(!access()){
            $this->error(C('access_error'));
            return;
        }
        
        $permission = $_SESSION['login']['role']['permission'];
        if($_SESSION['login']['id']=='0'){
            $data['content'] = 1;
        }else{
            if(contants($permission,'4')){
                $data['content'] = 1;
            }else{
                $data['content'] = 0;
            }
        }
        
        $this->assign('data',$data);
        $this->assign('name',$_SESSION['login']['username']);
        
        
        $this->display();
        
        
    }
    
    /**
     * 后台首页sidebar
     * 
     *  1   管理员管理       adminmanage

        2   角色管理            rolemanage

        3   栏目管理           columnmanage
     * */
    public function sidebar(){
        if(!access()){
            $this->error(C('access_error'));
            return;
        }
        
        $permission = $_SESSION['login']['role']['permission'];
//         var_dump($permission);
//         var_dump(contants($permission,'3'));
        if($_SESSION['login']['id']=='0'){
            $data['admin'] = 1;
            $data['role'] = 1;
            $data['column'] = 1;
        }else{
            if(contants($permission,'1')){
                $data['admin'] = 1;
            }else{
                $data['admin'] = 0;
            }
                
            if(contants($permission,'2')){
                $data['role'] = 1;
            }else{
                $data['role'] = 0;
            }
                
            if(contants($permission,'3')){
                $data['column'] = 1;
            }else{
                $data['column'] = 0;
            }
        }
        
        $this->assign("data",$data);
        
        $this->display();
    }
    
    /**
     * 后台首页main
     * */
    public function main(){
        if(!access()){
            $this->error(C('access_error'));
            return;
        }
        
        $data['logintime'] = $_SESSION['login']['logintime'];
        $data['logincount'] = $_SESSION['login']['logincount'];
        $Role = M('Role');
        $role = $Role->where('id='.$_SESSION['login']['roleid'])->getField('name');
        $data['role'] = $role;
        if($_SESSION['login']['id']==0){
            $data['role'] = "超级管理员";
        }
        
        
        $data['php_os'] = PHP_OS;
        $data['remote_addr'] = $_SERVER['REMOTE_ADDR'];
        $data['server_software'] = $_SERVER['SERVER_SOFTWARE'];
        $data['sql_version'] = mysql_get_server_info();
        
//         var_dump($_SESSION['login']);
//         var_dump($data);
        $this->assign('data', $data);
        $this->display();
        
        
    }
    
    /**
     * 修改密码
     * */
    public function modPass(){
        if(!access()){
            $this->error(C('access_error'));
            return;
        }
        
        
        $this->display();
        
    }
    
    /**
     * 修改密码
     * post提交
     * */
    public function modPassPost(){
        if(!access()){
            $this->error(C('access_error'));
            return;
        }
        
        if(empty($_POST['oldpassword'])){
            $this->error('原密码不得为空');
            return;
        }
        if(empty($_POST['newpassword'])){
            $this->error('新密码不得为空');
            return;
        }
        
        //验证用户名和密码
        $name = $_SESSION['login']['username'];
        $pass = $_POST['oldpassword'];
        $Admin = D('Admin');
        $admin = $Admin->where("username='".$name."' AND password='".md5($pass)."'")->find();
        if($admin){
            $admin['password'] = $_POST['newpassword'];
//             var_dump($admin);
            if($Admin->create($admin)){
                if($Admin->save()){
                    $this->success('修改密码成功',U('Index/main'));
                }else{
                    $this->error('修改密码失败');
                }
            }else{
                $this->error($Admin->getError());
            }
        }else{
            $this->error('原密码不正确');
        }
        
    }
    
    
    /**
     * 管理员管理
     * */
    public function admin(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_admin'))){
            $this->error(C('access_error'));
            return;
        }
        $Admin = M('Admin');
        $Role = M('Role');
        $admins = $Admin->where('id!=0')->select();
        
        
        $len = count($admins);
        for ($i=0;$i<$len;$i++){
            $roleid = $admins[$i]['roleid'];
            $admins[$i]['role'] = $Role->where('id='.$roleid)->field('id,name')->find();
        }
//         var_dump($admins);
        
        $this->assign("admins",$admins);
        
        $this->display();
    }
    
    /**
     * 新增管理员
     * */
    public function addAdmin(){
        if(!access(C('FM_admin'))){
            $this->error(C('access_error'));
            return;
        }
        $Role = M('Role');
        $roles = $Role->getField("id,name");
        $this->assign('roles',$roles);
        $this->display();
    }
    
    /**
     * 修改管理员
     * */
    public function modAdmin(){
        if(!access(C('FM_admin'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_GET['id'];
        $Admin = M('Admin');
        $Role = M('Role');
        $admin = $Admin->where('id='.$id)->field('id,username,roleid')->find();
//         var_dump($admin);
        
        $roles = $Role->field('id,name')->select();
        
        $len = count($roles);
        for($i=0;$i<$len;$i++){
            if($roles[$i]['id'] == $admin['roleid']){
                $roles[$i]['select'] = 1;
            }else{
                $roles[$i]['select'] = 0;
            }
        }
        
//         var_dump($roles);
        
        $this->assign("admin",$admin);
        $this->assign("roles",$roles);
        $this->display();
    }
    
    /**
     * 修改管理员
     * 接收post请求
     * */
    public function modAdminPost(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_admin'))){
            $this->error(C('access_error'));
            return;
        }
        $Admin = D('Admin');
        
        if($Admin->create()){
            if(empty($_POST['password'])){//没有修改密码
                unset($_POST['password']);
                if($Admin->save($_POST)){
                    $this->success('修改管理员成功',U('Index/admin'));
                }else{
                    $this->error('修改管理员失败');
                }
            }else{
                if($Admin->save()){
                    $this->success('修改管理员成功',U('Index/admin'));
                }else{
                    $this->error('修改管理员失败');
                }
            }
        }else{
            $this->error($Admin->getError());
        }
        
    }
    
    /**
     * 删除管理员
     * */
    public function delAdmin(){
        if(!access(C('FM_admin'))){
            $this->error(C('access_error'));
            return;
        }
        $id =  $_GET['id'];
        //        echo $id;
        $Admin = M('Admin');
        if($Admin->where('id='.$id)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
             
        }
    }
    
    
    /**
     * 新增管理员
     * 接收post请求
     * */
    public function addAdminPost(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_admin'))){
            $this->error(C('access_error'));
            return;
        }
//         var_dump($_POST);
        $Admin = D('Admin');//管理员表
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['roleid'] = $_POST['roleid'];
        
        
        if($Admin->create($data)){
            if($Admin->add()){
                $this->success('新增管理员成功',U('Index/admin'));
            }
        }else{
            $this->error($Admin->getError());
        }
        
        
    }
    
    
    
    /**
     * 角色管理
     * */
    public function role(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_role'))){
            $this->error(C('access_error'));
            return;
        }
        $Permission = M('Permission');//权限表
        $Role = M('Role');//角色表
        $data = $Role->select();
        $len = count($data);
        for ($i=0;$i<$len;$i++){
           if(empty($data[$i]['permission'])){
               continue;
           }
           $permissionArr = explode(',',$data[$i]['permission']);
//            var_dump($permissionArr);
           $l = count($permissionArr);
           unset($per);
           for ($j=0;$j<$l;$j++){
               $per[$j] = $Permission->where('id='.$permissionArr[$j])->select();
           }
           $data[$i]['permission'] = $per;
        }
//         print_r($data);
        $this->assign('data',$data);
        
        $this->display();
    }
    
    /**
     * 新增角色
     * */
    public function addRole(){
        if(!access(C('FM_role'))){
            $this->error(C('access_error'));
            return;
        }
        $Permission = M('Permission');
        $this->assign('permission',$Permission->select());
        
        $this->display();
    }
    
    /**
     * 修改角色
     * */
    public function modRole(){
        if(!access(C('FM_role'))){
            $this->error(C('access_error'));
            return;
        }
        $id =  $_GET['id'];
        $Role = M('Role');//角色表
        $Permission = M('Permission');//权限表
        
        $data = $Role->where('id='.$id)->select();
//         var_dump($data);
        $permissionSelect = explode(',',$data[0]['permission']);
//         var_dump($permissionArr);
//         $l = count($permissionArr);
//         for ($j=0;$j<$l;$j++){
//             $per[$j] = $permission->where('id='.$permissionArr[$j])->select();
//         }
//         var_dump($per);
        $permissions = $Permission->select();
//         var_dump($permissions);
        $len = count($permissions);
        for ($j=0;$j<$len;$j++){
            $roleId = $permissions[$j]['id'];
            if(in_array($roleId, $permissionSelect)){
                $permissions[$j]['select'] = 1;
            }else{
                $permissions[$j]['select'] = 0;
            }
        }
//         var_dump($permissions);
        
        $this->assign("rolename",$data[0]['name']);
        $this->assign("id",$data[0]['id']);
        $this->assign("permission",$permissions);
        
        
        $this->display();
    }
    
    /**
     * 删除角色
     * */
    public function delRole(){
        if(!access(C('FM_role'))){
            $this->error(C('access_error'));
            return;
        }
       $id =  $_GET['id'];
//        echo $id;
       $Role = M('Role');
       if($Role->where('id='.$id)->delete()){
           $this->success('删除成功');
       }else{
           $this->error('删除失败');
           
       }
       
    }
    
    
    /**
     * 新增角色
     * 接收post请求
     * */
    public function addRolePost(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_role'))){
            $this->error(C('access_error'));
            return;
        }
        $Permission = M('Permission');
        $enname = $Permission->getField('enname',true);
        $strPermissions = '';
        foreach ($enname as $value){
            if(isset($_POST[$value])){
                $strPermissions.=$_POST[$value].',';
            }
        }
        $strPermissions = cutPermissionStr($strPermissions);
        $data['name'] = $_POST['rolename'];
        $data['permission'] = $strPermissions;
        
        
        //添加到数据库中
        $Role = D('Role');
        if($Role->create($data)){
            if($Role->add()){
                $this->success('新增角色成功',U('Index/role'));
            }
        }else{
            //输出错误信息
             $this->error($Role->getError());
        }
        
//         var_dump($_POST);
//         var_dump($data);
    }
    
    /**
     * 修改角色
     * 接收post请求
     * */
    public function modRolePost(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_role'))){
            $this->error(C('access_error'));
            return;
        }
        $Permission = M('Permission');
        $enname = $Permission->getField('enname',true);
        $strPermissions = '';
        foreach ($enname as $value){
            if(isset($_POST[$value])){
                $strPermissions.=$_POST[$value].',';
            }
        }
        $strPermissions = cutPermissionStr($strPermissions);
        
        $id = $_POST['id'];
        $data['id'] = $id;
        $data['name'] = $_POST['rolename'];
        $data['permission'] = $strPermissions;
        
//         var_dump($data);
        //添加到数据库中
        $Role = D('Role');
        if($Role->create($data)){
            if($Role->save()){
                $this->success('修改角色成功',U('Index/role'));
            }else{
                $this->error($Role->getError());
            }
        }else{
            //输出错误信息
             $this->error($Role->getError());
        }
        
//         var_dump($_POST);
//         var_dump($data);
    }
    
    
    /**
     * 栏目管理
     * */
    public function column(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_column'))){
            $this->error(C('access_error'));
            return;
        }
        $ColumnClass = M('ColumnClass');
        $Column = M('Column');
        $columns = $Column->select();
        
        $len = count($columns);
        for($i=0;$i<$len;$i++){
            $class = $columns[$i]['class'];
            $columns[$i]['class'] = $ColumnClass->where('id='.$class)->find();
        }
        
//         var_dump(getTree($columns));
        $this->assign('columns',getTree($columns));
        
        $this->display();
        
        
    }
    
    /**
     * 新增栏目
     * */
    public function addColumn(){
        if(!access(C('FM_column'))){
            $this->error(C('access_error'));
            return;
        }
        $ColumnClass = M('ColumnClass');
        $Column = M('Column');
        
        $columnClass = $ColumnClass->select();
        
        $columns = $Column->field('id,name,parentid,class,sort')->select();
        
    
        
        $this->assign('class',$columnClass);
        $this->assign('columns',getTree($columns));
        
        $this->display();
        
    }
    
    /**
     * 新增栏目
     * 接收post
     * */
    public function addColumnPost(){
        if(!access(C('FM_column'))){
            $this->error(C('access_error'));
            return;
        }
        $Column = D('Column');
        
        if($Column->create()){
            if($Column->add()){
                $this->success('栏目新增成功',U('Index/column'));
            }else{
                $this->error('栏目新增失败');
            }
        }else{
                $this->error($Column->getError());
        }
        
    }
    
    /**
     * 删除栏目
     * */
    public function delColumn(){
        if(!access(C('FM_column'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_GET['id'];
        $Column = M('Column');
        if($Column->where('id='.$id)->delete()){
           $this->success('删除成功');
       }else{
           $this->error('删除失败');
           
       }
    }
    
    /**
     * 修改栏目
     * */
    public function modColumn(){
        if(!access(C('FM_column'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_GET['id'];
        $ColumnClass = M('ColumnClass');
        $Column = M('Column');
        $column = $Column->where('id='.$id)->find();
        $column['class'] = $ColumnClass->where('id='.$column['class'])->find();
        
        $columns = $Column->field('id,name,parentid,class,sort')->select();
        
        foreach ($columns as $key=>$v){
            if($v['id']==$column['parentid']){
                $columns[$key]['select'] = 1;
            }else{
                $columns[$key]['select'] = 0;
            }
        }
        
        $class = $ColumnClass->select();
//         foreach ($class as $k=>$v){
//             if($v['id']==$column['class']['id']){
//                 $class['select'] = 1;
//             }else{
//                 $class['select'] = 0;
//             }
//         }
        
//         var_dump($class);
//         var_dump($column);
//         var_dump($columns);
        $this->assign('column',$column);
        $this->assign('columns',getTree($columns));
        $this->assign('class',$class);
        
        $this->display();
        
    }
    
    /**
     * 修改栏目
     * 接收post
     * */
    public function modColumnPost(){
        if(!access(C('FM_column'))){
            $this->error(C('access_error'));
            return;
        }
        $Column = D('Column');
        if($Column->create()){
            if($Column->save()){
                $this->success('修改成功',U('Index/column'));
            }else{
                $this->error('修改失败');
            }
        }else{
            $this->error($Column->getError());
        }
        
    }
    
    
    /**
     * 注销登录
     * */
    public function logout(){
        unset($_SESSION['login']);//注销登录信息
//         print_r($_SESSION);
        $this->redirect('Login/index');
        
    }
    

    
    
}