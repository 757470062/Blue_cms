<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/7/20
 * Time: 15:02
 */

namespace App\Service;

use App\Traits\ButtonTrait;
use Facades\App\Repositories\TagRepository;
use Facades\App\Repositories\CategoryRepository;
use Facades\App\Repositories\DownloadRepository;
use Facades\App\Repositories\FriendRepository;
use Facades\App\Repositories\PictureRepository;
use Facades\App\Repositories\VidioRepository;
use Facades\App\Repositories\ModuleRepository;
use App\Traits\DatatableTrait;
use Facades\App\Repositories\ArticleRepository;

class TrashedService
{

    use DatatableTrait, ButtonTrait;

    /**
     * 获得软删除数据
     * @param $type
     * @return mixed
     */
    public function trashed($type){
        $button = $this->getButton('回滚','glyphicon glyphicon-edit btn-md','/back/trashed/restore/'.$type.'/{{ $id}}').
            $this->getButton('彻底删除','glyphicon glyphicon-trash btn-md','/back/trashed/destory/'.$type.'/{{ $id}}');
        switch ($type){
            case 'category':
                return $this->getDataByAjax(
                    CategoryRepository::scopeQuery(function ($query){
                        return $query->with(['categoryModule'])->onlyTrashed();
                    })->all(),
                    $button
                );
            case 'article':
                return $this->getDataByAjax(
                    ArticleRepository::scopeQuery(function ($query){
                        return $query->with(['articleCategory', 'articleBackUser'])->onlyTrashed();
                    })->all(),
                    $button
                );
            case 'module':
                return $this->getDataByAjax(
                    ModuleRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->all(),
                    $button
                );
            case 'picture':
                return $this->getDataByAjax(
                    PictureRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed()->with(['pictureCategory']);
                    })->all(),
                    $button
                );
            case 'vidio':
                return $this->getDataByAjax(
                    VidioRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed()->with(['vidioCategory']);
                    })->all(),
                    $button
                );
            case 'download':
                return $this->getDataByAjax(
                    DownloadRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed()->with(['downloadCategory']);
                    })->all(),
                    $button
                );
            case 'friend':
                return $this->getDataByAjax(
                    FriendRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->all(),
                    $button
                );
            case 'tag':
                return $this->getDataByAjax(
                    TagRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->all(),
                    $button
                );
        }
    }

    /**
     * 恢复数据
     * @param $type
     * @param $id
     * @return mixed
     */
    public function restore($type, $id){
       switch ($type){
            case 'category':
                    return CategoryRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
            case 'article':
                    return ArticleRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
            case 'module':
                    return ModuleRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
            case 'picture':
                    return PictureRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
            case 'vidio':
                    return VidioRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
            case 'download':
                    return DownloadRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
            case 'friend':
                    return FriendRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
            case 'tag':
                    return TagRepository::scopeQuery(function ($query){
                        return $query->onlyTrashed();
                    })->find($id)->restore();
        }
    }

    public function destory($type, $id){
        switch ($type){
            case 'category':
                return CategoryRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
            case 'article':
                return ArticleRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
            case 'module':
                return ModuleRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
            case 'picture':
                return PictureRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
            case 'vidio':
                return VidioRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
            case 'download':
                return DownloadRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
            case 'friend':
                return FriendRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
            case 'tag':
                return TagRepository::scopeQuery(function ($query){
                    return $query->onlyTrashed();
                })->find($id)->forceDelete();
        }
    }
}