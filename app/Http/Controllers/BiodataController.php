<?php

namespace App\Http\Controllers;

use App\Helpers\APIResponse;
use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Helpers\Paginator;
use App\Http\Requests\Biodata\CreateRequest;

class BiodataController extends Controller
{
    public function getBiodata()
    {
        $biodata = Biodata::all();

        $result = [
            'message' => 'Biodata Successfully Fetched',
            'data' => $biodata,
            'pagination' => Paginator::set($biodata)
        ];

        return APIResponse::json($result);
    }

    public function createBiodata(CreateRequest $request)
    {
        return app('StoreBiodata')->executeWithResponseAndException($request->except('_token'));
    }
}
