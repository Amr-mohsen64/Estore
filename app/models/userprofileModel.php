<?php     
    namespace PHPMVC\Models;
    class UserProfileModel  extends AbstractModel{
        public $UserId ;
        public $FirstName ;
        public $LastName;
        public $Address ;
        public $DOB;
        public $Image;

        public static $tableName = 'app_users_profile';
        protected static $primaryKey = 'UserId';

        protected static $tableSchema = array(
            'UserId'                  =>self::DATA_TYPE_INT,
            'FirstName'               =>self::DATA_TYPE_STRING,
            'LastName'                =>self::DATA_TYPE_STRING,
            'Address'                 =>self::DATA_TYPE_STRING,
            'DOB'                     =>self::DATA_TYPE_STRING,
            'Image'                   =>self::DATA_TYPE_STRING,
        );
    }
    
?>