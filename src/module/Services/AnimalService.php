<?php
/**
 * Created by PhpStorm.
 * User: ansilva
 * Date: 29/03/2016
 * Time: 14:34
 */
namespace Andersonef\Componentes\Animal\Services;


use Andersonef\BaseComponent\Services\BaseComponentService;
use Andersonef\Componentes\Animal\Repositories\Views\AnimalConsultaRepository;
use Illuminate\Database\DatabaseManager;

class AnimalService extends BaseComponentService
{

    public function _init($params = [])
    {
        return view('ComponenteAnimal::Services.Componentes.Animal._init', $params);
    }
}