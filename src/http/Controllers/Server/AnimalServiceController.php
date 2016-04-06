<?php
namespace Andersonef\Componentes\Controllers\Server;

use Andersonef\Componentes\Services\Server\Componentes\AnimalService;
use Illuminate\Http\Request;

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
