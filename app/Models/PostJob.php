<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
    use HasFactory;


    public function format()
    {
        return [
            'id' => $this->id,
            'company_position' => [
                'id' => $this->company_position['id'],
                'position' => $this->company_position->position,
                'company' => [
                    'id' => $this->company_position->company['id'],
                    'name' => $this->company_position->company['name'],
                    'phone' => $this->company_position->company['phone'],
                    'email_contract' => $this->company_position->company['email_contract'],
                    'logo' => $this->company_position->company['logo'],
                    'business_type' => $this->company_position->company->business_type,
                ],
            ],
            'experience' => $this->experience,
            'education_level' => $this->education_level,
            'basic_salary' => $this->basic_salary,
            'qty' => $this->qty,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,

        ];
    }

    public function company_position()
    {
        return $this->belongsTo(CompanyPosition::class);
    }

}
