<?php

namespace App\Presenters;

use App\Transformers\ArticleTagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ArticleTagPresenter
 *
 * @package namespace App\Presenters;
 */
class ArticleTagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ArticleTagTransformer();
    }
}
