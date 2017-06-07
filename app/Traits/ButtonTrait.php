<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/21
 * Time: 15:31
 */

namespace App\Traits;


trait ButtonTrait
{
    /**
     * Html a标签title属性
     * @var string
     */
     private static $title;
    /**
     * bootstrap 标签class值
     * @var string
     */
     private $ico;

    /**
     * 跳转路由
     * @var string
     */
     private static $route;


    /**
     * @param $title
     * @param $ico
     * @param $route
     * @return string
     */
    public function getButton($title, $ico, $route){
         return '<a href="'.url($route).'" title="'.$title.'" class="btn btn-sm '.$ico.'"></a>';
     }
}