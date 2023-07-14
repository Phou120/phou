<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ApplyJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('api')->user()->hasRole('seeker');
    }


    public function prepareForValidation()
    {
        if($this->isMethod('put') && $this->routeIs('edit-apply-job')
             ||$this->isMethod('delete') && $this->routeIs('delete-apply-job')

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
        if($this->isMethod('delete') && $this->routeIs('delete-apply-job')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('apply_jobs', 'id')
                ],
            ];
        }


        if($this->isMethod('put') && $this->routeIs('edit-apply-job')){
            return [
                'id' =>[
                    'required',
                    'numeric',
                    Rule::exists('apply_jobs', 'id')
                ],
                'post_job_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('post_jobs', 'id')
                ]
            ];
        }


        if($this->isMethod('post') && $this->routeIs('add-apply-job')){
            return [
                'post_job_id'=>[
                    'required',
                    'numeric',
                    Rule::exists('post_jobs', 'id')
                ]
            ];
        }

    }
}
