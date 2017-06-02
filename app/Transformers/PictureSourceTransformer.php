<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PictureSource;

/**
 * Class PictureSourceTransformer
 * @package namespace App\Transformers;
 */
class PictureSourceTransformer extends TransformerAbstract
{

    /**
     * Transform the \PictureSource entity
     * @param \PictureSource $model
     *
     * @return array
     */
    public function transform(PictureSource $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
