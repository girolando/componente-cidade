<?php
namespace Andersonef\Componentes\Repositories\Views;

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
        return \Andersonef\Componentes\Entities\Views\AnimalConsulta::class;
    }

}