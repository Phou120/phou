<?php

namespace App\Services;

use App\Models\User;
use App\Models\Company;
use App\Models\PostJob;
use App\Models\ApplyJob;
use App\Models\Education;
use App\Models\JobSeeker;
use App\Models\Experience;
use App\Traits\ResponseAPI;
use App\Models\BusinessType;
use App\Models\CompanyPosition;
use Illuminate\Support\Facades\DB;

class AdminService
{
    use ResponseAPI;


    public function reportApply($request)
    {


        $items = JobSeeker::select(
            'job_seekers.*'
        )

        /* get experience in jobSeeker */
        // ->leftJoin('experiences', 'experiences.job_seeker_id', 'job_seekers.id')
        // ->where('experiences.experience', $request['experience'])
        ->orderBy('id', 'desc')
        ->groupBy('job_seekers.id')
        ->get();

        $items->map(function ($item) {
            $item->sumExperiences = Experience::where('job_seeker_id', $item->id)->sum('experience');
        });

        return $items;



        // $items = Company::select(
        //         'companies.*'
        //     )
        //     ->orderBy('id', 'desc')
        //     ->groupBy('companies.id')
        //     ->get();
        //  $items->map(function($item) {
        //     $item->position = CompanyPosition::where('position_id', $item->id)
        //     ->get();

        //         /*  get basic_salary = 2000000  */
        //     $item->position->map(function($item){
        //         $item->countPostJob = PostJob::where('company_position_id', $item->id)
        //         ->where('basic_salary', '>=', 2700000)
        //         ->where('status', '=', 'close')





                //->where('start_date', '=', '2023-05-01')


                /*ໃຊ້ໃນກໍລະນີມີ ຫຼາຍ ເຊັ່ນ: ແລະ,ຫຼື*/
                // ->where(function($item){
                //     $item->where('basic_salary', '>=', 2000000);
                //     $item->where('start_date', '=', '2024-05-01 00:00:00');
                // })

        //         ->count();


        //     });
        // });
        // return $items;



    //     $items = ApplyJob::select(
    //         'apply_jobs.*',
    //         'post_jobs.id as post_job_id',
    //         'post_jobs.experience as post_job_experience',
    //     )
    //     ->leftJoin('post_jobs', 'apply_jobs.post_job_id', 'post_jobs.id')
    //     ->orderBy('id', 'asc')
    //     ->groupBy('apply_jobs.id')
    //     ->get();

    //   return $items;



        // $items = JobSeeker::select(
        //     'job_seekers.*'
        // )
        // ->orderBy('id', 'desc')
        // ->get();

        // $items->map(function ($item){
        //     $item->sumExperience = Experience::where('job_seeker_id', $item->id)
        //     ->sum('experience');

            // $item->countExperience = Experience::where('job_seeker_id', $item->id)
            // ->where('experience', '=', 1)
            // ->count();

            // $item->countEducation = Education::where('job_seeker_id', $item->id)
            // ->where('start_year', '>=', 2012)
            // ->count();



    //      });

    //  return $items;



        // $items = ApplyJob::select(
        //     'apply_jobs.*',
        //     'job_seeker.id as job_seeker_id',
        //     'job_seeker.name as job_seeker_name',
        //     'job_seeker.surname',
        //     'job_seeker.gender',
        //     'job_seeker.birth_date',
        //     'job_seeker.file_cv',
        //     'job_seeker.address',
        //     'experience.id as experience_id',
        //     'experience.experience',
        //     'position.id as position_id',
        //     'position.name as position_name',
        //     'company_position.id as company_position_id',
        //     'company.id as company_id',
        //     'business_type.id as business_type_id',
        //     'business_type.name as business_type_name',
        //     'company.name as company_name',
        //     'education.id as education_id',
        //     'education.start_year',
        //     'education.end_year',
        //     'department.id as department_id',
        //     'department.name as department_name',
        //     'educational_institution.id as educational_institution_id',
        //     'educational_institution.name as education_institution_name',
        //     'post_job.id as post_job_id',
        //     'post_job.experience as post_job_experience',
        //     'post_job.education_level',
        //     'post_job.basic_salary',
        //     'post_job.qty',
        //     'post_job.status',
        // )
        // ->leftJoin('job_seekers as job_seeker', 'apply_jobs.job_seeker_id', 'job_seeker.id')
        // ->leftJoin('experiences as experience', 'experience.job_seeker_id', 'experience.id')
        // ->leftJoin('positions as position', 'experience.position_id', 'position.id')
        // ->leftJoin('company_positions as company_position', 'company_position.position_id', 'company_position.id')
        // ->leftJoin('companies as company', 'company_position.company_id', 'company.id')
        // ->leftJoin('business_types as business_type', 'company.business_type_id', 'business_type.id')
        // ->leftJoin('education', 'education.job_seeker_id', 'education.id')
        // ->leftJoin('departments as department', 'education.department_id', 'department.id')
        // ->leftJoin('educational_institutions as educational_institution', 'education.education_institution_id', 'educational_institution.id')
        // ->leftJoin('post_jobs as post_job', 'apply_jobs.post_job_id', 'post_job.id')
        // ->where('education.department_id', '=', $request['department_id'])
        // ->where('company_position.company_id', '=', $request['company_id'])
        // ->where('experience.position_id', '=', $request['position_id'])
        // ->where('post_job.basic_salary', '=', $request['basic_salary'])
        // ->where('experience.experience', '=', $request['experience'])
        // ->where('job_seeker.gender', '=', $request['gender'])
        // ->where('job_seeker.address', '=', $request['address'])
        // ->where('post_job.education_level', '=', $request['education_level'])
        // ->orderBy('id', 'asc')
        // ->groupBy('apply_jobs.id')
        // ->get();



        // $items = PostJob::select(
        //     'post_jobs.*',
        //     'company_position.id as company_position_id',
        //     'company.id as company_id',
        //     'company.name as company_name',
        //     'company.phone',
        //     'company.email_contract',
        //     'business_type.id as business_type_id',
        //     'business_type.name as business_type_name',
        //     'position.id as position_id',
        //     'position.name as position_name',


        // )->leftJoin('company_positions as company_position', 'post_jobs.company_position_id', 'company_position.id')
        // ->leftJoin('companies as company', 'company_position.company_id', 'company.id')
        // ->leftJoin('business_types as business_type', 'company.business_type_id', 'business_type.id')
        // ->leftJoin('positions as position', 'company_position.position_id', 'position.id')

        // ->where(function ($query) use ($request) {
        //     $query->Where('post_jobs.id', $request->id);

            // $query->WhereIn('post_jobs.id', [2,3]);

             //$query->WhereNotIn('post_jobs.id', [1,2]);

             //$query->WhereNull('post_jobs.description');


            //  $query->Where('post_jobs.status', 'open');
            // $query->orWhere('post_jobs.status', 'close');
        //   })
        // ->orderBy('id', 'asc')
        // ->groupBy('post_jobs.id')
        // ->get();




        // $items = User::select(
        //     'users.*'
        // )
        // ->orderBy('id', 'desc')
        // ->get();


            /* get user */
        //  $items->map(function($item) {
        //     $item->user = DB::table('users')
        //     ->join('permission_user', 'users.id', 'permission_user.user_id')
        //     ->join('permissions', 'permission_user.permission_id', 'permissions.id')
        //     ->select('users.*', 'permissions.name as permission_name')


            // $item->role = DB::table('role_user')
                /* get roles */
            // ->select('roles.name as role_name')
            // ->join('roles', 'role_user.role_id', 'roles.id')



            // ->select('roles.name as role_name', 'permissions.name as permission_name')
            // ->join('roles', 'role_user.role_id', 'roles.id')
            // ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            // ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')


        //      ->where('user_id', $item->id)->get();
        //  });


        // $items = Company::select(
        //     'companies.*'
        // )
        // ->orderBy('id', 'desc')
        // ->groupBy('companies.id')
        // ->get();



           /* get position */
        //  $items->map(function($item) {
        //     $item->position = CompanyPosition::where('position_id', $item->id)->get();

                /*  get basic_salary */
            // $item->position->map(function($item){
            //     $item->countPostJob = PostJob::where('company_position_id', $item->id)
            //     ->where('basic_salary', '>=', 2700000)


                //->where('start_date', '=', '2023-05-01')


                /*ໃຊ້ໃນກໍລະນີມີ ຫຼາຍ ເຊັ່ນ: ແລະ,ຫຼື*/
                // ->where(function($item){
                //     $item->where('basic_salary', '>=', 2000000);
                //     $item->where('start_date', '=', '2024-05-01 00:00:00');
                // })

    //             ->count();


    //         });

    //         $item->position->map(function($data){
    //             $data->getPostJobStartDate = PostJob::where('company_position_id', $data->id)
    //             ->where('start_date', '=', '2023-05-01')
    //             ->get();
    //         });
    // });

        // $items = BusinessType::select(
        //     'business_types.*'
        // )
        // ->orderBy('id', 'desc')
        // ->get();
            

            /* get Business_type of company  */
        // $items->map(function($item) {
        //     $item->countCompany = Company::where('business_type_id', $item->id)->count();

        // });

        // $items = JobSeeker::select(
        //     'job_seekers.*'

        // )
            /* get gender */
        // ->where('gender', '=', $request['gender']);


            /*count gender all */
        //->where('gender', '=', 'gender')->sum();
        // ->orderBy('id', 'desc')
        // ->get();



        // $items->map(function($item) {
        //     $item->countEducation = Education::where('job_seeker_id', $item->id)->get()->count();

                 /* get experience of job_seeker */
        //     $item->sumExperience = Experience::where('job_seeker_id', $item->id)->get()->sum('experience');
        // });

        //return $items;


            // ! sorting data
        // $item = ApplyJob::select(
        //     'apply_jobs.*',
        //     'job_seeker.id as seeker_id',
        //     'job_seeker.gender',

        // )
        // ->leftJoin('users as user', 'user.id', 'apply_jobs.user_apply_id')
        // ->leftJoin('job_seekers as job_seeker', 'job_seeker.user_id', 'user.id')
        // ->leftJoin('education', 'education.job_seeker_id', 'job_seeker.id')
        // ->leftJoin('post_jobs as post_job', 'post_job.id', 'apply_jobs.post_job_id')
        // ->leftJoin('company_positions as company_position', 'company_position.id', 'post_job.company_position_id')
        // ->where('education.department_id', '=', $request['department_id'])
        // ->where('company_position.company_id', '=', $request['company_id'])
        // ->where('company_position.position_id', '=', $request['position_id'])
        // ->where('job_seeker.gender', '=', $request['gender'])

        // ->where(function ($query) use ($request) {
        //     $query->orWhere('job_seeker.gender', 'male');
        //     $query->orWhere('job_seeker.gender', 'female');
        // })
    //     ->orderBy('id', 'asc')
    //     ->groupBy('apply_jobs.id')
    //     ->get();

         return $items;
      }

}
