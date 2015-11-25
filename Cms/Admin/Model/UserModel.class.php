<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model {   

    public function __construct(){
        parent::__construct();
        echo "\admin";
    }
    
    protected $tableName = 'user'; 
    

}