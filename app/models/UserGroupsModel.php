<?php     
    namespace PHPMVC\Models;
    class UserGroupsModel  extends AbstractModel{
        public $GroupId ;
        public $GroupName ;
    
        public static $tableName = 'app_users_groups';
        protected static $primaryKey = 'GroupId';

        protected static $tableSchema = array(
            'GroupId'                =>self::DATA_TYPE_INT,
            'GroupName'              =>self::DATA_TYPE_STRING,
        );
    }
    
?>