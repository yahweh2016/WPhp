<?php
namespace App\model;

class TModel extends BaseModel
{
    public $timestamps = false;
    protected $table = 't1';

    public function __construct()
    {
        parent::__construct();
    }
}