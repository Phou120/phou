<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
        if($this->isMethod('put') && $this->routeIs('edit.position')
             ||$this->isMethod('delete') && $this->routeIs('delete.position')

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
        if($this->isMethod('delete') && $this->routeIs('delete.position')){
            return [
                'id'=>[
                    'required',
                    'numeric',
                    Rule::exists('positions', 'id')
                ],
            ];
        }


        if($this->isMethod('put') && $this->routeIs('edit.position')){
            return [
                'name'=>[
                    'required',
                    'min:2',
                    'max:200',
                    Rule::unique('positions', 'name')
                    ->ignore($this->id)
                ]
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add.position')){
            return [
                'name'=>[
                    'required',
                    'min:2',
                    'max:200',
                    
                ]
            ];
        }

    }
}
