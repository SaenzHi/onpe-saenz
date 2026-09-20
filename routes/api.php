<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\OnpeController;

Route::controller(OnpeController::class)->group(function () {
    Route::get('grupo_votacion/{grupo_votacion}', 'getGrupoVotacion');
    Route::get('is_departamento/{detalle}', 'isDepartamento'); 
    Route::get('is_provincia/{detalle}', 'isProvincia');
    Route::get('departamentos/{inicio}/{fin}', 'getDepartamentos');
    Route::get('provincias/{idDepartamento}', 'getProvincias');
    Route::get('provincias_departamento/{departamento}', 'getProvinciasByDepartamento');
    Route::get('distritos/{idProvincia}', 'getDistritos'); 
    Route::get('distritos_provincia/{provincia}', 'getDistritosByProvincia');
    Route::get('locales_votacion/{idDistrito}', 'getLocalesVotacion'); 
    Route::get('locales_votacion_distrito/{provincia}/{distrito}', 'getLocalesVotacionByDistrito');
    Route::get('grupos_votacion/{idLocalVotacion}', 'getGruposVotacion'); 
    Route::get('grupos_votacion_ubicacion/{provincia}/{distrito}/{local}', 'getGruposVotacionByUbicacion');
    Route::get('grupo_votacion_detalle/{departamento}/{provincia}/{distrito}/{local}/{grupo}', 'getGrupoVotacionDetalle');
    Route::get('votos/{inicio}/{fin}', 'getVotos'); 
    Route::get('votos_departamento/{departamento}', 'getVotosByDepartamento'); 
    Route::get('votos_provincia/{provincia}', 'getVotosByProvincia');
    Route::get('distritos_departamento/{departamento}', 'getDistritosByDepartamento'); 
    Route::get('locales_votacion_departamento/{departamento}', 'getLocalesVotacionByDepartamento');
});