<?php
namespace Admin\Model;
use Think\Model;

class ColumnClassModel extends Model {

    public function __construct(){
        parent::__construct();
//         echo "\admin";
    }

    /**
     * table
     * */
    protected $tableName = 'column_class';

    
   

}