<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/5/5
 * Time: 16:44
 */

namespace App\Facades\ModuleFacade;


use Illuminate\Support\Facades\Facade;

class ModuleFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ModuleRepository';
    }

}