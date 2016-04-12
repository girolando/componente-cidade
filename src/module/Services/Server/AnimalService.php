<?php
/**
 * Created by PhpStorm.
 * User: ansilva
 * Date: 30/03/2016
 * Time: 16:36
 */
namespace Girolando\Componentes\Animal\Services\Server;


use Girolando\Componentes\Animal\Extensions\DataTableQuery;
use Girolando\Componentes\Animal\Repositories\Views\AnimalConsultaRepository;
use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;

class AnimalService extends ServiceAbstract
{

    /**
     * This constructor will receive by dependency injection a instance of AnimalConsultaRepository and DatabaseManager.
     *
     * @param AnimalConsultaRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(AnimalConsultaRepository $repository, DatabaseManager $db)
    {
        parent::__construct($repository, $db);
    }

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