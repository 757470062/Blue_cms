<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/7/20
 * Time: 14:02
 */

namespace App\Traits;


use Illuminate\Support\Facades\DB;

trait Transaction
{
    /**
     * 事务统一执行
     * @param callable $transaction
     * @return callable
     */
    public function transaction(callable $transaction){
        try{
            DB::beginTransaction();
            $result = $transaction();
                if ($result){
                    DB::rollBack();
                }else{
                    DB::commit();
                }
            return $result;
        }catch (\Exception $e){
            abort(404, $e->getMessage());
        }
    }


}