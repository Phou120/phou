<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BusinessService;
use App\Http\Requests\BusinessTypeRequest;

class BusinessTypeController extends Controller
{

    public $businessService;

    public function __construct(BusinessService $businessService)
    {
        $this->businessService = $businessService;
    }

    
    public function addBusinessType(BusinessTypeRequest $request)
    {
        return $this->businessService->addBusinessType($request);
    }

    public function editBusinessType(BusinessTypeRequest $request)
    {
        return $this->businessService->editBusinessType($request);
    }

    public function deleteBusinessType(BusinessTypeRequest $request)
    {
        return $this->businessService->deleteBusinessType($request);
    }

    public function listBusinessTypes()
    {
        return $this->businessService->listBusinessTypes();
    }
}
