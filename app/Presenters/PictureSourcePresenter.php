<?php

namespace App\Presenters;

use App\Transformers\PictureSourceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PictureSourcePresenter
 *
 * @package namespace App\Presenters;
 */
class PictureSourcePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PictureSourceTransformer();
    }
}
