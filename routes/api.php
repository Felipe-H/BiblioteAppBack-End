<?php
use App\Http\Controllers\api\ClienteApiController;
use App\Http\Controllers\Api\EditorasApiController;
use App\Http\Controllers\Api\GenlitApiController;
use App\http\Controllers\Api\LivroApiController;
Route::resource('autores', ClienteApiController::class);
Route::resource('livros', LivroApiController::class);
Route::resource('genlit', GenlitApiController::class);
Route::resource('editoras', EditorasApiController::class);



//$this->apiResource('/autores', 'Api\ClienteApiController');

//Route::apiResource('autores', 'Api\ClienteApiController');

//Route::resource('articles', ArticleController::class);