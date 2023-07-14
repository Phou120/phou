<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{

    public $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
    

    public function addCompany(CompanyRequest $request)
    {
        return $this->companyService->addCompany($request);
    }

    public function editCompany(CompanyRequest $request)
    {
        return $this->companyService->editCompany($request);
    }

    public function deleteCompany(CompanyRequest $request)
    {
        return $this->companyService->deleteCompany($request);
    }

    public function listCompanies()
    {
        return $this->companyService->listCompanies();
    }
}
