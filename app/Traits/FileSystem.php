<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/29
 * Time: 8:21
 */

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileSystem
{


    /**
     * 将文件上传至系统，并将上传后的链接放入Request中
     * @param Request $request
     * @param $type  文件类型，与配置文件对应文件夹(默认public)
     * @param $field 所操作字段名称
     * @return array|Request
     */
    public function putOneFile(Request $request, $field = 'photo', $type = 'public'){
        $file = $request->file($field);
        $request = $request->toArray();
        if(!empty($file)){
            $file = Storage::disk($type)->put('', $file);
            $request = array_add(array_except($request, $field), $field ,$file);
        }
        return $request;
    }

    /**
     * 获取单个文件
     * @param $src
     * @param string $type
     * @return mixed
     */
    public function getOneFile($src, $type = 'app/public/'){
        return \Response::file(storage_path($type.$src));
    }


    /**
     * 上传多个文件
     * @param Request $request
     * @param array $field  数据库字段
     * @param string $type  配置文件夹
     * @return array|Request
     */
    public function putMoreFile(Request $request, $field = [], $type = 'public'){
        $data = [];
        for ($i=0; $i < count($field); $i++){
            if (empty($request->file($field[$i]))){
                $data[$field[$i]] = '';
            }else {
                $data[$field[$i]] = array_get($this->putOneFile($request, $field[$i], $type), $field[$i]);
            }
        }
        $request = $request->toArray();
        foreach ($data as $k => $v){
            if (!empty($v)) $request = array_add(array_except($request, $k), $k, $v);
        }
        return $request;
    }

}