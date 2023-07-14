<?php

namespace App\Services;

use App\Traits\ResponseAPI;
use App\Models\BusinessType;

class BusinessService
{
    use ResponseAPI;


    public function addBusinessType($request)
    {
        $addBusiness = new BusinessType();
        $addBusiness->name = $request['name'];
        $addBusiness->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function editBusinessType($request)
    {
        $editBusiness = BusinessType::find($request['id']);
        $editBusiness->name = $request['name'];
        $editBusiness->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteBusinessType($request)
    {
        $deleteBusiness = BusinessType::find($request['id']);
        $deleteBusiness->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listBusinessTypes()
    {
        $listBusiness = BusinessType::select(
            'business_types.*'

        )->orderBy('id', 'desc')->get();

        $listBusiness->transform(function($item){
            return $item->format();
        });

        return response()->json([
            'listBusinessTypes' => $listBusiness
        ]);
    }
}
