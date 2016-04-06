<?php
/**
 * Created by PhpStorm.
 * User: ansilva
 * Date: 30/03/2016
 * Time: 16:36
 */
namespace Andersonef\Componentes\Animal\Services\Server\Componentes;


use Andersonef\Componentes\Animal\Extensions\DataTableQuery;
use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;

class AnimalService extends ServiceAbstract
{


    public function getAnimalDataset($dataTableQueryName = 'animalConsulta')
    {
        $dataTableQuery = DataTableQuery::getInstance($dataTableQueryName);
        $filters = (array) $dataTableQuery->getFilters();
        $retorno = $this->getQuery();
        if($filters) $retorno = $this->findBy($filters);

        $retorno->select(['*']);

        $dataset = $dataTableQuery->apply($retorno);

        $request = Request::capture();
        if($request->has('customFilters')){
            $customFilters = $request->get('customFilters');
            $dataset->where( function($query) use($customFilters) {
                foreach($customFilters as $filter => $value){
                    $query->orWhere($filter, 'like', $value);
                }
            });
        }
        return $dataset;
    }

    public function getAnimalDatatableJson($datasetName = 'animalConsulta')
    {
        return Datatables::of($this->getAnimalDataset($datasetName))
            ->addColumn('idadeAnimal', function($row){
                $row = (new AnimalConsulta())->fill(['dataNascimentoAnimal' => $row->dataNascimentoAnimal]);
                return $row->idadeAnimal;
            })
            ->addColumn('idadeAnimalAbreviada', function($row){
                $row = (new AnimalConsulta())->fill(['dataNascimentoAnimal' => $row->dataNascimentoAnimal]);
                return $row->idadeAnimalAbreviada;
            })
            ->make(true);
    }


}