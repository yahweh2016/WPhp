<?php
namespace App\controller;

use App\model\TModel;
use WPhp\lib\controller;
use WPhp\lib\db;

class indexController extends controller
{
    public function index()
    {
        dump(TModel::get());
        // dump(TModel::paginate(2));
        $this->assign('data', 11);
        $this->assign('fuck_me', 222);
        $this->display('index/index');

        dump((new TModel())->getData('t1'));
        // $this->make('index/index')->with('data', 11)->withFuckMe('OK!');
    }
}