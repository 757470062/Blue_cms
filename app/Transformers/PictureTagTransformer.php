<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PictureTag;

/**
 * Class PictureTagTransformer
 * @package namespace App\Transformers;
 */
class PictureTagTransformer extends TransformerAbstract
{

    /**
     * Transform the \PictureTag entity
     * @param \PictureTag $model
     *
     * @return array
     */
    public function transform(PictureTag $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
