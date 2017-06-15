<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\DownloadTag;

/**
 * Class DownloadTagTransformer
 * @package namespace App\Transformers;
 */
class DownloadTagTransformer extends TransformerAbstract
{

    /**
     * Transform the \DownloadTag entity
     * @param \DownloadTag $model
     *
     * @return array
     */
    public function transform(DownloadTag $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
