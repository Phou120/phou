<?php

namespace App\Services;

use App\Traits\ResponseAPI;
use App\Models\EducationalInstitution;

class EducationalInstitutionService
{
    use ResponseAPI;


    public function addEducationalInstitution($request)
    {
        $addEducation = new EducationalInstitution();
        $addEducation->name = $request['name'];
        $addEducation->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function editEducationalInstitution($request)
    {
        $editEducation = EducationalInstitution::find($request['id']);
        $editEducation->name = $request['name'];
        $editEducation->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteEducationalInstitution($request)
    {
        $deleteEducation = EducationalInstitution::find($request['id']);
        $deleteEducation->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listEducationalInstitutions()
    {

        $listEducation = EducationalInstitution::select(
            'educational_institutions.*'
            
        )->orderBy('id', 'desc')->get();


        $listEducation->transform(function($item){
            return $item->format();
        });


        return response()->json([
            'listEducationalInstitutions' => $listEducation
        ]);

    }
}
