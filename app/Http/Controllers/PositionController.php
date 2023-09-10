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
        
        $request->validate([
            'place' => 'required',
        ]);

        DB::beginTransaction();

        try{

            $latest = Activity::with('place_activity')->where('user_id', Auth::user()->id)->whereNull('end')->latest()->first();

            if(!empty($latest)){
               return response()->json(['message' => 'Anda masih belum menyelesaikan trouble di '. $latest->place_activity->place], 409);
            }

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

    public function setDefaultPlace($id)
    {

        $id_activity = base64_decode($id);
        // dd($id_activity);

        DB::beginTransaction();

        try{

            $latest = Activity::find($id_activity);

            $latest->update([
                'end' => date('Y-m-d H:i:s')
            ]);

            DB::commit();
            return response()->json(['message' => 'Activity is Updated'], 200);


        }catch(\Throwable $th){

            DB::rollBack();
            return response()->json(['message'  => $th->getMessage()], 422);
        }
    }

    public function getPosition(Request $request){

        // dd(date('Y-m-d h:i:s'));
        $user           = Auth::user();
        $last_activity  = Activity::with('user_activity:id,username', 'place_activity:id,place')->where('user_id', $user->id)->whereNull('end')->latest()->first();

        $place          = $last_activity != null ? $last_activity->place_activity->place : "EDP";
        $activity       = $last_activity != null ? $last_activity->activity : "Everything is good!";

        return response()->json(['position' => $place, 'activity' => $activity == '' ? 'Trouble is not mentioned' : $activity, 'data' => $last_activity], 200);
    }
}
