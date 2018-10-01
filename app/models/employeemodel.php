<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 9/15/2018
 * Time: 6:12 PM
 */
namespace PHPMVC\Models;

require_once 'abstractmodel.php';

class EmployeeModel extends AbstractModel
{
    public $id;
    private $name;
    private $address;
    private $salary;
    private $tax;
    private $age;

    protected static $tableName = 'employees';


    protected static $tableSchema = array(
        'name'      => self::DATA_TYPE_STR,
        'age'       => self::DATA_TYPE_INT,
        'address'   => self::DATA_TYPE_STR,
        'tax'       => self::DATA_TYPE_DECIMAL,
        'salary'    => self::DATA_TYPE_DECIMAL
    );

    protected static $primaryKey = 'id';

    public function __construct()
    {
    }
// i use __get() instead of many getters    and use many set  instead of one __set  to show that they work the same

    public function __get($name)
    {
        return $this->$name;
        // TODO: Implement __get() method.
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getTableName()
    {
        return self::$tableName;
    }
}
