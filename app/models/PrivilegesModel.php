<?php     
    namespace PHPMVC\Models;
    class PrivilegesModel  extends AbstractModel{
        public $PrivilegeId ;
        public $Privilege ;
        public $PrivilegeTitle ;
    
        public static $tableName = 'app_users_privileges';
        protected static $primaryKey = 'PrivilegeId';

        protected static $tableSchema = array(
            'PrivilegeId'                =>self::DATA_TYPE_INT,
            'Privilege'                  =>self::DATA_TYPE_STRING,
            'PrivilegeTitle'             =>self::DATA_TYPE_STRING,
        );
    }
    
?>