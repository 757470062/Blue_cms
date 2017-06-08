<?php

namespace App\Presenters;

use App\Transformers\VidioSourceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VidioSourcePresenter
 *
 * @package namespace App\Presenters;
 */
class VidioSourcePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VidioSourceTransformer();
    }
}
