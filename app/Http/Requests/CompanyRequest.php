<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        if($this->isMethod('post') && $this->routeIs('edit.company')
             ||$this->isMethod('delete') && $this->routeIs('delete.company')

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
        if($this->isMethod('delete') && $this->routeIs('delete.company')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('companies', 'id')
                ],
            ];
        }


        if($this->isMethod('post') && $this->routeIs('edit.company')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('companies', 'id')
                ],
                'business_type_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('business_types', 'id')
                ],

                'name'=>[
                    'required',
                    'min:2',
                    'max:200',
                    Rule::unique('companies', 'name')
                    ->ignore($this->id)
                ],
                'phone'=>[
                    'required',
                    'min:6',
                    'max:20'
                ],
                'email_contract'=>[
                    'required',
                    'email',
                    'min:6',
                    'max:200'
                ],
                'address'=>[
                    'required'
                ],
                'latitude'=>[
                    'required',
                    'numeric',

                ],
                'longitude'=>[
                    'required',
                    'numeric',

                ],
                'bank_name'=>[
                    'required',
                    'min:2',
                    'max:200'
                ],
                'bank_account_name'=>[
                    'required',
                    'min:2',
                    'max:200'
                ],
                'bank_account_number'=>[
                    'required',
                    'numeric',

                ],
                'logo'=>[
                    'nullable',
                    'mimes:jpg,png,jpeg,gif,raw,tiff,psd',
                    'max:2048',
                ]
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add.company')){
            return [
                'business_type_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('business_types', 'id')
                ],
                'name'=>[
                    'required',
                    'min:2',
                    'max:200',
                    Rule::unique('companies', 'name')

                ],
                'phone'=>[
                    'required',
                    'min:8',
                    'max:20'
                ],
                'email_contract'=>[
                    'required',
                    'email',
                    'min:6',
                    'max:200'
                ],
                'address'=>[
                    'required'
                ],
                'latitude'=>[
                    'required',
                    'numeric',

                ],
                'longitude'=>[
                    'required',
                    'numeric',

                ],
                'bank_name'=>[
                    'required',
                    'min:2',
                    'max:200'
                ],
                'bank_account_name'=>[
                    'required',
                    'min:2',
                    'max:200'

                ],
                'bank_account_number'=>[
                    'required',
                    'numeric',

                ],
                'logo'=>[
                    'required',
                    'mimes:jpg,png,jpeg,gif,raw,tiff',
                    'max:2048', //KB
                ]
            ];
        }

    }
}
