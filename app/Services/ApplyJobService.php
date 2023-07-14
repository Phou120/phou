<?php

namespace App\Services;

use App\Models\ApplyJob;
use App\Traits\ResponseAPI;

class ApplyJobService
{
    use ResponseAPI;


    public function addApplyJob($request)
    {
        $addApply = new ApplyJob();

        $addApply->user_apply_id = auth()->user()->id;
        $addApply->post_job_id = $request['post_job_id'];
        $addApply->save();

        return $this->success('ຜ່ານແລ້ວ', 200);
    }

    public function listApplyJobs()
    {
        $listApply = ApplyJob::select(
            'apply_jobs.*',
            'us.name as us_name',
            'seeker.name as seeker_name',
            'seeker.id as seeker_id',
            'seeker.surname as seeker_surname',
            'seeker.gender as seeker_gender',
            'seeker.birth_date as seeker_birth_date',
            'post.id as post_id',
            'post.education_level',
            'post.description',
            'post.basic_salary',
            'post.qty',
            'post.status as post_status',
            'post.start_date',
            'post.end_date',
            'posit.name as posit_name',
            'posit.id as posit_id',
            'company.id as company_id',
            'company.name as company_name',
            'company.phone',
            'company.email_contract',
            'company.logo',
            'company.address',
            'company.latitude',
            'company.longitude',
            'company.bank_name',
            'company.bank_account_name',
            'company.bank_account_number',
            'business.id as business_id',
            'business.name as business_name',
        )->join(
            'users as us',
            'us.id', 'apply_jobs.user_apply_id',
        )->join(
            'job_seekers as seeker',
            'seeker.user_id', 'us.id'
        )->join(
            'post_jobs as post',
            'post.id', 'apply_jobs.post_job_id'
        )->join(
            'company_positions as com_position',
            'com_position.id', 'post.company_position_id'
        )->join(
            'positions as posit',
            'posit.id', 'com_position.position_id'
        )->join(
            'companies as company',
            'company.id', 'com_position.company_id'
        )->join(
            'business_types as business',
            'business.id', 'company.business_type_id'
        )->where(
            'apply_jobs.user_apply_id', auth()->user()->id
        )
        ->orderBy('apply_jobs.id', 'desc')->get();

        $listApply->transform(function($item){
            return $item->formatData();
        });

        return response()->json([
            'listApplyJobs' => $listApply
        ]);

    }


    public function editApplyJob($request)
    {
        $editApplyJob = ApplyJob::find($request['id']);
        $editApplyJob->user_apply_id = auth()->user()->id;
        $editApplyJob->post_job_id = $request['post_job_id'];
        $editApplyJob->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteApplyJob($request)
    {
        $deleteApplyJob = ApplyJob::find($request['id']);
        $deleteApplyJob->delete();


        return $this->success('ຜ່ານແລ້ວ', 200);

    }
}
