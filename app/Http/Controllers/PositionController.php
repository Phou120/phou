<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PositionService;
use App\Http\Requests\PositionRequest;
use Illuminate\Support\Facades\Redis;

class PositionController extends Controller
{

    public $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }


    public function addPosition(PositionRequest $request)
    {
        return $this->positionService->addPosition($request);
    }

    public function editPosition(PositionRequest $request)
    {
        return $this->positionService->editPosition($request);
    }

    public function deletePosition(PositionRequest $request)
    {
        return $this->positionService->deletePosition($request);
    }

    public function listPositions()
    {
        return $this->positionService->listPositions();
    }
}
