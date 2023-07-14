<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('api')->user()->hasRole('superadmin|admin');
    }


    public function prepareForValidation()
    {
        if($this->isMethod('put') && $this->routeIs('edit.education')
             ||$this->isMethod('delete') && $this->routeIs('delete.education')

        ){
            $this->merge([
                'id' => $this->route()->parameters['id'],

            ]);
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if($this->isMethod('delete') && $this->routeIs('delete.education')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('education', 'id')
                ],
            ];
        }


        if($this->isMethod('put') && $this->routeIs('edit.education')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('education', 'id')
                ],
                'education_institution_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('educational_institutions', 'id')
                ],
                'department_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('departments', 'id')
                ],
                'job_seeker_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('job_seekers', 'id')
                ],
                'start_year'=>[
                    'required',
                    'numeric',
                    //'date'
                    //'year',
                ],
                'end_year'=>[
                    'required',
                    'numeric',
                   // 'year',
                    //'date'
                ]
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add.education')){
            return [
                'education_institution_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('educational_institutions', 'id')
                ],
                'department_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('departments', 'id')
                ],
                'job_seeker_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('job_seekers', 'id')
                ],
                'start_year'=>[
                    'required',
                    'numeric',
                    //'date'
                    //'year',
                ],
                'end_year'=>[
                    'required',
                    'numeric',
                   // 'year',
                    //'date'
                ]
            ];
        }


    }
}
