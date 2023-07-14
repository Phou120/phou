<?php

namespace App\Services;

use App\Models\Company;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    use ResponseAPI;


    public function addCompany($request)
    {
        $file_name = $this->saveImage($request);

        $addCompany = new Company();
        $addCompany->business_type_id = $request['business_type_id'];
        $addCompany->name = $request['name'];
        $addCompany->phone = $request['phone'];
        $addCompany->email_contract = $request['email_contract'];
        $addCompany->address = $request['address'];
        $addCompany->latitude = $request['latitude'];
        $addCompany->longitude = $request['longitude'];
        $addCompany->bank_name = $request['bank_name'];
        $addCompany->bank_account_name = $request['bank_account_name'];
        $addCompany->bank_account_number = $request['bank_account_number'];
        $addCompany->logo = $file_name;
        $addCompany->save();


        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function saveImage($request)
    {
        if($request->hasFile('logo')){
            $file_path = '/images/Company/Logo';
            $imageFile = $request->file('logo');

            //get just text
            $extension = $imageFile->getClientOriginalExtension();

            //Filename to storage
            $filename = 'company_logo' . '_' . time() . '.' . $extension;
            Storage::disk('public')->putFileAs($file_path, $imageFile, $filename);

            return $filename;

        }
    }


    public function editCompany($request)
    {

            $editCompany = Company::find($request['id']);
            $editCompany->business_type_id = $request['business_type_id'];
            $editCompany->name = $request['name'];
            $editCompany->phone = $request['phone'];
            $editCompany->email_contract = $request['email_contract'];
            $editCompany->address = $request['address'];
            $editCompany->latitude = $request['latitude'];
            $editCompany->longitude = $request['longitude'];
            $editCompany->bank_name = $request['bank_name'];
            $editCompany->bank_account_name = $request['bank_account_name'];
            $editCompany->bank_account_number = $request['bank_account_number'];

            if (isset($request['logo'])) {

                //Upload File
                $fileName = $this->saveImage($request);

                //Move old File in folder
                if (isset($editCompany->logo)) {
                    $file_path = 'images/Company/Logo/' . $editCompany->logo;
                    if (Storage::disk('public')->exists($file_path)) {
                        Storage::disk('public')->delete($file_path);
                    }
                }
                $editCompany->logo = $fileName;
            }
            $editCompany->save();


        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteCompany($request)
    {
        $deleteCompany = Company::find($request['id']);

        //Delete File in folder
        if (isset($deleteCompany->logo)) {
            $file_path = 'images/Company/Logo/' . $deleteCompany->logo;
            if (Storage::disk('public')->exists($file_path)) {
                Storage::disk('public')->delete($file_path);
            }
        }
        $deleteCompany->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listCompanies()
    {
        $listCompanies = Company::select(
            'companies.*',
            'business_ty.id as business_ty_id',
            'business_ty.name as business_ty_name',

        )->join(

            'business_types as business_ty',
            'business_ty.id', 'companies.business_type_id'

        )
        ->orderBy('id', 'desc')->get();

        $listCompanies->transform(function($item){
            return $item->format();
        });

        return response()->json([
            'listCompanies' => $listCompanies
        ]);
    }
}
