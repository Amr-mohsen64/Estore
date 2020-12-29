<?php
    namespace PHPMVC\Models;

    class ProductCategoriesModel extends AbstractModel
    {

        public $CategoryId;
        public $Name;
        public $Image;

        protected static $tableName = 'app_products_categories';

        protected static $tableSchema = array(
            'Name'              => self::DATA_TYPE_STRING,
            'Image'             => self::DATA_TYPE_STRING,
        ); 

        protected static $primaryKey = 'CategoryId';
    }
?>