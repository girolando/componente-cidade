<?php
/**
 * Created by PhpStorm.
 * User: ansilva
 * Date: 29/03/2016
 * Time: 14:34
 */
namespace Andersonef\Componentes\Services;


use Andersonef\BaseComponent\Services\Componentes\BaseComponentService;
use Illuminate\Database\DatabaseManager;
use InetServer\Repositories\Views\AnimalConsultaRepository;

class AnimalService extends BaseComponentService
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

    public function _init($params = [])
    {
        return view('Services.Componentes.Animal._init', $params);
    }
}