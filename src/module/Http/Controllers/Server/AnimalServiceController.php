<?php
namespace Girolando\Componentes\Animal\Controllers\Server;

use Girolando\Componentes\Animal\Services\Server\AnimalService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnimalServiceController extends Controller
{
    private $animalService;

    /**
     * AnimalServiceController constructor.
     * @param $animalService
     */
    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->animalService->getAnimalDatatableJson('_dataTableQuery'.$request->get('name'));
    }

}
