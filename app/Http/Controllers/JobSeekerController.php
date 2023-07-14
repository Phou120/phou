<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JobSeekerService;
use App\Http\Requests\JobSeekerRequest;

class JobSeekerController extends Controller
{
    public $jobSeekerService;

    public function __construct(JobSeekerService $jobSeekerService)
    {
        $this->jobSeekerService = $jobSeekerService;
    }


    public function addJobSeeker(JobSeekerRequest $request)
    {
        return $this->jobSeekerService->addJobSeeker($request);
    }

    public function editJobSeeker(JobSeekerRequest $request)
    {
        return $this->jobSeekerService->editJobSeeker($request);
    }

    public function deleteJobSeeker(JobSeekerRequest $request)
    {
        return $this->jobSeekerService->deleteJobSeeker($request);
    }

    public function listJobSeekers()
    {
        return $this->jobSeekerService->listJobSeekers();
    }
}
