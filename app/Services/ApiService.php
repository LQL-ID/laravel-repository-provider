<?php

namespace App\Services;

use App\Helpers\APIResponse;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;

abstract class ApiService implements ServiceInterface
{
    public function __construct()
    {
        $this->results = ['response_code'=>null,'message'=>null,'data'=>null];
    }

    protected function validate ( $inputData ) { }

    abstract protected function process( $data );

    public function executeWithResponseAndException($inputData)
    {
        DB::beginTransaction();
        try {
            $this->validate($inputData);
            $this->process($inputData);
            $this->results['response_code'] = SUCCESS_CODE;
            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();
            $this->results['response_code'] = ($err->getCode() == 0) ? FAILURE_CODE : $err->getCode();
            $this->results['message'] = $err->getMessage();
        }

        return APIResponse::json($this->results, $this->results['response_code']);
    }
}
