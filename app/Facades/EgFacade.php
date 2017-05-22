<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/4
 * Time: 16:55
 */

namespace App\Facades\EgFacade;


use Illuminate\Support\Facades\Facade;

class EgFacade extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'EgRepository';
    }
}