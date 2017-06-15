<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\VidioTag;

/**
 * Class VidioTagTransformer
 * @package namespace App\Transformers;
 */
class VidioTagTransformer extends TransformerAbstract
{

    /**
     * Transform the \VidioTag entity
     * @param \VidioTag $model
     *
     * @return array
     */
    public function transform(VidioTag $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
