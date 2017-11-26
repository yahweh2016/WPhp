<?php
namespace App\model;
use \WPhp\lib\models;
use Illuminate\Database\Capsule\Manager as Capsule;

class BaseModel extends models
{
    protected $table = '';


    public function __construct()
    {
        parent::__construct();
    }


    public function getData($table, $where = null, $order = null, $group = null, $page = null)
    {
        return Capsule::table($table)->get();
    }
}