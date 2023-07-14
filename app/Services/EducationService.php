<?php

namespace App\Services;

use App\Models\Education;
use App\Traits\ResponseAPI;


class EducationService
{
    use ResponseAPI;


    public function addEducation($request)
    {
        $addEducation = new Education();
        $addEducation->education_institution_id = $request['education_institution_id'];
        $addEducation->department_id = $request['department_id'];
        $addEducation->job_seeker_id = $request['job_seeker_id'];
        $addEducation->start_year = $request['start_year'];
        $addEducation->end_year = $request['end_year'];
        $addEducation->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function editEducation($request)
    {
        $editEducation = Education::find($request['id']);
        $editEducation->education_institution_id = $request['education_institution_id'];
        $editEducation->department_id = $request['department_id'];
        $editEducation->job_seeker_id = $request['job_seeker_id'];
        $editEducation->start_year = $request['start_year'];
        $editEducation->end_year = $request['end_year'];
        $editEducation->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deleteEducation($request)
    {
        $deleteEducation = Education::find($request['id']);
        $deleteEducation->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listEducations()
    {
        $masters = Education::select(
            'education.*',
            'institution.id as institution_id',
            'institution.name as institution_name',
            'depart.id as depart_id',
            'depart.name as depart_name',
            'job_s.id as job_s_id',
            'job_s.name as job_s_name',
            'job_s.surname as job_s_surname',
            'job_s.gender as job_s_gender',
            'job_s.birth_date as job_s_birth_date',
            'job_s.address as job_s_address',
            'job_s.file_cv',
            'users.id as users_id',
            'users.name as users_name',

        )->join(

             'educational_institutions as institution',
             'institution.id', '=', 'education.education_institution_id',

        )->join(

            'departments as depart',
            'depart.id', '=', 'education.department_id',

        )->join(

            'job_seekers as job_s',
            'job_s.id', '=', 'education.job_seeker_id',

        )->join(

            'users',
            'users.id', 'job_s.user_id',
        )
        ->orderBy('id', 'desc')->get();

        $masters->transform(function($item){
            return $item->format();
        });

        return response()->json([
            'listEducations' => $masters
        ]);
    }
}
