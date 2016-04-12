<?php
namespace Girolando\Componentes\Animal\Repositories\Views;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;
use Girolando\Componentes\Animal\Entities\Views\AnimalConsulta;

/**
 * Data repository to work with entity AnimalConsulta.
 *
 * Class AnimalConsultaRepository
 * @package InetServer\Repositories\Views
 */
class AnimalConsultaRepository extends RepositoryAbstract{


    public function entity()
    {
        return AnimalConsulta::class;
    }

}