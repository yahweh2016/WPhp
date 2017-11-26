<?php
namespace WPhp\lib;
use Medoo\Medoo;

class db extends Medoo
{
    public function __construct()
    {
        $database = config::all('database');
        $database = array(
            'database_type' => $database['driver'],
            'database_name' => $database['database'],
            'server'        => $database['host'],
            'username'      => $database['username'],
            'password'      => $database['password'],
            'charset'       => $database['charset'],
        );
        parent::__construct($database);
    }
}