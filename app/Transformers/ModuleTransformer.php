<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Module;

/**
 * Class ModuleTransformer
 * @package namespace App\Transformers;
 */
class ModuleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Module entity
     * @param \Module $model
     *
     * @return array
     */
    public function transform(Module $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'names' => $model->name,
            'lists' => $model->list,
            'articles' => $model->article,
            'covers' => $model->cover,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
