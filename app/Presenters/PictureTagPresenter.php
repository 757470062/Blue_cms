<?php

namespace App\Presenters;

use App\Transformers\PictureTagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PictureTagPresenter
 *
 * @package namespace App\Presenters;
 */
class PictureTagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PictureTagTransformer();
    }
}
