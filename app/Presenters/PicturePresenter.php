<?php

namespace App\Presenters;

use App\Transformers\PictureTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PicturePresenter
 *
 * @package namespace App\Presenters;
 */
class PicturePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PictureTransformer();
    }
}
