<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostJobRequest extends FormRequest
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
        if($this->isMethod('put') && $this->routeIs('edit.post.jobs')
             ||$this->isMethod('delete') && $this->routeIs('delete.post.jobs')

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
        if($this->isMethod('delete') && $this->routeIs('delete.post.jobs')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('post_jobs', 'id')
                ],
            ];
        }


        if($this->isMethod('put') && $this->routeIs('edit.post.jobs')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('post_jobs', 'id')
                ],
                'company_position_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('company_positions', 'id')
                ],
                'experience'=>[
                    'required',
                ],
                'education_level' =>[
                    'required'
                ],
                'basic_salary' =>[
                    'required',
                    'numeric'
                ],
                'qty' =>[
                    'required',
                    'numeric'
                ],
                'start_date' =>[
                    'required',
                    'date'
                ],
                'end_date' =>[
                    'required',
                    'date'
                ],
                'description' =>[
                    'nullable',
                ]
            ];
        }


        if($this->isMethod('post') && $this->routeIs('jobs')){
            return [
                'company_position_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('company_positions', 'id')
                ],
                'experience'=>[
                    'required',
                ],
                'education_level' =>[
                    'required'
                ],
                'basic_salary' =>[
                    'required',
                    'numeric'
                ],
                'qty' =>[
                    'required',
                    'numeric'
                ],
                'start_date' =>[
                    'required',
                    'date'
                ],
                'end_date' =>[
                    'required',
                    'date'
                ],
                'description' =>[
                    'nullable',
                ]
            ];
        }

    }
}
