<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/14
 * Time: 14:18
 */

namespace App\Traits;

use Yajra\Datatables\Facades\Datatables;

Trait DatatableTrait
{
    /**
     * ajax get data
     * @param $data //数据
     * @param $action //button
     * @return mixed
     */
    public function getDataByAjax($data, $action){

        return  Datatables::of($data)
            ->addColumn('action', $action)
            ->make(true);
    }


    /**
     *
     * @param   string      $template       [cambiamos la plantilla por defecto por otra a nuestro gusto]
     * @param   string      $dt_id          [el id de la tabla que se convertira en datatable]
     * @param   Collection  $values         [representa la colecci贸n de valores que se han de incorporar a la tabla]
     * @param   array       $array_values   [array que contiene los atributos a mostrar]
     * @param   array       $array_relations   [array que contiene los relations a mostrar]
     * @param   array       $array_columnas   [array que contiene los columnas a mostrar]
     * @param   string      $route          [ruta del controlador al que saltar]
     * @param   string     $link           [direcci贸n a la que saltar en el primer par谩metro, por defecto 'edit']
     * @param   array      $array_link           [direcci贸n a la que saltar en el primer par谩metro, por defecto 'edit']
     * @param   boolean     $search         [true = se muestran inputs de busqueda en cada columna (pierde traducci贸n)]
     * @return vista HTML
     */
    public function getDataByBlade($dt_id, $values, $array_values, $array_relations, $array_columnas, $link = '',$array_link, $route = NULL , $search = false , $template = 'template.datatables.datatable')
    {
        $view = \View::make($template, [
            'values' => $values,
            'datatable_id' => $dt_id,
            'array_values' => $array_values,
            'array_relations' => $array_relations,
            'array_columnas' => $array_columnas,
            'route' => $route,
            'link' => $link,
            'array_link' => $array_link,
            'search' => $search,
            'template' => $template
        ]);
        $contents = $view->render();
        return $contents;
    }

    /**
     *  jQuery  datatables.
     *
     * @param   string      $dt_id          [el id de la tabla que se convertira en datatable]
     * @param   boolean     $search         [true = se muestran inputs de busqueda en cada columna (pierde traduccin)]
     * @return vista HTML
     */
    public function getDatatableScript($dt_id, $search = false)
    {
        return \View::make('template.datatables.script',[
            'datatable_id' => $dt_id,
            'search' => $search
            ])->render();
    }
}