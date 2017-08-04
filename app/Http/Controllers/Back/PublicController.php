<?php

namespace App\Http\Controllers\Back;

use Facades\App\Repositories\ModuleRepository;
use App\Traits\FileSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    use FileSystem;

    /**
     * @param $src
     * @return mixed
     */
    public function getPublicPhoto($src){
        return $this->getOneFile($src);
    }

}
