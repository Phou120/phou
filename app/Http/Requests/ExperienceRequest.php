<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
        if($this->isMethod('put') && $this->routeIs('edit.experience')
             ||$this->isMethod('delete') && $this->routeIs('delete.experience')

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
        if($this->isMethod('delete') && $this->routeIs('delete.experience')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('experiences', 'id')
                ],
            ];
        }


        if($this->isMethod('put') && $this->routeIs('edit.experience')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('experiences', 'id')
                ],
                'job_seeker_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('job_seekers', 'id')
                ],
                'position_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('positions', 'id')
                ],
                'company_name'=>[
                    'required',
                    'min:2',
                    'max:200',
                ],
                'experience'=>[
                    'required',
                    'numeric',
                ],
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add.experience')){
            return [
                'job_seeker_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('job_seekers', 'id')
                ],
                'position_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('positions', 'id')
                ],
                'company_name'=>[
                    'required',
                    'min:2',
                    'max:200',
                ],
                'experience'=>[
                    'required',
                    'numeric',
                ],
            ];
        }

    }
}
