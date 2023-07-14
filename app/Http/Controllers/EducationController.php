<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EducationService;
use App\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    public $educationService;

    public function __construct(EducationService $educationService)
    {
        $this->educationService = $educationService;
    }

    
    public function addEducation(EducationRequest $request)
    {
        return $this->educationService->addEducation($request);
    }

    public function editEducation(EducationRequest $request)
    {
        return $this->educationService->editEducation($request);
    }

    public function deleteEducation(EducationRequest $request)
    {
        return $this->educationService->deleteEducation($request);
    }

    public function listEducations()
    {
        return $this->educationService->listEducations();
    }
}
