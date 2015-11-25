<?php
namespace Admin\Model;
use Think\Model;

class PermissionModel extends Model {

    public function __construct(){
        parent::__construct();
//         echo "\admin";
    }

    protected $tableName = 'permission';


}