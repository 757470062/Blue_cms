<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/14
 * Time: 14:18
 */

namespace App\Traits;


Trait NestableTrait
{
    use ButtonTrait;

    /**
     * nestable资源整合（css文件包含其中）
     * @param $nestable
     * @param string $template
     * @return mixed
     */
    public function getNestableByBlade($nestable , $template = 'template.nestable.nestable'){
        $nestable = $this->getNestable($nestable);
        return \View::make($template,[
            'nestable' => $nestable,
            'template' => $template
        ])->render();
    }

    /**
     * 递归循环输出nestable html代码
     * @param $categorys
     * @return string
     */
    public function getNestable($categorys)
    {
        $data = '';
        $child = '';
        for($i=0;$i < count($categorys);$i++) {
            if($categorys[$i]['child']){
                $child = $this->getNestable($categorys[$i]['child']);
            }
            $data = $data.
                '<ol class="dd-list">' .
                '<li class="dd-item" data-id = "'.$categorys[$i]['id'].'" >' .
                '<div class="dd-handle" >' .
                '<div class="left">'.
                $categorys[$i]['name'] .
                '</div>' .
                '<div class="right">' .
                $this->getButton('删除' ,'glyphicon glyphicon-trash' ,'back/category/destroy/'.$categorys[$i]['id']).
                $this->getButton('修改','glyphicon glyphicon-new-window','back/category/edit/'.$categorys[$i]['id']).
                $this->getButton('添加子级分类' ,'glyphicon glyphicon-log-out' ,'back/category/create-child/'.$categorys[$i]['id']).
                '</div>' .
                '</div>' .
                $child.
                '</li >' .
                '</ol>';
            $child='';
        }
       return $data;
    }
}