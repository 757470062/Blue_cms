<?php

namespace App\Presenters;

use App\Transformers\ModuleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ModulePresenter
 *
 * @package namespace App\Presenters;
 */
class ModulePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ModuleTransformer();
    }
}
