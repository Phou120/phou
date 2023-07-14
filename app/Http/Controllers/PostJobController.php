<?php

namespace App\Http\Controllers;

use App\Models\PostJob;
use Illuminate\Http\Request;
use App\Services\PostJobService;
use App\Http\Requests\PostJobRequest;

class PostJobController extends Controller
{

    public $postJobService;

    public function __construct(PostJobService $postJobService)
    {
        $this->postJobService = $postJobService;
    }

    public function addPostJobs(PostJobRequest $request)
    {
        return $this->postJobService->addPostJobs($request);
    }


    public function listPostJobs()
    {
        return $this->postJobService->listPostJobs();
    }


    public function editPostJobs(PostJobRequest $request)
    {
        return $this->postJobService->editPostJobs($request);
    }


    public function deletePostJobs(PostJobRequest $request)
    {
        return $this->postJobService->deletePostJobs($request);
    }
}
