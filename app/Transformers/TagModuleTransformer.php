<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\TagModule;

/**
 * Class TagModuleTransformer
 * @package namespace App\Transformers;
 */
class TagModuleTransformer extends TransformerAbstract
{

    /**
     * Transform the \TagModule entity
     * @param \TagModule $model
     *
     * @return array
     */
    public function transform(TagModule $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
