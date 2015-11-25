<?php
namespace Admin\Model;
use Think\Model;

class ContentModel extends Model {

    public function __construct(){
        parent::__construct();
//         echo "\admin";
    }

    /**
     * table
     * */
    protected $tableName = 'content';

    
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
        array('title','require','标题不得为空'),
        array('title', '1,60', '标题不能大于500个字符', 3,'length'),
        
    );
    
    /**
     * 自动完成
     * array(完成字段1,完成规则,[完成时间,附加规则]),
     * 完成时间
     * self::MODEL_INSERT或者1 新增数据的时候处理（默认） 
     * self::MODEL_UPDATE或者2 更新数据的时候处理 
     * self::MODEL_BOTH或者3 所有情况都进行处理 
     * */
    protected $_auto = array(
        
        array('addtime','getTime',self::MODEL_BOTH,'function'),//自动添加当前时间
        
        
    );

}