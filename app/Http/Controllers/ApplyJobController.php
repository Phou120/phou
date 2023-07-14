<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use Illuminate\Http\Request;
use App\Services\ApplyJobService;
use App\Http\Requests\ApplyJobRequest;

class ApplyJobController extends Controller
{

    public $applyJobService;

    public function __construct(ApplyJobService $applyJobService)
    {
        $this->applyJobService = $applyJobService;
    }


    public function addApplyJob(ApplyJobRequest $request)
    {
        return $this->applyJobService->addApplyJob($request);
    }


    public function listApplyJobs()
    {
        return $this->applyJobService->listApplyJobs();
    }


    public function editApplyJob(ApplyJobRequest $request)
    {
        return $this->applyJobService->editApplyJob($request);
    }


    public function deleteApplyJob(ApplyJobRequest $request)
    {
        return $this->applyJobService->deleteApplyJob($request);
    }
}
