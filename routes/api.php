<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\BusinessTypeController;
use App\Http\Controllers\CompanyPositionController;
use App\Http\Controllers\EducationalInstitutionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [AuthController::class, 'login']);

});


Route::group([
    'middleware' => [
        'auth.jwt',
    ],
    'role:superadmin|admin',
    'prefix' => 'admin',

], function() {

    Route::post('add-businessType', [BusinessTypeController::class, 'addBusinessType'])->name('add.businessType');
    Route::put('edit-businessType/{id}', [BusinessTypeController::class, 'editBusinessType'])->name('edit.businessType');
    Route::delete('delete-businessType/{id}', [BusinessTypeController::class, 'deleteBusinessType'])->name('delete.businessType');
    Route::get('list-businessTypes', [BusinessTypeController::class, 'listBusinessTypes']);


    Route::post('add-company', [CompanyController::class, 'addCompany'])->name('add.company');
    Route::post('edit-company/{id}', [CompanyController::class, 'editCompany'])->name('edit.company');
    Route::delete('delete-company/{id}', [CompanyController::class, 'deleteCompany'])->name('delete.company');
    Route::get('list-companies', [CompanyController::class, 'listCompanies']);


    Route::post('add-position', [PositionController::class, 'addPosition'])->name('add.position');
    Route::put('edit-position/{id}', [PositionController::class, 'editPosition'])->name('edit.position');
    Route::delete('delete-position/{id}', [PositionController::class, 'deletePosition'])->name('delete.position');
    Route::get('list-positions', [PositionController::class, 'listPositions']);



    Route::post('add-jobSeeker', [JobSeekerController::class, 'addJobSeeker'])->name('add.jobSeeker');
    Route::post('edit-jobSeeker/{id}', [JobSeekerController::class, 'editJobSeeker'])->name('edit.jobSeeker');
    Route::delete('delete-jobSeeker/{id}', [JobSeekerController::class, 'deleteJobSeeker'])->name('delete.jobSeeker');
    Route::get('list-jobSeekers', [JobSeekerController::class, 'listJobSeekers']);


    Route::post('add-educationalInstitution', [EducationalInstitutionController::class, 'addEducationalInstitution'])->name('add.educationalInstitution');
    Route::put('edit-educationalInstitution/{id}', [EducationalInstitutionController::class, 'editEducationalInstitution'])->name('edit.educationalInstitution');
    Route::delete('delete-educationalInstitution/{id}', [EducationalInstitutionController::class, 'deleteEducationalInstitution'])->name('delete.educationalInstitution');
    Route::get('list-educationalInstitutions', [EducationalInstitutionController::class, 'listEducationalInstitutions']);


    Route::post('add-department', [DepartmentController::class, 'addDepartment'])->name('add.department');
    Route::put('edit-department/{id}', [DepartmentController::class, 'editDepartment'])->name('edit.department');
    Route::delete('delete-department/{id}', [DepartmentController::class, 'deleteDepartment'])->name('delete.department');
    Route::get('list-departments', [DepartmentController::class, 'listDepartments']);


    /** Company_position*/
    Route::post('add-company-position', [CompanyPositionController::class, 'addCompanyPosition'])->name('add.company_position');
    Route::get('list-company-positions', [CompanyPositionController::class, 'listCompanyPositions']);
    Route::put('edit-company-position/{id}', [CompanyPositionController::class, 'editCompanyPositions'])->name('edit.company_position');
    Route::delete('delete-company-position/{id}', [CompanyPositionController::class, 'deleteCompanyPositions'])->name('delete.company_position');


    Route::post('add-education', [EducationController::class, 'addEducation'])->name('add.education');
    Route::put('edit-education/{id}', [EducationController::class, 'editEducation'])->name('edit.education');
    Route::delete('delete-education/{id}', [EducationController::class, 'deleteEducation'])->name('delete.education');
    Route::get('list-educations', [EducationController::class, 'listEducations']);


    Route::post('add-experience', [ExperienceController::class, 'addExperience'])->name('add.experience');
    Route::put('edit-experience/{id}', [ExperienceController::class, 'editExperience'])->name('edit.experience');
    Route::delete('delete-experience/{id}', [ExperienceController::class, 'deleteExperience'])->name('delete.experience');
    Route::get('list-experiences', [ExperienceController::class, 'listExperiences']);


    /** Post Jobs */
    Route::post('add-post-jobs', [PostJobController::class, 'addPostJobs'])->name('jobs');
    Route::get('list-post-jobs', [PostJobController::class, 'listPostJobs'])->name('list.post.jobs');
    Route::put('edit-post-job/{id}', [PostJobController::class, 'editPostJobs'])->name('edit.post.jobs');
    Route::delete('delete-post-job/{id}', [PostJobController::class, 'deletePostJobs'])->name('delete.post.jobs');


    // Admin
    Route::post('report/apply', [AdminReportController::class, 'reportApply'])->name('report.apply');

});

// SendMail
Route::post('send-email', [MailController::class, 'sendEmail']);





Route::group([
    'middleware' => [
        'auth.jwt',
    ],
    'role:seeker',
    'prefix' => 'seeker',

], function() {
    Route::post('add-apply-job', [ApplyJobController::class, 'addApplyJob'])->name('add-apply-job');
    Route::get('list-apply-jobs', [ApplyJobController::class, 'listApplyJobs']);
    Route::put('edit-apply-job/{id}', [ApplyJobController::class, 'editApplyJob'])->name('edit-apply-job');
    Route::delete('delete-apply-job/{id}', [ApplyJobController::class, 'deleteApplyJob'])->name('delete-apply-job');

});

