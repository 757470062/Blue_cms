<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\VidioSource;

/**
 * Class VidioSourceTransformer
 * @package namespace App\Transformers;
 */
class VidioSourceTransformer extends TransformerAbstract
{

    /**
     * Transform the \VidioSource entity
     * @param \VidioSource $model
     *
     * @return array
     */
    public function transform(VidioSource $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
