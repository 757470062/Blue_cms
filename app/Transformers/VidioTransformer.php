<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Vidio;

/**
 * Class VidioTransformer
 * @package namespace App\Transformers;
 */
class VidioTransformer extends TransformerAbstract
{

    /**
     * Transform the \Vidio entity
     * @param \Vidio $model
     *
     * @return array
     */
    public function transform(Vidio $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
