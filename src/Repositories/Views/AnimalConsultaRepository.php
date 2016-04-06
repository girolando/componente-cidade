<?php
namespace Andersonef\Componentes\Animal\Repositories\Views;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;

/**
 * Data repository to work with entity AnimalConsulta.
 *
 * Class AnimalConsultaRepository
 * @package InetServer\Repositories\Views
 */
class AnimalConsultaRepository extends RepositoryAbstract{


    public function entity()
    {
        return \Andersonef\Componentes\Animal\Entities\Views\AnimalConsulta::class;
    }

}