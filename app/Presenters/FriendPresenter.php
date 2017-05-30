<?php

namespace App\Presenters;

use App\Transformers\FriendTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FriendPresenter
 *
 * @package namespace App\Presenters;
 */
class FriendPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FriendTransformer();
    }
}
