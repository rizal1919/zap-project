<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use Throwable;

class PositionController extends Controller
{
    public function storePosition(Request $request){
        // dd(Auth::user()->id);
        $request->validate([
            'place' => 'required',
        ]);

        DB::beginTransaction();

        try{

            Activity::create([
                'user_id'   => Auth::user()->id,
                'place_id'  => $request->place,
                'activity'  => $request->activity,
                'start'     => date('Y-m-d H:i:s'),
            ]);

            DB::commit();
            return response()->json(['message' => 'Activity is Started'], 200);


        }catch(\Throwable $th){

            DB::rollBack();
            return response()->json(['message'  => $th->getMessage()], 422);
        }
    }
}
