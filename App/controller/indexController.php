<?php
namespace App\controller;

use App\model\TModel;
use WPhp\lib\controller;

class indexController extends controller
{
    public function index()
    {
        dump(TModel::get());
        // dump(TModel::paginate(2));
        $this->assign('data', 11);
        $this->assign('fuck_me', 222);
        $this->display('index/index');

        // dump(TModel::table('t1')->get());
        // $this->make('index/index')->with('data', 11)->withFuckMe('OK!');
    }
}