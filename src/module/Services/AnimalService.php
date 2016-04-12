<?php
/**
 * Created by PhpStorm.
 * User: ansilva
 * Date: 29/03/2016
 * Time: 14:34
 */
namespace Girolando\Componentes\Animal\Services;


use Girolando\BaseComponent\Services\BaseComponentService;

class AnimalService extends BaseComponentService
{

    public function _init($params = [])
    {
        return view('ComponenteAnimal::Services.Componentes.Animal._init', $params);
    }
}