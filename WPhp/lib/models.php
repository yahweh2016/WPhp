<?php
namespace WPhp\lib;
use \WPhp\lib\config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;
class models extends Model
{
    public $timestamps = true;


    public function __construct()
    {
        parent::__construct();

        // Eloquent ORM
        $capsule = new Capsule;
        $capsule->addConnection(require WPHP.'/config/database.php');
        $capsule->bootEloquent();
    }


}