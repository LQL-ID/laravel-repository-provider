<?php

use App\Helpers\APIResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return APIResponse::json(
        [
            'code' => NOT_FOUND_CODE,
            'status' => NOT_FOUND_STATUS,
            'message' => "hello is it me you're looking for",

        ], NOT_FOUND_CODE);
    }
);
