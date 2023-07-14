<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;


    public function format()
    {
        return [
            'education' =>[

                'id' => $this->id,
                'start_year' => $this->start_year,
                'end_year' => $this->end_year,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at

            ],

            'educational_institutions' =>[

                'id' => $this->institution_id,
                'name' => $this->institution_name,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at

            ],

            'departments' =>[

                'id' =>$this->depart_id,
                'name' => $this->depart_name,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at

            ],

            'job_seekers' =>[

                'id' =>$this->job_s_id,
                'name' => $this->job_s_name,
                'surname' => $this->job_s_surname,
                'gender' => $this->job_s_gender,
                'birth_date' => $this->job_s_birth_date,
                'address' => $this->job_s_address,
                'file_cv_url' => config('services.master_path.jobSeeker_file_cv') . $this->file_cv,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,

                'users' =>[
                    
                    'id' => $this->users_id,
                    'name' => $this->users_name,
                ]
            ]
        ];
    }
}
