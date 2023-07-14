<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;

    public function formatData()
    {
        return [
            'apply_job' =>[
                'id' => $this->id,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                
            ],
            'seeker'=>[
                'id' => $this->seeker_id,
                'name' => $this->seeker_name,
                'surname' => $this->seeker_surname,
                'gender' => $this->seeker_gender,
                'birth_date' => $this->seeker_birth_date,

            ],
            'post_job'=>[
                'id' => $this->post_job_id,
                'education_level' => $this->education_level,
                'description' => $this->description,
                'basic_salary' => $this->basic_salary,
                'qty' => $this->qty,
                'status' => $this->post_status,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'position' =>[
                    'id' => $this->posit_id,
                    'name' => $this->posit_name,

                ],
                'company' =>[
                    'id' => $this->company_id,
                    'name' => $this->company_name,
                    'phone' => $this->company_phone,
                    'email_contract' => $this->email_contract,
                    'logo_url' => config('services.file_path.company_logo') . $this->logo,
                    'address' => $this->address,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'bank' =>[
                        'bank_name' => $this->bank_name,
                        'bank_account_name' => $this->bank_account_name,
                        'bank_account_number' => $this->bank_account_number,

                    ],
                    'business_type'=>[
                        'id' =>$this->business_id,
                        'name' =>$this->business_name,

                    ]

                ],

            ],

        ];
    }
}
