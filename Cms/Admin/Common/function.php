<?php

/**
     * 验证码验证
     * */
    function checkVerify($code, $id = ""){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    
    /**
     * 当前时间
     * 2015-11-10 20:44:14
     * */
    function getTime(){
        return date("Y-m-d H:i:s",time());
    }
    
    /**
     * 把1,2,3,
     * 截取成
     * 1,2,3
     * */
    function cutPermissionStr($str){
        if(eregi(',$',$str)){
            return substr($str, 0,strlen($str)-1);
        }
        return $str;
    }

    /**
     * 权限控制
     * 
     *  1   管理员管理       adminmanage

        2   角色管理            rolemanage

        3   栏目管理           columnmanage

        4   内容                  content
     * */
    function access($fm){
        if(!isset($_SESSION['login'])){
            return false;
        }
//         var_dump(contants('1,2', '13'));
//         var_dump($_SESSION['login']);
        $permission = $_SESSION['login']['role']['permission'];
        
        if($fm==C('FM_admin')){//管理员管理
            return contants($permission, '1');
        }else if($fm==C('FM_role')){//角色管理
            return contants($permission, '2');
        }else if($fm==C('FM_column')){//栏目管理
            return contants($permission, '3');
        }else if($fm==C('FM_content')){//内容
            return contants($permission, '4');
        }
        return true;
    }
    
    /**
     * 判断一个字符串中是否包含另一个字符串
     * */
    function contants($str,$a){
        if(strpos($str,$a) !== false){
            return true;
        }
        return false;
    }
    
//     /**
//      * 无限级分类
//      * */
    function getTree(&$data,$pid = 0,$count = 0) {
        if(!isset($data['old'])){
            $data=array('new'=>array(),'old'=>$data);
        }
        foreach ($data['old'] as $k => $v){
            if($v['parentid']==$pid){
                $v['count'] = $count;
                $data['new'][]=$v;
                unset($data['odl'][$k]);
                getTree($data,$v['id'],$count+1);
            } 
        }
        return $data['new'] ;
    }
    
    