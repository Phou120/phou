<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyPositionRequest extends FormRequest
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
        if($this->isMethod('put') && $this->routeIs('edit.company_position')
             ||$this->isMethod('delete') && $this->routeIs('delete.company_position')

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
        if($this->isMethod('delete') && $this->routeIs('delete.company_position')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('company_positions', 'id')
                ],
            ];
        }


        if($this->isMethod('put') && $this->routeIs('edit.company_position')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('company_positions', 'id')
                ],
                'position_id' =>[
                    'required',
                    'numeric',
                    Rule::exists('positions', 'id')
                ],
                'company_id' =>[
                    'required',
                    'numeric',
                    Rule::exists('companies', 'id')
                ]
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add.company_position')){
            return [
                'position_id' =>[
                    'required',
                    'numeric',
                    Rule::exists('positions', 'id')
                ],
                'company_id' =>[
                    'required',
                    'numeric',
                    Rule::exists('companies', 'id')
                ]
            ];
        }


    }
}
