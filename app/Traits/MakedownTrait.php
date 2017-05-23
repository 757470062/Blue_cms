<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/23
 * Time: 8:58
 */

namespace App\Traits;


trait MakedownTrait
{

    /**
     * 处理 mdeditor-html-code 数组字段修改为code
     * @param $array_data
     * @return array
     */
    public function getCodeByDell($array_data){
        $code = $array_data['mdeditor-html-code'];
        $array_data = array_except($array_data ,'mdeditor-html-code');
        return array_add($array_data ,'code' ,$code);
    }
}