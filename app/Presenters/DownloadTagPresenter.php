<?php

namespace App\Presenters;

use App\Transformers\DownloadTagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DownloadTagPresenter
 *
 * @package namespace App\Presenters;
 */
class DownloadTagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DownloadTagTransformer();
    }
}
