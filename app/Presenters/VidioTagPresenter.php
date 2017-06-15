<?php

namespace App\Presenters;

use App\Transformers\VidioTagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VidioTagPresenter
 *
 * @package namespace App\Presenters;
 */
class VidioTagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VidioTagTransformer();
    }
}
