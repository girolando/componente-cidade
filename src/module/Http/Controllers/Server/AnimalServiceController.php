<?php
namespace Andersonef\Componentes\Animal\Controllers\Server;

use Andersonef\Componentes\Animal\Services\Server\AnimalService;
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
