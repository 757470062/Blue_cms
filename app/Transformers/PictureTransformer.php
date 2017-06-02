<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Picture;

/**
 * Class PictureTransformer
 * @package namespace App\Transformers;
 */
class PictureTransformer extends TransformerAbstract
{

    /**
     * Transform the \Picture entity
     * @param \Picture $model
     *
     * @return array
     */
    public function transform(Picture $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
