<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Friend;

/**
 * Class FriendTransformer
 * @package namespace App\Transformers;
 */
class FriendTransformer extends TransformerAbstract
{

    /**
     * Transform the \Friend entity
     * @param \Friend $model
     *
     * @return array
     */
    public function transform(Friend $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
