<?php
    namespace PHPMVC\Models;

    class ClientsModel extends AbstractModel
    {

        public $ClientId;
        public $Name;
        public $PhoneNumber;
        public $Email;
        public $Address;

        protected static $tableName = 'app_clients';

        protected static $tableSchema = array(
            'Name'              => self::DATA_TYPE_STRING,
            'PhoneNumber'       => self::DATA_TYPE_STRING,
            'Email'             => self::DATA_TYPE_STRING,
            'Address'           => self::DATA_TYPE_STRING

        );

        protected static $primaryKey = 'ClientId';
    }
?>