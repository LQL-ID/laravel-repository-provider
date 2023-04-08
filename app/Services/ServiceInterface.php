<?php

namespace App\Services;

interface ServiceInterface
{
    public function executeWithResponseAndException($request);
}
