<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPosition extends Model
{
    use HasFactory;

    public function format()
    {
        return [
            'company_position' =>[
                
                'id' => $this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted' => $this->deleted

            ],

            'position' =>[

                'id' => $this->posit_id,
                'name' => $this->posit_name,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted' => $this->deleted

            ],

            'company' =>[

                'id' => $this->come_id,
                'name' => $this->come_name,
                'phone' => $this->phone,
                'email_contract' => $this->email_contract,
                'logo_url' => config('services.file_path.company_logo') . $this->logo,
                'address' => $this->address,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'bank_name' => $this->bank_name,
                'bank_account_name' => $this->bank_account_name,
                'bank_account_number' => $this->bank_account_number,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'deleted' => $this->deleted,

                'businessType' =>[

                    'id' => $this->id,
                    'name' => $this->business_name,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                    'deleted' => $this->deleted

                ]
            ]
        ];
    }
}
