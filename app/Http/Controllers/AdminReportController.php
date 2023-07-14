<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use Illuminate\Http\Request;
use App\Services\AdminService;

class AdminReportController extends Controller
{

    public $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }


    public function reportApply(Request $request)
    {
        return $this->adminService->reportApply($request);
    }
}
