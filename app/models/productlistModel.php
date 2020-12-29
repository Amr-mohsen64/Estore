<?php
    namespace PHPMVC\Models;

    class ProductListModel extends AbstractModel
    {

        public $ProductId;
        public $CategoryId;
        public $Name;
        public $Image;
        public $Quantity;
        public $Price;
        public $Unit;
        public $BarCode;

        protected static $tableName = 'app_products_list';

        protected static $tableSchema = array(
            'CategoryId'              => self::DATA_TYPE_INT,
            'Name'                    => self::DATA_TYPE_STRING,
            'Image'                   => self::DATA_TYPE_STRING,
            'Quantity'                => self::DATA_TYPE_INT,
            'BuyPrice'                => self::DATA_TYPE_DECIMAL,
            'SellPrice'                => self::DATA_TYPE_DECIMAL,
            'Unit'                    => self::DATA_TYPE_INT,
            'BarCode'                 => self::DATA_TYPE_STRING,
        ); 

        protected static $primaryKey = 'ProductId';

        public static function getAll()
        {
            $sql = 'SELECT apl.*, apc.Name categoryName FROM ' . self::$tableName . ' apl';
            $sql .= ' INNER JOIN ' . ProductCategoriesModel::getModelTableName() . ' apc';
            $sql .= ' ON apc.CategoryId = apl.CategoryId';
            return self::get($sql);
        }
    }
?>