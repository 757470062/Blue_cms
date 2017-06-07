<?php

namespace App\Presenters;

use App\Transformers\DownloadTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DownloadPresenter
 *
 * @package namespace App\Presenters;
 */
class DownloadPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DownloadTransformer();
    }
}
