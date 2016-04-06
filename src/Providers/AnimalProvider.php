<?php
namespace Andersonef\Componentes\Animal\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AnimalProvider extends ServiceProvider{


    public function boot()
    {
        Route::group(['prefix' => 'andersonef'], function(){
            Route::resource('componentes/animal', 'Andersonef\Componentes\Animal\Controllers\AnimalServiceController', ['only' => ['index']]);
            Route::resource('server/componentes/animal', 'Andersonef\Componentes\Animal\Controllers\Server\AnimalServiceController', ['only' => ['index']]);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}