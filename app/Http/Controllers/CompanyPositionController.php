<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyPositionService;
use App\Http\Requests\CompanyPositionRequest;

class CompanyPositionController extends Controller
{

    public $companyPositionService;

    public function __construct(CompanyPositionService $companyPositionService)
    {
        $this->companyPositionService = $companyPositionService;
    }


    public function addCompanyPosition(CompanyPositionRequest $request)
    {
        return $this->companyPositionService->addCompanyPosition($request);
    }


    public function listCompanyPositions()
    {
        return $this->companyPositionService->listCompanyPositions();
    }


    public function editCompanyPositions(CompanyPositionRequest $request)
    {
        return $this->companyPositionService->editCompanyPositions($request);
    }


    public function deleteCompanyPositions(CompanyPositionRequest $request)
    {
        return $this->companyPositionService->deleteCompanyPositions($request);
    }
}
