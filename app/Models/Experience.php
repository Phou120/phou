<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    public function format()
    {
        return [
            'experience' =>[

                'id' => $this->id,
                'company_name' => $this->company_name,
                'experience' => $this->experience,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at

            ],

            'jobSeekers'=>[

                'id' => $this->job_s_id,
                'name' => $this->job_s_name,
                'surname' => $this->job_s_surname,
                'genders' => $this->job_s_gender,
                'birth_date' => $this->job_s_birth_date,
                'address' => $this->job_s_address,
                'file_cv.url' => config('services.master_path.jobSeeker_file_cv') . $this->file_cv,

                'users' =>[
                    'id' => $this->users_id,
                    'name' => $this->users_name,
                ]
            ],

            'position' =>[
                
                'name' => $this->posit_name,

            ]
        ];
    }
}
