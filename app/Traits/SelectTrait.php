<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/14
 * Time: 10:21
 */

namespace App\Traits;


use Illuminate\Database\Eloquent\Collection;

trait SelectTrait
{

    /**
     * 渲染select没有默认无/有选中值的视图
     * @param array $datas   //数据eloquent对象
     * @param array $checked  //选中值数据eloquent对象
     * @param string $name  //Html select name
     * @param string $id  //Html select ID
     * @return mixed
     */
    public function select2View($datas = array(), $checked = array(), $name = 'tag_id[]', $id = 'select2'){
        return \View::make('template.select2.select', [
            'datas' => $datas,
            'checked' => $checked,
            'name' => $name,
            'id' => $id,
        ])->render();
    }

}