<?php

namespace App\Services;

use App\Models\Position;
use App\Traits\ResponseAPI;


class PositionService
{
    use ResponseAPI;

    public function addPosition($request)
    {
        $addPosition = new Position();
        $addPosition->name = $request['name'];
        $addPosition->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function editPosition($request)
    {
        $editPosition = Position::find($request['id']);
        $editPosition->name = $request['name'];
        $editPosition->save();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function deletePosition($request)
    {
        $deletePosition = Position::find($request['id']);
        $deletePosition->delete();

        return $this->success('ຜ່ານແລ້ວ', 200);

    }


    public function listPositions()
    {
        $listPosition = Position::select(
            'positions.*'

        )->orderBy('id', 'desc')->get();

        $listPosition->transform(function($item){
            
            return $item->format();

        });


        return response()->json([
            'listPosition' => $listPosition
        ]);
    }
}
