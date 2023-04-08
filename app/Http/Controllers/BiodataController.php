<?php

namespace App\Http\Controllers;

use App\Helpers\APIResponse;
use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Helpers\Paginator;
use App\Http\Requests\Biodata\{
    GetRequest,
    CreateRequest,
    DeleteRequest,
    UpdateRequest,
};

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

    public function getSpecificBiodata(GetRequest $request)
    {
        return app('GetSpecificBiodata')->executeWithResponseAndException($request->all());
    }

    public function createBiodata(CreateRequest $request)
    {
        return app('StoreBiodata')->executeWithResponseAndException($request->except('_token'));
    }

    public function updateBiodata(UpdateRequest $request)
    {
        return app('UpdateBiodata')->executeWithResponseAndException($request->except('_token', '_method'));
    }

    public function deleteBiodata(DeleteRequest $request)
    {
        return app('DestroyBiodata')->executeWithResponseAndException($request->all());
    }
}
