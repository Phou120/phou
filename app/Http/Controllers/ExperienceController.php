<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExperienceService;
use App\Http\Requests\ExperienceRequest;

class ExperienceController extends Controller
{

    public $experienceService;

    public function __construct(ExperienceService $experienceService)
    {
        $this->experienceService = $experienceService;
    }

    
    public function addExperience(ExperienceRequest $request)
    {
        return $this->experienceService->addExperience($request);
    }

    public function editExperience(ExperienceRequest $request)
    {
        return $this->experienceService->editExperience($request);
    }

    public function deleteExperience(ExperienceRequest $request)
    {
        return $this->experienceService->deleteExperience($request);
    }

    public function listExperiences()
    {
        return $this->experienceService->listExperiences();
    }
}
