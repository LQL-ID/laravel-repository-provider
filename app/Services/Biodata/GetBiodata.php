<?php

namespace App\Services\Biodata;

use App\Models\Biodata;
use App\Services\ApiService;
use App\Services\ServiceInterface;

class GetBiodata extends ApiService implements ServiceInterface
{
    public function process($data)
    {
        $model = Biodata::where('id', $data['id'])->first();

        $this->results['message'] = "Data Successfully Updated";
        $this->results['data'] = $model->toArray();
    }
}
