<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
        if($this->isMethod('put') && $this->routeIs('edit.department')
             ||$this->isMethod('delete') && $this->routeIs('delete.department')

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
        if($this->isMethod('delete') && $this->routeIs('delete.department')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('departments', 'id')
                ],
            ];
        }


        if($this->isMethod('put') && $this->routeIs('edit.department')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('departments', 'id')
                ],
                'name'=>[
                    'required',
                    'min:2',
                    'max:200',
                    Rule::unique('departments', 'name')
                    ->ignore($this->id)
                ],
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add.department')){
            return [
                'name'=>[
                    'required',
                    'min:2',
                    'max:50',
                   
                ],
            ];
        }


    }
}
