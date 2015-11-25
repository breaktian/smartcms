<?php
namespace Admin\Model;
use Think\Model;

class RoleModel extends Model {

    public function __construct(){
        parent::__construct();
//         echo "\admin";
    }

    /**
     * table
     * */
    protected $tableName = 'role';

    
    /**
     * 自动验证
     * 验证条件
     * self::EXISTS_VALIDATE 或者0 存在字段就验证（默认） 
     * self::MUST_VALIDATE 或者1 必须验证 
     * self::VALUE_VALIDATE或者2 值不为空的时候验证 
     * 验证时间
     * self::MODEL_INSERT或者1新增数据时候验证 
     * self::MODEL_UPDATE或者2编辑数据时候验证 
     * self::MODEL_BOTH或者3全部情况下验证（默认） 
     * 
     * array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
     * */
    protected $_validate = array(
        array('name','require','角色名称不得为空'),
        array('name', '', '角色名称已存在！',self::EXISTS_VALIDATE,'unique',self::MODEL_INSERT),
        array('name', '1,40', '角色名称不能大于40个字符', 3,'length'),
        array('permission','require','权限不得为空',self::EXISTS_VALIDATE,'',self::MODEL_INSERT),
        
    );
    
    /**
     * 自动完成
     * */
    protected $_auto = array(
        
//         array('permission','cutPermissionStr',self::MODEL_BOTH,'function'),
        array('createtime','getTime',self::MODEL_BOTH,'function'),//自动添加当前时间
        
    );

}