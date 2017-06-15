<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/10
 * Time: 8:44
 */

namespace App\Traits;


trait TagTrait
{

    /**
     * TAG标签的添加
     * @param array $data 需添加的数据
     * @param $model  传入模型
     * @param $str  sql字段名称
     * @param $id   比如文档id
     */
    public function createTags($data = array(), $model, $str, $id){
        //清除tag
        $model->where([$str => $id])->delete();
        //添加tag
        for($i=0; $i < count($data); $i++) {
            $tag = $model->create([
                $str => $id,
                'tag_id' => $data[$i]
            ]);
            if (empty($tag)) abort(404, 'TAG标签添加失败');
        }
    }

}