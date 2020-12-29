<?php     
    namespace PHPMVC\Models;
    class EmployeeModel  extends AbstractModel{
        public $name ;
        public $age ;
        public $address;
        public $tax ;
        public $salary;
        public  $id;

        public static $tableName = 'emp';
        protected static $primaryKey = 'id';

        protected static $tableSchema = array(
            'name'      =>self:: DATA_TYPE_STRING,
            'age'       =>self::DATA_TYPE_INT,
            'address'   =>self::DATA_TYPE_STRING,
            'tax'       =>self::DATA_TYPE_DECIMAL,
            'salary'    =>self:: DATA_TYPE_DECIMAL,
        );
        
        // public function __construct($name , $age , $address , $tax , $salary ){
        //     global $connection;
        //     $this->name = $name;
        //     $this->age = $age;
        //     $this->address = $address;
        //     $this->tax = $tax;
        //     $this->salary = $salary;
        // }

        public function __get($prop){       // when ptoperty inaccesible or not found
            return $this->$prop;
        }

        public function getTableName()
        {
            return self::$tableName;
        }
    
    }
    
?>