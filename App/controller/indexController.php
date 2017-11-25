<?php
namespace App\controller;

use App\model\TModel;
use WPhp\lib\controller;

class indexController extends controller
{
    public function index()
    {
        dump(TModel::get());
        // $this->assign('data', 11);
        // $this->display('index/index');
        $this->make('index/index')->with('data', 11)->withFuckMe('OK!');
    }
}