<?php

namespace App\Services\Biodata;

use App\Models\Biodata;
use App\Services\ApiService;
use App\Services\ServiceInterface;

class UpdateBiodata extends ApiService implements ServiceInterface
{
    public function process($data)
    {
        $model = Biodata::where('id', $data['id'])->first();
        $model->name = $data['name'];
        $model->date_of_birth = $data['date_of_birth'];
        $model->hobby = $data['hobby'];
        $model->age = $data['age'];
        $model->is_married = (!isset($data['is_married'])) ? false : $data['is_married'];
        $model->save();

        $this->results['message'] = "Data Successfully Updated";
        $this->results['data'] = ['id' => $model->id];
    }
}
