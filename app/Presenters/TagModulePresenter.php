<?php

namespace App\Presenters;

use App\Transformers\TagModuleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TagModulePresenter
 *
 * @package namespace App\Presenters;
 */
class TagModulePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TagModuleTransformer();
    }
}
