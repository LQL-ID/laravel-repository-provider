<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(BiodataController::class)->group(function() {
    Route::get('biodata', 'getBiodata');
    Route::get('biodata/{id?}', 'getSpecificBiodata');
    Route::post('biodata/create', 'createBiodata');
    Route::put('biodata/{id?}', 'updateBiodata');
    Route::delete('biodata/{id}/delete'. 'deleteBiodata');
});
