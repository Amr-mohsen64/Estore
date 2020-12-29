<?php
namespace PHPMVC\Models;

class SuppliersModel extends AbstractModel
{

    public $SupplierId;
    public $Name;
    public $PhoneNumber;
    public $Email;
    public $Address;

    protected static $tableName = 'app_suppliers';

    protected static $tableSchema = array(
        'Name'              => self::DATA_TYPE_STRING,
        'PhoneNumber'       => self::DATA_TYPE_STRING,
        'Email'             => self::DATA_TYPE_STRING,
        'Address'           => self::DATA_TYPE_STRING

    );

    protected static $primaryKey = 'SupplierId';
}
?>