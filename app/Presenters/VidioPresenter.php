<?php

namespace App\Presenters;

use App\Transformers\VidioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VidioPresenter
 *
 * @package namespace App\Presenters;
 */
class VidioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VidioTransformer();
    }
}
