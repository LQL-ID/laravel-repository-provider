<?php

namespace App\Services\Biodata;

use App\Models\Biodata;
use App\Services\ApiService;
use App\Services\ServiceInterface;

class DestroyBiodata extends ApiService implements ServiceInterface
{
    public function process($data)
    {
        $model = Biodata::where('id', $data['id'])->first();
        $model->delete();

        $this->results['message'] = "Data Successfully Deleted";
        $this->results['data'] = $model->toArray();
    }
}
