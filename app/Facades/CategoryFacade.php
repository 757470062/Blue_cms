<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/5/5
 * Time: 16:43
 */

namespace App\Facades\CategoryFacade;


use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade
{

    protected static function getFacadeAccessor(){
        return 'CategoryRepository';
    }

}