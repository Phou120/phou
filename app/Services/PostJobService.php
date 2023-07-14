<?php

namespace App\Services;

use App\Models\PostJob;
use App\Traits\ResponseAPI;

class PostJobService
{
    use ResponseAPI;

    public function addPostJobs($request)
    {
        $addPostJob = new PostJob;
        $addPostJob->company_position_id = $request['company_position_id'];
        $addPostJob->experience = $request['experience'];
        $addPostJob->education_level = $request['education_level'];
        $addPostJob->basic_salary = $request['basic_salary'];
        $addPostJob->qty = $request['qty'];
        $addPostJob->start_date = $request['start_date'];
        $addPostJob->end_date = $request['end_date'];
        $addPostJob->description = $request['description'];
        $addPostJob->save();


        return $this->success('ຜ່ານແລ້ວ', 200);

    }

    public function listPostJobs()
    {
        $items = PostJob::orderBy('id', 'desc')->get();
        
        $items->transform(function($item) {
            return $item->format();
        });

        return response()->json([
            'listPostJobs' => $items
        ]);
    }

    public function editPostJobs($request)
    {

        $editPost = PostJob::find($request['id']);
        $editPost->company_position_id = $request['company_position_id'];
        $editPost->experience = $request['experience'];
        $editPost->education_level = $request['education_level'];
        $editPost->basic_salary = $request['basic_salary'];
        $editPost->qty = $request['qty'];
        $editPost->start_date = $request['start_date'];
        $editPost->end_date = $request['end_date'];
        $editPost->description = $request['description'];
        $editPost->save();


        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deletePostJobs($request)
    {
        $deletePost = PostJob::find($request['id']);
        $deletePost->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }
}
