<?php

namespace App\Services;

use App\Traits\ResponseAPI;
use App\Models\CompanyPosition;

class CompanyPositionService
{
    use ResponseAPI;


    public function addCompanyPosition($request)
    {
        $addCompanyPosition = new CompanyPosition();
        $addCompanyPosition->position_id = $request['position_id'];
        $addCompanyPosition->company_id = $request['company_id'];
        $addCompanyPosition->save();


        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listCompanyPositions()
    {
        $listCompanyPosition = CompanyPosition::select(
            'company_positions.*',
            'posit.id as posit_id',
            'posit.name as posit_name',
            'come.id as come_id',
            'come.name as come_name',
            'come.phone',
            'come.email_contract',
            'come.logo',
            'come.address',
            'come.latitude',
            'come.longitude',
            'come.bank_name',
            'come.bank_account_name',
            'come.bank_account_number',
            'business.id as business_id',
            'business.name as business_name',

        )->join(

            'positions as posit',
            'posit.id', 'company_positions.position_id'

        )->join(

            'companies as come',
            'come.id', 'company_positions.company_id'

        )->join(

            'business_types as business',
            'business.id', 'come.business_type_id'

        )
        ->orderBy('id', 'desc')->get();

        $listCompanyPosition->transform(function($item){
            return $item->format();
        });


        return response()->json([
            'listCompanyPositions' => $listCompanyPosition
        ]);
    }


    public function editCompanyPositions($request)
    {
        $editComPos = CompanyPosition::find($request['id']);
        $editComPos->position_id = $request['position_id'];
        $editComPos->company_id = $request['company_id'];
        $editComPos->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteCompanyPositions($request)
    {
        $deleteComPos = CompanyPosition::find($request['id']);
        $deleteComPos->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }
}
