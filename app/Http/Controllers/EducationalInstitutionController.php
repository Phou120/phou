<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EducationalInstitutionService;
use App\Http\Requests\EducationalInstitutionRequest;

class EducationalInstitutionController extends Controller
{
    public $educationalInstitutionService;

    public function __construct(EducationalInstitutionService $educationalInstitutionService)
    {
        $this->educationalInstitutionService = $educationalInstitutionService;
    }

    
    public function addEducationalInstitution(EducationalInstitutionRequest $request)
    {
        return $this->educationalInstitutionService->addEducationalInstitution($request);
    }

    public function editEducationalInstitution(EducationalInstitutionRequest $request)
    {
        return $this->educationalInstitutionService->editEducationalInstitution($request);
    }

    public function deleteEducationalInstitution(EducationalInstitutionRequest $request)
    {
        return $this->educationalInstitutionService->deleteEducationalInstitution($request);
    }

    public function listEducationalInstitutions()
    {
        return $this->educationalInstitutionService->listEducationalInstitutions();
    }
}
