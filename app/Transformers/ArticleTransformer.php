<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Article;

/**
 * Class ArticleTransformer
 * @package namespace App\Transformers;
 */
class ArticleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Article entity
     * @param \Article $model
     *
     * @return array
     */
    public function transform(Article $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'category_id' => (int) $model->category_id,
            'title' => $model->title,
            'keys' => $model->keys,
            'flag_id' => $model->flag_id,
            'clicks' => (int) $model->clicks,
            'user_id' => (int) $model->user_id,
            'photo' => $model->photo,
            'intro' => $model->intro,
            'content' => $model->content,
            'code' => $model->code,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
