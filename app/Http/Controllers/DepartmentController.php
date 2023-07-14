<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{

    public $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    

    public function addDepartment(DepartmentRequest $request)
    {
        return $this->departmentService->addDepartment($request);
    }

    public function editDepartment(DepartmentRequest $request)
    {
        return $this->departmentService->editDepartment($request);
    }

    public function deleteDepartment(DepartmentRequest $request)
    {
        return $this->departmentService->deleteDepartment($request);
    }

    public function listDepartments()
    {
        return $this->departmentService->listDepartments();
    }
}
